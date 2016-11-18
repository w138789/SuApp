<?php

class AddressController extends CommonController
{
    private $user_id;
    private $_model_region;
    private $_model_address;

    public function __auto()
    {
        $this->user_id = $_SESSION['user_id'];
        $this->_model_region = M('region');
        $this->_model_address = M('user_address');
    }

    public function address()
    {
        if (IS_POST)
        {
            $_POST['user_id'] = $this->user_id;
            $_POST['country'] = '1';
            $is_own = $this->_model_address->where('user_id = ' . $this->user_id . " and is_own = '1'")->ones();
            if (empty($is_own)) $_POST['is_own'] = '1';
            $this->_model_address->add();
            go(__APP__ . '?c=Mycart'); exit;
        }
        $province = $this->_model_region->where('parent_id = 1')->order('region_id ASC')->all();
        $this->assign('province', $province);
        $this->assign('web', '地址页');
        $this->display();
    }

    public function city()
    {
        $province = (int)$_POST['province'];
        $city = $this->_model_region->where('parent_id = ' . $province)->order('region_id ASC')->all();
        echo json_encode($city);
    }

    public function district()
    {
        $city = (int)$_POST['city'];
        $district = $this->_model_region->where('parent_id = ' . $city)->order('region_id ASC')->all();
        echo json_encode($district);
    }
}