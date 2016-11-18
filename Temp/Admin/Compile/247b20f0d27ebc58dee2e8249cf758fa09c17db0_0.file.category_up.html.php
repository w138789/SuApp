<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:51:28
  from "D:\WWW\SUAPP\Admin\Tpl\Category\category_up.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ecf203d02b8_46643749',
  'file_dependency' => 
  array (
    '247b20f0d27ebc58dee2e8249cf758fa09c17db0' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Admin\\Tpl\\Category\\category_up.html',
      1 => 1472110030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ecf203d02b8_46643749 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="xs">
    <h3>添加分类</h3>

    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern"
              novalidate="novalidate" ng-submit="submit()" method="post" action="">
            <fieldset>
                <div class="form-group">
                    <label class="control-label">分类名称</label>
                    <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"
                           ng-model="model.name" required="" name="catename" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['catename'];?>
">
                </div>
                <div class="form-group filled">
                    <label class="control-label">上级分类</label>
                    <select class="form-control1 ng-invalid ng-invalid-required" ng-model="model.select" required=""
                            name="pid">
                        <option value="0" selected="selected">顶级分类</option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['categorys']->value;
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
" <?php if ($_smarty_tpl->tpl_vars['v']->value['id'] == $_smarty_tpl->tpl_vars['category']->value['pid']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['catename'];?>
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
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">提交</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
