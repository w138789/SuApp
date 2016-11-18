<?php

class AdvertController extends CommonController
{
    public $_model_position;
    public $_model_ad;
    public $_model_nav;
    public function __auto()
    {
        $this->_model_position = M('ad_position');
        $this->_model_ad = M('ad_content');
        $this->_model_nav = M('nav');
    }
    public function lists()
    {
        $list = $this->_model_ad->all();
        $this->assign('list', $list);
        $this->display();
    }

    public function add()
    {
        if (IS_POST)
        {
            if ($_FILES['file']['name'])
            {
                $upfiles = new Upload();
                $upfiles->upload_target_dir = 'upload/ad/' . date('Y-m-d');
                $img = $upfiles->upload_file();
                $_POST['ad_img'] = $img;
            }
            $this->_model_ad->add();
        }
        $list = $this->_model_position->all();
        $this->assign('list', $list);
        $this->display();
    }
    public function tag_list()
    {
        $list = $this->_model_position->all();
//        p($list);
        $this->assign('list', $list);
        $this->display();
    }

    public function tag_add()
    {
        if (IS_POST)
        {
            $this->_model_position->add();
            $this->success('添加成功');
        }
        $this->display();
    }

    public function nav_add()
    {
        if (IS_POST)
        {
            if ($_FILES['file']['name'])
            {
                $upfiles = new Upload();
                $upfiles->upload_target_dir = 'upload/ad/' . date('Y-m-d');
                $img = $upfiles->upload_file();
                $_POST['img'] = $img;
            }
            $this->_model_nav->add();
        }
        $this->display();
    }

    public function nav_list()
    {
        $list = $this->_model_nav->all();
        $this->assign('list', $list);
        $this->display();
    }
}