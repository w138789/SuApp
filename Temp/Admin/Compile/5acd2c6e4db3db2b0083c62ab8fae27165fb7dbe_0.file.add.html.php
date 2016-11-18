<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:51:07
  from "D:\WWW\SUAPP\Admin\Tpl\Goods\add.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ecf0b7afa16_45223927',
  'file_dependency' => 
  array (
    '5acd2c6e4db3db2b0083c62ab8fae27165fb7dbe' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Admin\\Tpl\\Goods\\add.html',
      1 => 1472208876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ecf0b7afa16_45223927 ($_smarty_tpl) {
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
        <label for="focusedinput" class="col-sm-2 control-label" style="padding-top: 11px;">商品名称</label>

        <div class="col-sm-8">
            <input type="text" class="form-control1" id="focusedinput" placeholder="" name="goods_name">
        </div>
        <!--<div class="col-sm-2">-->
        <!--<p class="help-block">商品名称</p>-->
        <!--</div>-->
    </div>
    <div class="form-group">
        <label for="focusedinput" class="col-sm-2 control-label" style="padding-top: 11px;">库存数量</label>

        <div class="col-sm-8">
            <input type="text" class="form-control1" placeholder="" name="goods_number">
        </div>
    </div>
    <div class="form-group">
        <label for="focusedinput" class="col-sm-2 control-label" style="padding-top: 11px;">商品分类</label>

        <div class="col-sm-8">
            <select class="form-control1 ng-invalid ng-invalid-required" ng-model="model.select" required=""
                    name="cat_id">
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
    </div>
    <div class="form-group">
        <label for="focusedinput" class="col-sm-2 control-label">上传图片</label>

        <div class="col-sm-8">
            <input type="file" name="file">
        </div>
    </div>
    <div class="form-group goodsphoto">
        <label for="focusedinput" class="col-sm-2 control-label">商品相册</label>

        <div class="col-sm-8">
            <span class="add"><a href="javascript:addimg()" id="addImg">[+]</a> </span>
            <span class="addfile"><input type="file" name="img[]" class="ipt"/></span>
        </div>
    </div>
    <div class="form-group">
        <label for="focusedinput" class="col-sm-2 control-label"></label>
        <div class="col-sm-8">
            <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8"
                    src="<?php echo @constant('__PUBLIC__');?>
/ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8"
                    src="<?php echo @constant('__PUBLIC__');?>
/ueditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8"
                    src="<?php echo @constant('__PUBLIC__');?>
/ueditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 id="editor" type="text/plain" style="width:1024px;height:500px;"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript">
                var ue = UE.getEditor('editor');
            <?php echo '</script'; ?>
>
        </div>
<!--        <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8"
                src="<?php echo @constant('__PUBLIC__');?>
/ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8"
                src="<?php echo @constant('__PUBLIC__');?>
/ueditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8"
                src="<?php echo @constant('__PUBLIC__');?>
/ueditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 id="editor" type="text/plain" style="width:1024px;height:500px;"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript">
            var ue = UE.getEditor('editor');
        <?php echo '</script'; ?>
>-->
    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 sub">
            <button type="submit" class="btn btn-primary">提交</button>
            <button type="reset" class="btn btn-default">重置</button>
        </div>
    </div>
</form>


<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function () {
        bindListener();
    })
    function addimg() {
        $(".goodsphoto").after('<div class="form-group"><label for="focusedinput" class="col-sm-2 control-label"></label><div class="col-sm-8"><span class="add"><a href="#" name="rmlink">[-]</a></span><span class="addfile"><input type="file" name="img[]" class="ipt" /></span></div></div>');

        // 为新元素节点添加事件侦听器
        bindListener();
    }
    // 用来绑定事件(使用unbind避免重复绑定)
    function bindListener() {
        $("a[name=rmlink]").unbind().click(function () {
            $(this).parent().parent().parent().remove();
        })
    }
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
