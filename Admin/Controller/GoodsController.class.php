<?php

class GoodsController extends CommonController
{
    protected $_model;
    protected $_model_category;

    public function __auto()
    {
        $this->_model = K('Goods')->goods_lists();
        $this->_model_category = K('Category');
    }

    public function lists()
    {
        $page_no = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
        $sum = 15;
        $page_nos = $sum * ($page_no - 1);
        $goods = $this->_model->limit($page_nos . ',' . $sum)->order('goods_id DESC')->all();
        $user_sum = $this->_model->count();
        $pages = new Page();
        $page = $pages::getPageHtml($page_no, $user_sum, __APP__ . '?c=Goods&a=lists');
        $this->assign('page', $page);
        $this->assign('goods', $goods);
        $this->display();
    }

    public function add()
    {

        if (IS_POST)
        {
            if (!empty($_POST['editorValue']))
            {
                $_POST['goods_desc'] = $_POST['editorValue'];

            }
            unset($_POST['editorValue']);
            $goods_id = $this->_model->add();
            if ($_FILES['img'] || $_FILES['file'])
            {
                $upfiles = new Upload();
                $upfiles->upload_target_dir = 'upload/goods/' . date('Y-m-d');
                if ($_FILES['img']['name'][0])
                {
                    $imgs = $upfiles->file_arr();
                    foreach ($imgs as $k => $v)
                    {
                        $gallery['goods_id'] = $goods_id;
                        $gallery['img_url'] = $v;
                        K('GoodsGallery')->gallery()->add($gallery);
                    }
                }
                if ($_FILES['file']['name'])
                {
                    $upfiles = new Upload();
                    $upfiles->upload_target_dir = 'upload/goods/' . date('Y-m-d');
                    $img = $upfiles->upload_file();
                    $_POST['goods_thumb'] = $img;
                    $this->_model->where('goods_id = ' . $goods_id)->update($_POST);
                }
            }
            $this->success('添加成功');
        }
        $category = $this->_model_category->category_all();
        $this->assign('category', $category);
        $this->display();
    }

    public function goods_up()
    {
        $goods = $this->_model->where('goods_id = 79')->ones();
        $this->assign('goods', $goods);
        $this->display('add.html');
    }
}