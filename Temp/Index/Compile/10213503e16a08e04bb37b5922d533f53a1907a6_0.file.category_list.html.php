<?php
/* Smarty version 3.1.29, created on 2016-09-02 18:51:05
  from "D:\WWW\SUAPP\Index\Tpl\Category\category_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c95999374807_35692527',
  'file_dependency' => 
  array (
    '10213503e16a08e04bb37b5922d533f53a1907a6' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Index\\Tpl\\Category\\category_list.html',
      1 => 1472372036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_57c95999374807_35692527 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="col-xs-12 top" style="margin-bottom: 55px">
    <div class="title">
        <p><span></span>商品列表</p>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['goods']->value) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['goods']->value;
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
    <a href="<?php echo @constant('__APP__');?>
?c=Goods&a=index&goods_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_id'];?>
">
        <div class="col-xs-6 goods">
            <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_thumb'];?>
" alt="" class="img-thumbnail" style="width: 100%">
            <span class="goods-name"><?php echo $_smarty_tpl->tpl_vars['v']->value['goods_name'];?>
</span>
            <span class="goods-name goods-price">￥<?php echo $_smarty_tpl->tpl_vars['v']->value['shop_price'];?>
</span>
    </a>
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
}
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
