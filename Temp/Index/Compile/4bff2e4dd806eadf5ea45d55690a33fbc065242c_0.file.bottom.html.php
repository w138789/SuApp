<?php
/* Smarty version 3.1.29, created on 2016-09-05 09:47:47
  from "D:\WWW\SUAPP\Index\Tpl\layout\bottom.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57cccec3748028_49453269',
  'file_dependency' => 
  array (
    '4bff2e4dd806eadf5ea45d55690a33fbc065242c' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Index\\Tpl\\layout\\bottom.html',
      1 => 1472896551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57cccec3748028_49453269 ($_smarty_tpl) {
?>
<nav class="navbar navbar-fixed-bottom">
    <ul id="nav">
        <a href="<?php echo @constant('__APP__');?>
"><li class="home"><span class="glyphicon glyphicon-home
"></span><p>首页</p></li></a>
        <a href="<?php echo @constant('__APP__');?>
?c=Category"><li class="category"><span class="glyphicon glyphicon-th-large
"></span><p>分类</p></li></a>
        <a href="<?php echo @constant('__APP__');?>
?c=Mycart"><li class="mycart"><span class="glyphicon glyphicon-shopping-cart"></span><p>购物车</p></li></a>

        <a href="<?php echo @constant('__APP__');?>
?c=User"><li class="user"><span class="glyphicon glyphicon-user"></span><p>我的</p></li></a>
    </ul>
</nav>
<?php echo '<script'; ?>
>
    var str = window.location.search;
    str=str.substring(0,5);
    if (str == '')
    {
        $('.home').css('color', '#04be02');
    }
    if (str == '?c=Ca')
    {
        $('.category').css('color', '#04be02');
    }
    if (str == '?c=My' || str == '?c=Ad')
    {
        $('.mycart').css('color', '#04be02');
    }
    if (str == '?c=Us')
    {
        $('.user').css('color', '#04be02');
    }
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
