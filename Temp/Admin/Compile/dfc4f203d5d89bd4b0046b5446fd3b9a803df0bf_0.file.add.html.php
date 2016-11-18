<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:51:05
  from "D:\WWW\SUAPP\Admin\Tpl\Category\add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ecf09b58bc0_92350944',
  'file_dependency' => 
  array (
    'dfc4f203d5d89bd4b0046b5446fd3b9a803df0bf' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Admin\\Tpl\\Category\\add.html',
      1 => 1472122490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ecf09b58bc0_92350944 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    .sub{
        display: table;
        width: auto;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div class="xs">
    <h3>添加分类</h3>

    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern"
              novalidate="novalidate" ng-submit="submit()" method="post" action="">
            <fieldset>
                <div class="form-group">
                    <label class="control-label">分类名称</label>
                    <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"
                           ng-model="model.name" required="" name="catename">
                </div>
                <div class="form-group filled">
                    <label class="control-label">上级分类</label>
                    <select class="form-control1 ng-invalid ng-invalid-required" ng-model="model.select" required=""
                            name="pid">
                        <option value="0" selected="selected">顶级分类</option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['category']->value;
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
                            <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['catename'];?>
</option>
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
                    </select>
                </div>
                <div class="form-group sub">
                    <button type="submit" class="btn btn-primary" style="margin-right: 25px">提交</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
