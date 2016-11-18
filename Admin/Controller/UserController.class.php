<?php

class UserController extends CommonController
{
    protected $_model;
    public function __auto()
    {
        $this->_model = K('User')->user_lists();
        //return $m;
    }
    public function lists()
    {
        $page_no = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
        $sum = 15;
        $page_nos = $sum * ($page_no - 1);
        $user = $this->_model->limit($page_nos . ',' . $sum)->order('user_id DESC')->all();
        $user_sum = $this->_model->count();
        $pages = new Page();
        $page = $pages::getPageHtml($page_no, $user_sum, __APP__ . '?c=User&a=lists');
        $this->assign('page', $page);
        $this->assign('user', $user);
        $this->display();
    }
}