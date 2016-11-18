<?php

class ShoppingController extends CommonController
{
    private $_model_mycart;
    private $_model_goods;
    private $_model_address;
    private $_model_info;
    private $_model_order;
    private $user_id;

    public function __auto()
    {
        $this->_model_mycart = M('mycart');
        $this->_model_goods = M('goods');
        $this->_model_address = M('user_address');
        $this->_model_info = M('order_info');
        $this->_model_order = M('order_goods');
        $this->user_id = $_SESSION['user_id'];
    }

    public function index()
    {
        $goods = $this->_model_mycart->where('user_id = ' . $this->user_id)->all();
        if (empty($goods)) return false;
        $order = array();
        $order['order_sn'] = date('YmdHis') . mt_rand(1, 10);
        $order['user_id'] = $this->user_id;
        $addr = $this->_model_address->where('user_id = ' . $this->user_id . " AND is_own = '1'")->ones();
        $order['consignee'] = $addr['consignee'];
        $order['province'] = $addr['province'];
        $order['city'] = $addr['city'];
        $order['district'] = $addr['district'];
        $order['address'] = $addr['address'];
        $order['mobile'] = $addr['mobile'];
        $order_id = $this->_model_info->add($order);

        $order['shop_prices'] = 0;
        foreach ($goods as $k => $v)
        {
            $good = $this->_model_goods->field('shop_price, goods_name')->where('goods_id = ' . $v['goods_id'])->ones();
            $order['shop_prices'] = $good['shop_price'] * $v['goods_num'] + $order['shop_prices'];
            $order_goods['goods_id'] = $v['goods_id'];
            $order_goods['order_id'] = $order_id;
            $order_goods['goods_name'] = $good['goods_name'];
            $order_goods['goods_num'] = $v['goods_num'];
            $order_goods['goods_price'] = $good['shop_price'];
            $this->_model_order->add($order_goods);
        }
        $this->_model_info->where('order_id = ' . $order_id)->update($order);
        $this->_model_mycart->where('user_id = ' . $this->user_id)->delete();
        //跳到支付
        go(__APP__ . '?c=Shopping&a=pay&order_id=' . $order_id);
    }

    public function pay()
    {
        $order_id = (int)$_GET['order_id'];
        $order = $this->_model_info->where('order_id = ' . $order_id)->ones();
        $datas['order_sn'] = $order['order_sn'];
        $datas['money'] = $order['shop_prices'];
        $pay = new Wxpay();
        $data = $pay->pay($datas);
        $this->assign('jsApiParameters', $data['jsApiParameters']);
        $this->assign('editAddress', $data['editAddress']);
        $this->assign('order', $order);
        $this->assign('web', '支付页');
        $this->display();
    }

    public function pay_success()
    {
        $order['order_sn'] = $_GET['order_sn'];
        $this->assign('order', $order);
        $this->assign('web', '支付成功通知页');
        $this->display();
    }

}