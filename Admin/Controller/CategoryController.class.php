<?php

class CategoryController extends CommonController
{
    public $_model_all;
    public $_model;

    public function __auto()
    {
        $this->_model = M('Category');
        $this->_model_all = K('Category');
    }

    function add()
    {
        if (IS_POST)
        {
            $this->_model->add();
        }
        $category = $this->_model_all->category_all();
        $this->assign('category', $category);
        $this->display();

    }

    public function lists()
    {
        $category = $this->_model_all->category_all();
        $this->assign('category', $category);
        $this->display();
    }

    public function category_del()
    {
        $pid = $this->_model->where('pid = ' . (int)$_GET['category_id'])->ones();
        if (!empty($pid))
        {
            $this->error('有下级分类,不能删除');
        }
        if (!empty($_GET['category_id']))
        {
            $this->_model->where('id = ' . (int)$_GET['category_id'])->delete();
            $this->success('删除成功');
        }
    }

    public function category_up()
    {
        if (IS_POST)
        {
            $this->_model->where('id = ' . (int)$_GET['category_id'])->update();
        }
        $category = $this->_model->where('id = ' . (int)$_GET['category_id'])->ones();
        $categorys = $this->_model_all->category_all();
        $this->assign('category', $category);
        $this->assign('categorys', $categorys);
        $this->display();
    }
}