<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:50:47
  from "D:\WWW\SUAPP\Admin\Tpl\User\lists.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ecef71bb8b0_14251560',
  'file_dependency' => 
  array (
    'a083568bb680fca22cb38e09cccaddb8a3577ae0' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Admin\\Tpl\\User\\lists.html',
      1 => 1472035052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ecef71bb8b0_14251560 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\WWW\\SUAPP\\SUPHP\\Extends\\Org\\Smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="input-group">
        <input type="text" name="search" class="form-control1 input-search" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
    </span>
    </div>
    <div class="panel panel-warning" data-widget="" data-widget-static="">
        <div class="panel-heading">
            <h2>会员列表</h2>

            <div class="panel-ctrls" data-actions-container="" data-action-collapse=""><span class="button-icon has-bg"><i
                    class="ti ti-angle-down"></i></span></div>
        </div>
        <div class="panel-body no-padding" style="display: block;">
            <table class="table table-striped">
                <thead>
                <tr class="warning">
                    <th>#</th>
                    <th>昵称</th>
                    <th>头像</th>
                    <th>加入时间</th>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->tpl_vars['user']->value;
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
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['user_id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['v']->value['nickname'];?>
</td>
                    <td><img width="60" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['headimgurl'];?>
" class="img-responsive" alt=""></td>
                    <td><?php if ($_smarty_tpl->tpl_vars['v']->value['subscribe_time'] != 0) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['subscribe_time'],'%Y-%m-%d %H:%M:%S');
}?></td>
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
<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
