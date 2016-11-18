<?php

class WxMenuModel extends Model
{

    public $table = 'wxmenu';

    public function menu_stree()
    {
        $menu = $this->order('id asc')->all();
        return $this->stree($menu, '0');
    }

    public function stree($arr, $id)
    {

        $subs = array(); // 子孙数组
        $ks = 0;
        foreach ($arr as $v)
        {
            if ($v['parent_id'] == $id)
            {
                $ks++;
                $subs[] = $v;
                $subs[$ks - 1]['arr'] = $this->stree($arr, $v['id']);
            }
        }
        return $subs;
    }
}