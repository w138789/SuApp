<?php

class UserController extends CommonController
{
    private $user_id;
    private $_model_info;
    private $_model_order;
    private $_model_goods;

    public function __auto()
    {
        $this->user_id = $_SESSION['user_id'];
        $this->openid = $_SESSION['name'];
        $this->_model_info = M('order_info');
        $this->_model_order = M('order_goods');
        $this->_model_goods = M('goods');
        $this->wecatObj = new Weixin();
    }

    function index()
    {
        $user = K('User')->where('user_id = ' . $this->user_id)->ones();
        $this->assign('user', $user);
        $this->assign('web', '用户中心');
        $this->display();
    }

    public function order()
    {
        $order = $this->_model_info->where('user_id = ' . $this->user_id)->order('order_id DESC')->all();
        foreach ($order as $k => $v)
        {
            $order[$k]['goods'] = $this->_model_order->where('order_id = ' . $v['order_id'])->all();
            foreach ($order[$k]['goods'] as $ks => $vs)
            {
                $order[$k]['goods'][$ks]['goods_thumb'] = $this->_model_goods->field('goods_thumb')->where('goods_id = ' . $vs['goods_id'])->one();
            }
        }
//        p($order);
        $this->assign('order', $order);
        $this->assign('web', '订单页');
        $this->display();
    }

    public function qrcodes()
    {
        $imgPath = 'upload/qrcode/';
        if (!is_dir($imgPath)) mkdir($imgPath, 0777, true);
        $filename = $imgPath . $this->user_id . ".jpg";
        if (!is_file($filename))
        {
            $str = $this->wecatObj->qrcode($this->user_id);
            if (empty($str['ticket']))
            {
                echo '获取二维码失败';
                exit;
            }
            //下载二维码图片
            $url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=" . $str['ticket'];
            $imageData = $this->wecatObj->get_curl($url);
            $tp = @fopen($filename, 'a');
            fwrite($tp, $imageData);
            fclose($tp);
        }
        echo '<img src="upload/qrcode/' . $this->user_id . '.jpg">';
    }

}