<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:51:25
  from "D:\WWW\SUAPP\Admin\Tpl\Advert\nav_add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ecf1d0c2343_82446781',
  'file_dependency' => 
  array (
    'b9845a170f482174c2c3753273542c9ea8b7237f' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Admin\\Tpl\\Advert\\nav_add.html',
      1 => 1472269580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ecf1d0c2343_82446781 ($_smarty_tpl) {
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
        <label for="focusedinput" class="col-sm-2 control-label" style="padding-top: 11px;">导航栏名称</label>

        <div class="col-sm-8">
            <input type="text" class="form-control1" id="focusedinput" placeholder="" name="name" required="">
        </div>
    </div>
    <div class="form-group">
        <label for="focusedinput" class="col-sm-2 control-label">上传图片</label>

        <div class="col-sm-8">
            <input type="file" name="file">
        </div>
    </div>
    <div class="form-group">
        <label for="focusedinput" class="col-sm-2 control-label" style="padding-top: 11px;">链接网址</label>

        <div class="col-sm-8">
            <input type="text" class="form-control1" id="" placeholder="" name="url" required="">
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
