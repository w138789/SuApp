<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:49:38
  from "D:\WWW\SUAPP\Admin\Tpl\Login\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582eceb2906416_32151374',
  'file_dependency' => 
  array (
    '654bbe9fbad421804d320912faf3623d8b7d34d9' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Admin\\Tpl\\Login\\index.html',
      1 => 1472018350,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582eceb2906416_32151374 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <?php echo '<script'; ?>
 type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    <?php echo '</script'; ?>
>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo @constant('__PUBLIC__');?>
/css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
    <!-- Custom CSS -->
    <link href="<?php echo @constant('__PUBLIC__');?>
/css/style.css" rel='stylesheet' type='text/css'/>
    <link href="<?php echo @constant('__PUBLIC__');?>
/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <?php echo '<script'; ?>
 src="<?php echo @constant('__PUBLIC__');?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
    <!----webfonts--->
    <link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Bootstrap Core JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo @constant('__PUBLIC__');?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</head>
<body id="login">
<div class="login-logo">
    <a href="index.html"><img src="<?php echo @constant('__PUBLIC__');?>
/images/logo.png" alt=""/></a>
</div>
<h2 class="form-heading">login</h2>

<div class="app-cam">
    <form action="" method="post">
        <input type="text" name="name" placeholder="名称">
        <input type="password" name="password" placeholder="密码">
        <div class="submit">
            <input type="submit" value="登录">
        </div>

    </form>
</div>
</body>
</html>
<?php }
}
