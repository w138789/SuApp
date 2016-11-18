<?php
/* Smarty version 3.1.29, created on 2016-09-02 18:51:03
  from "D:\WWW\SUAPP\Index\Tpl\Category\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c959977ae5e7_86985696',
  'file_dependency' => 
  array (
    '872d6adc2b5b587665d4ed291af6038cef79a83e' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Index\\Tpl\\Category\\index.html',
      1 => 1472372056,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_57c959977ae5e7_86985696 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<ul class="list-group top">
<?php
$_from = $_smarty_tpl->tpl_vars['str']->value;
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
?c=Category&a=category_list&category_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['v']->value['catename'];?>
</li></a>
    <?php
$_from = $_smarty_tpl->tpl_vars['v']->value['arr'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_va_1_saved_item = isset($_smarty_tpl->tpl_vars['va']) ? $_smarty_tpl->tpl_vars['va'] : false;
$__foreach_va_1_saved_key = isset($_smarty_tpl->tpl_vars['ke']) ? $_smarty_tpl->tpl_vars['ke'] : false;
$_smarty_tpl->tpl_vars['va'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ke'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['va']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ke']->value => $_smarty_tpl->tpl_vars['va']->value) {
$_smarty_tpl->tpl_vars['va']->_loop = true;
$__foreach_va_1_saved_local_item = $_smarty_tpl->tpl_vars['va'];
?>
    	<a href="<?php echo @constant('__APP__');?>
?c=Category&a=category_list&category_id=<?php echo $_smarty_tpl->tpl_vars['va']->value['id'];?>
"><li class="list-group-item mix"><?php echo $_smarty_tpl->tpl_vars['va']->value['catename'];?>
</li></a>
    	<?php
$_from = $_smarty_tpl->tpl_vars['va']->value['arr'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_vas_2_saved_item = isset($_smarty_tpl->tpl_vars['vas']) ? $_smarty_tpl->tpl_vars['vas'] : false;
$__foreach_vas_2_saved_key = isset($_smarty_tpl->tpl_vars['kes']) ? $_smarty_tpl->tpl_vars['kes'] : false;
$_smarty_tpl->tpl_vars['vas'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['kes'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['vas']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['kes']->value => $_smarty_tpl->tpl_vars['vas']->value) {
$_smarty_tpl->tpl_vars['vas']->_loop = true;
$__foreach_vas_2_saved_local_item = $_smarty_tpl->tpl_vars['vas'];
?>
    	<a href="<?php echo @constant('__APP__');?>
?c=Category&a=category_list&category_id=<?php echo $_smarty_tpl->tpl_vars['vas']->value['id'];?>
"><li class="list-group-item mixs"><?php echo $_smarty_tpl->tpl_vars['vas']->value['catename'];?>
</li></a>
	<?php
$_smarty_tpl->tpl_vars['vas'] = $__foreach_vas_2_saved_local_item;
}
if ($__foreach_vas_2_saved_item) {
$_smarty_tpl->tpl_vars['vas'] = $__foreach_vas_2_saved_item;
}
if ($__foreach_vas_2_saved_key) {
$_smarty_tpl->tpl_vars['kes'] = $__foreach_vas_2_saved_key;
}
?>
	<?php
$_smarty_tpl->tpl_vars['va'] = $__foreach_va_1_saved_local_item;
}
if ($__foreach_va_1_saved_item) {
$_smarty_tpl->tpl_vars['va'] = $__foreach_va_1_saved_item;
}
if ($__foreach_va_1_saved_key) {
$_smarty_tpl->tpl_vars['ke'] = $__foreach_va_1_saved_key;
}
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
</ul> 

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
