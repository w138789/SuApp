<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:51:17
  from "D:\WWW\SUAPP\Admin\Tpl\Advert\add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ecf15b38426_60910710',
  'file_dependency' => 
  array (
    '1770ba50b003e20adb2784329be9a9ac25f39876' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Admin\\Tpl\\Advert\\add.html',
      1 => 1472268726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ecf15b38426_60910710 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<style>
    .add {
        float: left;
        margin-right: 20px;
    }

    .addfile {
        float: left;
        margin-bottom: 10px;
    }
</style>
<form enctype="multipart/form-data" class="form-horizontal" action="" method="post">
    <div class="form-group">
        <label for="focusedinput" class="col-sm-2 control-label" style="padding-top: 11px;">广告标签</label>

        <div class="col-sm-8">
            <select class="form-control1 ng-invalid ng-invalid-required" ng-model="model.select" required=""
                    name="tid">
                <option value="" selected="selected">选择标签</option>
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
                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['tid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['ad_name'];?>
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
    </div>
    <div class="form-group">
        <label for="focusedinput" class="col-sm-2 control-label" style="padding-top: 11px;">广告名称</label>

        <div class="col-sm-8">
            <input type="text" class="form-control1" id="focusedinput" placeholder="" name="ad_name" required="">
        </div>
    </div>
    <div class="form-group">
        <label for="focusedinput" class="col-sm-2 control-label">上传图片</label>

        <div class="col-sm-8">
            <input type="file" name="file">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 sub">
            <button type="submit" class="btn btn-primary">提交</button>
            <button type="reset" class="btn btn-default">重置</button>
        </div>
    </div>
</form>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
