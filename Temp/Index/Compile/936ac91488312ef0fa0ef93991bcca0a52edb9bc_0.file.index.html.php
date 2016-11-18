<?php
/* Smarty version 3.1.29, created on 2016-09-05 09:47:47
  from "D:\WWW\SUAPP\Index\Tpl\Index\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57cccec34e2b13_29077348',
  'file_dependency' => 
  array (
    '936ac91488312ef0fa0ef93991bcca0a52edb9bc' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Index\\Tpl\\Index\\index.html',
      1 => 1472890474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_57cccec34e2b13_29077348 ($_smarty_tpl) {
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php
$_from = $_smarty_tpl->tpl_vars['ad']->value;
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
        <div class="swiper-slide"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['ad_img'];?>
" alt=""></div>
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
    <!-- 如果需要分页器 -->
    <div class="swiper-pagination"></div>

</div>
<div class="fenlei col-xs-12">
    <ul>
        <?php
$_from = $_smarty_tpl->tpl_vars['nav']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_1_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_1_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_1_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
        <li class="col-xs-3">
            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
">
                <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['img'];?>
" alt="">
                <span><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span>
            </a>
        </li>
        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_local_item;
}
if ($__foreach_v_1_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_1_saved_item;
}
if ($__foreach_v_1_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_1_saved_key;
}
?>
    </ul>
</div>
<div class="body col-xs-12">
    <div class="one box w100">
        <div class="title">
            <p><span></span>360数值</p>
        </div>
        <div class="aImg">
            <a href="">
                <img class="w100" src="<?php echo @constant('__PUBLIC__');?>
/img/1.jpg" alt="">
            </a>
        </div>
    </div>
</div>
<div class="body col-xs-12">
    <div class="one box w100">
        <div class="title">
            <p><span></span>超值购</p>
        </div>
        <div class="czleft col-xs-6">
            <img class="w100" src="<?php echo @constant('__PUBLIC__');?>
/img/4.jpg" alt="">
        </div>
        <div class="czright col-xs-6">
            <div>
                <img class="w100" src="<?php echo @constant('__PUBLIC__');?>
/img/5.jpg" alt="">
            </div>
            <div>
                <img class="w100" src="<?php echo @constant('__PUBLIC__');?>
/img/6.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12" style="margin-bottom: 55px">
    <div class="title">
        <p><span></span>商品列表</p>
    </div>
    <?php
$_from = $_smarty_tpl->tpl_vars['goods']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_2_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_2_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_2_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
    <a href="<?php echo @constant('__APP__');?>
?c=Goods&a=index&goods_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_id'];?>
">
        <div class="col-xs-6 goods" style="border:1px solid #ccc; margin-right:-1px; margin-bottom:-1px;">
            <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['goods_thumb'];?>
" alt="" class="img-rounded" style="width: 100%">
            <span class="goods-name"><?php echo $_smarty_tpl->tpl_vars['v']->value['goods_name'];?>
</span>
            <span class="goods-name goods-price">￥<?php echo $_smarty_tpl->tpl_vars['v']->value['shop_price'];?>
</span>
    </a>
</div>
<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_local_item;
}
if ($__foreach_v_2_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_item;
}
if ($__foreach_v_2_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_2_saved_key;
}
echo '<script'; ?>
 src="<?php echo @constant('__PUBLIC__');?>
/js/swiper-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var mySwiper = new Swiper('.swiper-container', {
        direction: 'horizontal',
        loop: true,
        autoplay: 3000,

        // 如果需要分页器
        pagination: '.swiper-pagination',

    })
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
