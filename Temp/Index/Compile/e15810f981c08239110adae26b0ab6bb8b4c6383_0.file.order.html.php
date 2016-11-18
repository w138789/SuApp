<?php
/* Smarty version 3.1.29, created on 2016-11-18 18:04:43
  from "D:\WWW\SUAPP\Index\Tpl\User\order.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ed23bf2c460_04773159',
  'file_dependency' => 
  array (
    'e15810f981c08239110adae26b0ab6bb8b4c6383' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Index\\Tpl\\User\\order.html',
      1 => 1472555144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ed23bf2c460_04773159 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="col-xs-12" style="margin: 50px 0 50px 0; padding: 15px;">
    <dl>
        <?php
$_from = $_smarty_tpl->tpl_vars['order']->value;
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
        <div style="padding-bottom: 3px; margin-bottom: 15px; background: #fff;">
            <dt>
                订单号: <?php echo $_smarty_tpl->tpl_vars['v']->value['order_sn'];?>

            </dt>
            <?php
$_from = $_smarty_tpl->tpl_vars['v']->value['goods'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vs_1_saved_item = isset($_smarty_tpl->tpl_vars['vs']) ? $_smarty_tpl->tpl_vars['vs'] : false;
$__foreach_vs_1_saved_key = isset($_smarty_tpl->tpl_vars['ks']) ? $_smarty_tpl->tpl_vars['ks'] : false;
$_smarty_tpl->tpl_vars['vs'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ks'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['vs']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ks']->value => $_smarty_tpl->tpl_vars['vs']->value) {
$_smarty_tpl->tpl_vars['vs']->_loop = true;
$__foreach_vs_1_saved_local_item = $_smarty_tpl->tpl_vars['vs'];
?>
            <div style="border: 1px solid #ccc; padding-bottom: 3px; margin-bottom: 5px;">
                <dd style="margin: 5px 20px 0 5px; width: 38px; float: left"><img
                        src="<?php echo $_smarty_tpl->tpl_vars['vs']->value['goods_thumb'];?>
" alt=""></dd>
                <dd style="margin-top: 5px;">
                    <?php echo $_smarty_tpl->tpl_vars['vs']->value['goods_name'];?>

                </dd>
                <dd>
                    <?php echo $_smarty_tpl->tpl_vars['vs']->value['goods_price'];?>

                </dd>
            </div>
            <?php
$_smarty_tpl->tpl_vars['vs'] = $__foreach_vs_1_saved_local_item;
}
if ($__foreach_vs_1_saved_item) {
$_smarty_tpl->tpl_vars['vs'] = $__foreach_vs_1_saved_item;
}
if ($__foreach_vs_1_saved_key) {
$_smarty_tpl->tpl_vars['ks'] = $__foreach_vs_1_saved_key;
}
?>
            <dt>
                总价格: <?php echo $_smarty_tpl->tpl_vars['v']->value['shop_prices'];?>

                <?php if ($_smarty_tpl->tpl_vars['v']->value['pay_status'] == 0) {?>
                <span style="margin-left: 10px"><a href="#">立即支付</a></span>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['order_status'] == 2 && $_smarty_tpl->tpl_vars['v']->value['shipping_status'] == 0 && $_smarty_tpl->tpl_vars['v']->value['pay_status'] == 1) {?>
                <span style="margin-left: 10px">已付款, 未发货</span>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['order_status'] == 2 && $_smarty_tpl->tpl_vars['v']->value['shipping_status'] == 2 && $_smarty_tpl->tpl_vars['v']->value['pay_status'] == 1) {?>
                <span style="margin-left: 10px">已发货</span>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['order_status'] == 2 && $_smarty_tpl->tpl_vars['v']->value['shipping_status'] == 5 && $_smarty_tpl->tpl_vars['v']->value['pay_status'] == 1) {?>
                <span style="margin-left: 10px">已收货</span>
                <?php }?>
            </dt>

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
    </dl>
</div>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
