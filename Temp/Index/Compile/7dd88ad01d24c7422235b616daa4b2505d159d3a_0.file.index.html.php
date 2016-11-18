<?php
/* Smarty version 3.1.29, created on 2016-11-18 18:04:31
  from "D:\WWW\SUAPP\Index\Tpl\Mycart\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ed22f993d26_65576586',
  'file_dependency' => 
  array (
    '7dd88ad01d24c7422235b616daa4b2505d159d3a' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Index\\Tpl\\Mycart\\index.html',
      1 => 1472891619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ed22f993d26_65576586 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ($_smarty_tpl->tpl_vars['mycart']->value) {?>
<div class="col-xs-12" style="background:#fff; margin-top: 50px">
    <h5>收货人: <?php echo $_smarty_tpl->tpl_vars['addr']->value['consignee'];?>
</h5>
    <h5>收货地址: <?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</h5>
</div>
<div class="col-xs-12" style="margin-top:10px; padding: 15px; background: #fff;">
    <?php
$_from = $_smarty_tpl->tpl_vars['mycart']->value;
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
    <div style="height: 52px; border: 1px solid #e0e0e0;margin-top: 5px">
    	<div style="float: left;"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_thumb'];?>
" alt="" style="width: 50px"></div>
        <div style="float: left; margin-left: 10px; margin-top: 3px;">
            <div>
                商品名称: <?php echo $_smarty_tpl->tpl_vars['v']->value['goods_name'];?>

            </div>
            <div>
                <span>数量: <?php echo $_smarty_tpl->tpl_vars['v']->value['goods_num'];?>
</span>
                <span>￥<?php echo $_smarty_tpl->tpl_vars['v']->value['shop_price'];?>
</span>
            </div>
        </div>
        <div style="float: right; margin-top: 15px; margin-right: 10px">
			<a href="javascript:;" onclick="del(<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_id'];?>
)"><span class="glyphicon glyphicon-remove remove"></span></a>
        </div>

    </div>
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
</div>
<div class="col-xs-12" style="margin-top: 10px; padding: 15px; background: #fff;">
    快递方式: 申通快递
</div>
<div class="col-xs-12" style="margin-top: 10px; padding: 15px; background: #fff;">
    合计: ￥<span><?php echo $_smarty_tpl->tpl_vars['goods_prices']->value;?>
</span>
</div>
<?php } else { ?>
<div class="col-xs-12" style="margin-top: 180px">
	<div class="col-xs-12" style="text-align: center">购物车为空</div>
	<div class="col-xs-12" style="margin-top: 10px; text-align: center"><a href="<?php echo @constant('__APP__');?>
"><button type="button" class="weui_btn weui_btn_plain_primary">立即购物</button></a></div>

</div>
<?php }
if ($_smarty_tpl->tpl_vars['mycart']->value) {?>
<nav class="navbar navbar-fixed-bottom">
    <ul id="nav">
        <li class="col-xs-6" style="width: 50%; margin-bottom: 10px; text-align: center">
            <a href="javascript:;"><button type="button" class="weui_btn weui_btn_warn empty" style="background: red;border-color: red;">清空购物车</button></a>
        </li>
        <li class="col-xs-6" style="width: 50%; margin-bottom: 10px; text-align: center">
            <a href="<?php echo @constant('__APP__');?>
?c=Shopping"><button type="button" class="weui_btn weui_btn_primary">提交订单</button></a>
        </li>
    </ul>
</nav>
<div class="weui_dialog_confirm goodsalert" style="display: none;">
    <div class="weui_mask"></div>
    <div class="weui_dialog">
        <div class="weui_dialog_hd"><strong class="weui_dialog_title">删除商品</strong></div>
        <div class="weui_dialog_bd">确定删除商品吗</div>
        <div class="weui_dialog_ft">
            <a href="#" class="weui_btn_dialog default goodscancel">取消</a>
            <a href="" class="weui_btn_dialog primary ahref">确定</a>
        </div>
    </div>
</div>
<div class="weui_dialog_confirm alert" style="display: none;">
    <div class="weui_mask"></div>
    <div class="weui_dialog">
        <div class="weui_dialog_hd"><strong class="weui_dialog_title">清空购物车</strong></div>
        <div class="weui_dialog_bd">确定清空购物车吗</div>
        <div class="weui_dialog_ft">
            <a href="#" class="weui_btn_dialog default cancel">取消</a>
            <a href="<?php echo @constant('__APP__');?>
?c=Mycart&a=del_all" class="weui_btn_dialog primary">确定</a>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    $('.empty').click(function(){
        $('.alert').css('display', 'block');
    });
    $('.cancel').click(function(){
        $('.alert').css('display', 'none');
    });
    function del(goods_id)
    {
        $('.goodsalert').css('display', 'block');
        $(".ahref").attr("href","<?php echo @constant('__APP__');?>
?c=Mycart&a=del&goods_id=" + goods_id);

    }
    $('.goodscancel').click(function(){
        $('.goodsalert').css('display', 'none');
    });

<?php echo '</script'; ?>
>
</body>
</html>
<?php } else {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
}
