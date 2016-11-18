<?php

class WxMenuController extends Controller
{
    public $_model_wxconfig;
    public $_model_menu;
    public $wechatObj;

    public function __init()
    {
        $this->_model_wxconfig = M('wxconfig');
        $this->_model_menu = K('WxMenu');
        $this->wechatObj = new Weixin();
    }

    public function index()
    {
        $menu = $this->_model_menu->menu_stree();
        $count = $this->_model_menu->where('parent_id = 0')->count();
        $data = '{"button":[';
        foreach ($menu as $k => $v)
        {
            if (empty($v['arr']))
            {
                if (empty($v['url']))
                {
                    $data .= '{"type":"click","name":"' . $v['title'];
                    $data .= '","key":"' . $v['key'] . '"}';
                } else
                {
                    $data .= '{"type":"view","name":"' . $v['title'];
                    $data .= '","url":"' . $v['url'] . '"}';
                }
            } else
            {
                $data .= '{"name":"' . $v['title'] . '","sub_button":[';
            }
            foreach ($v['arr'] as $ks => $vs)
            {
                $counts = $this->_model_menu->where('parent_id = ' . $v['id'])->count();
                if (empty($vs['url']))
                {
                    $data .= '{"type":"click","name":"' . $vs['title'];
                    $data .= '","key":"' . $vs['key'] . '"}';
                } else
                {
                    $data .= '{"type":"view","name":"' . $vs['title'];
                    $data .= '","url":"' . $vs['url'] . '"}';
                }
                if ($counts == $ks + 1)
                {
                    $data .= ']}';
                } else
                {
                    $data .= ',';
                }
            }
            if ($count == $k + 1)
            {
                $data .= '';
            } else
            {
                $data .= ',';
            }
        }
        $data .= ']}';
        $access_token = $this->wechatObj->access_token();
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=' . $access_token;
        $data = $this->wechatObj->post_curl($url, $data);
        $json = json_decode($data, TRUE);
        if (array_key_exists('errcode', $json) && $json['errcode'] != 0)
        {
            $this->error('添加失败: 错误信息: ' . $json['errmsg'], '', 20);
        } else
        {
            $this->success('添加成功');
        }
    }
}