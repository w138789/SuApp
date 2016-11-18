<?php

class MycartController extends CommonController
{
    private $_model_mycart;
    private $_model_goods;
    private $_model_address;
    private $_model_region;
    private $user_id;

    public function __auto()
    {
        $this->_model_mycart = M('mycart');
        $this->_model_goods = M('goods');
        $this->_model_address = M('user_address');
        $this->_model_region = M('region');
        $this->user_id = $_SESSION['user_id'];
    }

    function add()
    {
        if (IS_POST)
        {
            $goods_id = (int)$_POST['goods_id'];
            $goods_num = (int)$_POST['goods_num'];
        } else
        {
            $goods_id = (int)$_GET['goods_id'];
            $goods_num = (int)$_GET['goods_num'];
        }
        $mycart = $this->_model_mycart->where('user_id = ' . $this->user_id . ' and goods_id = ' . $goods_id)->ones();
        if ($mycart)
        {
            $goods_nums = $mycart['goods_num'] + $goods_num;
            $data = array(
                'goods_num' => $goods_nums
            );
            $this->_model_mycart->where('user_id = ' . $this->user_id . ' and goods_id = ' . $goods_id)->update($data);
        } else
        {
            $data = array(
                'user_id' => $this->user_id,
                'goods_id' => $goods_id,
                'goods_num' => $goods_num,
            );
            $this->_model_mycart->add($data);
        }
        if (!IS_POST)
        {
            go(__APP__ . '?c=Mycart&a=index');
        } else
        {
            echo json_encode(array(
                'status' => '1',
                'msg' => '添加成功'
            ));
        }
    }

    function index()
    {
        $addr = $this->_model_address->where('user_id = ' . $this->user_id . " and is_own = '1'")->ones();
        if (empty($addr)) go(__APP__ . '?c=Address&a=address');
        $province = $this->_model_region->field('region_name')->where('region_id = ' . $addr['province'] )->one();
        $address = $province . ' ';

        $city = $this->_model_region->field('region_name')->where('region_id = ' . $addr['city'] )->one();
        $address .= $city . ' ';

        $district = $this->_model_region->field('region_name')->where('region_id = ' . $addr['district'] )->one();
        $address .= $district . ' ' . $addr['address'];

        $mycart = $this->_model_mycart->where('user_id = ' . $this->user_id)->all();
        foreach ($mycart as $k => $v)
        {
            $mycart[$k] = M('goods')->field('goods_id, goods_name, shop_price, goods_thumb')->where('goods_id = ' . $v['goods_id'])->ones();
            $mycart[$k]['goods_num'] = $v['goods_num'];
        }
        $goods_prices = 0;
        foreach ($mycart as $v)
        {
            $goods_prices = $goods_prices + $v['shop_price'] * $v['goods_num'];
        }
        $this->assign('addr', $addr);
        $this->assign('goods_prices', $goods_prices);
        $this->assign('address', $address);
        $this->assign('mycart', $mycart);
        $this->assign('web', '购物车');
        $this->display();
    }

    public function del()
    {
        $goods_id = (int)$_GET['goods_id'];
        if (empty($goods_id)) return false;
        $this->_model_mycart->where('goods_id = ' . $goods_id)->delete();
        go(__APP__ . '?c=Mycart');
    }

    public function del_all()
    {
        $this->_model_mycart->where('1')->delete();
        go(__APP__ . '?c=Mycart');
    }
}