<?php
class CategoryModel extends Model
{
    public $table = 'category';

    function category_all()
    {
        $area = $this->all();
        $category = $this->subtree($area, 0, 4);
        foreach ($category as $k => $v)
        {
            $category[$k]['catename'] = str_repeat('&nbsp;', $v['lev']) . $v['catename'];
        }
        return $category;
    }

    function subtree($arr, $id = 0, $lev = 0)
    {
        $subs = array(); // 子孙数组
        foreach ($arr as $v)
        {
            if ($v['pid'] == $id)
            {
                $v['lev'] = $lev;
                $subs[] = $v; // 举例说找到array('id'=>1,'name'=>'安徽','parent'=>0),
                $subs = array_merge($subs, $this->subtree($arr, $v['id'], $lev + 4));
            }
        }
        return $subs;
    }

    public function stree($arr, $id)
    {
        
        $subs = array(); // 子孙数组
        $ks = 0;
        foreach ($arr as $v)
        {
            if ($v['pid'] == $id)
            {
                $ks++;
                $subs[] = $v;
                $subs[$ks-1]['arr'] = $this->stree($arr, $v['id']);
            }
        }
        return $subs;
    }
}