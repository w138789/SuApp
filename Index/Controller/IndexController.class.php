<?php
class IndexController extends Controller
{
    private $_model_nav;
    private $_model_ad;
    private $_model_goods;

    public function __auto()
    {
        $this->_model_nav = M('nav');
        $this->_model_ad = M('ad_content');
        $this->_model_goods = M('goods');
    }
    public function index(){
        $ad = $this->_model_ad->all();
        $this->assign('ad', $ad);
        $nav = $this->_model_nav->all();
        $this->assign('nav', $nav);
        $goods = $this->_model_goods->all();
        $this->assign('goods', $goods);
        $this->assign('web', '首页');
        $this->display();
    }

}