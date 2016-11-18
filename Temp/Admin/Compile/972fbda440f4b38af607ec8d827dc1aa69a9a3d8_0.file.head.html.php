<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:50:37
  from "D:\WWW\SUAPP\Admin\Tpl\layout\head.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582eceedb60d36_79790231',
  'file_dependency' => 
  array (
    '972fbda440f4b38af607ec8d827dc1aa69a9a3d8' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Admin\\Tpl\\layout\\head.html',
      1 => 1472269432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582eceedb60d36_79790231 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
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
    <!-- Graph CSS -->
    <link href="<?php echo @constant('__PUBLIC__');?>
/css/lines.css" rel='stylesheet' type='text/css'/>
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
    <!-- Nav CSS -->
    <link href="<?php echo @constant('__PUBLIC__');?>
/css/custom.css" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo @constant('__PUBLIC__');?>
/js/metisMenu.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('__PUBLIC__');?>
/js/custom.js"><?php echo '</script'; ?>
>
    <!-- Graph JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo @constant('__PUBLIC__');?>
/js/d3.v3.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('__PUBLIC__');?>
/js/rickshaw.js"><?php echo '</script'; ?>
>
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">Modern</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img
                        src="<?php echo @constant('__PUBLIC__');?>
/images/1.png"></a>
                <ul class="dropdown-menu">
                    </li>
                    <li class="m_2"><a href="<?php echo @constant('__APP__');?>
?c=Login&a=out"><i class="fa fa-lock"></i>退出</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.html">系统设置</a>
                    </li>
                    <li>
                        <a href="#">会员管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=User&a=lists">会员列表</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">商品管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=Goods&a=lists">商品列表</a>
                            </li>
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=Goods&a=add">添加商品</a>
                            </li>
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=Category&a=lists">分类列表</a>
                            </li>
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=Category&a=add">添加分类</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">广告管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=Advert&a=lists">广告列表</a>
                            </li>
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=Advert&a=add">添加广告</a>
                            </li>
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=Advert&a=tag_list">标签列表</a>
                            </li>
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=Advert&a=tag_add">添加标签</a>
                            </li>
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=Advert&a=nav_list">导航栏列表</a>
                            </li>
                            <li>
                                <a href="<?php echo @constant('__APP__');?>
?c=Advert&a=nav_add">添加导航</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>

        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
        <div style="margin: 0px 30px 0px 30px; padding-top: 50px;"><?php }
}
