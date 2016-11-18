<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:51:20
  from "D:\WWW\SUAPP\Admin\Tpl\Advert\tag_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ecf186955c0_56067701',
  'file_dependency' => 
  array (
    '4132bda36f11eb1e774222d08ca334cad2c08aa0' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Admin\\Tpl\\Advert\\tag_list.html',
      1 => 1472266058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ecf186955c0_56067701 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="panel panel-warning" data-widget="" data-widget-static="">
    <div class="panel-heading">
        <h2>分类列表</h2>
        <div class="panel-ctrls" data-actions-container="" data-action-collapse=""><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
    </div>
    <div class="panel-body no-padding" style="display: block;">
        <table class="table table-striped">
            <thead>
            <tr class="warning">
                <th>#</th>
                <th>标签名称</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['tid'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['v']->value['ad_name'];?>
</td>
                <td>
                    <a href="<?php echo @constant('__APP__');?>
?c=Category&a=category_up&category_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['tid'];?>
" title="">
                        <i class="fa fa-pencil-square-o icon_9"></i>
                        修改
                    </a>
                    <a href="javascript:dels(<?php echo $_smarty_tpl->tpl_vars['v']->value['tid'];?>
)" class="font-red" title="">
                        <i class="fa fa-times" icon_9=""></i>
                        删除
                    </a>
                </td>
            </tr>
            <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
            </tbody>
        </table>
    </div>
</div>
<?php echo '<script'; ?>
>
    function dels(id)
    {
        if(confirm("确定删除吗？")) {
            window.location.href="<?php echo @constant('__APP__');?>
?c=Category&a=category_del&category_id=" + id;
        }
    }
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
