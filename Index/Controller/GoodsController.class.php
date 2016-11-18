<?php

class GoodsController extends Controller
{
    private $_model_gallery;
    private $_model_goods;

    public function __auto()
    {
        $this->_model_gallery = M('goods_gallery');
        $this->_model_goods = M('goods');
    }

    function index()
    {
        if ($_GET['goods_id'])
        {
            $goods_id = (int)$_GET['goods_id'];
            $gallery = $this->_model_gallery->where('goods_id = ' . $goods_id)->all();
            $goods = $this->_model_goods->where('goods_id = ' . $goods_id)->ones();

            $this->assign('goods', $goods);
            $this->assign('gallery', $gallery);
            $this->assign('web', '商品页');
            $this->display();
        }
    }
}