<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:51:22
  from "D:\WWW\SUAPP\Admin\Tpl\Advert\tag_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ecf1a326da1_26004693',
  'file_dependency' => 
  array (
    '512268a96bd9159070e8b5fff3752fc714ba0ebd' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Admin\\Tpl\\Advert\\tag_add.html',
      1 => 1472265748,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ecf1a326da1_26004693 ($_smarty_tpl) {
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
                    <label class="control-label">标签名称</label>
                    <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"
                           ng-model="model.name" required="" name="ad_name">
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
