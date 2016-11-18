<?php
/* Smarty version 3.1.29, created on 2016-09-02 18:50:55
  from "D:\WWW\SUAPP\Index\Tpl\Login\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c9598f8b52e9_88310600',
  'file_dependency' => 
  array (
    '106bb613556898fe5ddf6f43184e22b35d8bf4e6' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Index\\Tpl\\Login\\index.html',
      1 => 1472813453,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_57c9598f8b52e9_88310600 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="col-xs-12 app-login">
    <form action="javascript:;" method="post">
        <input type="text" id="name" name="name" class="form-control" placeholder="名称">
        <input type="password" id="password" name="password" class="form-control" placeholder="密码">
        <input type="submit" onclick="login()" value="登录" class="weui_btn weui_btn_primary">
    </form>
    <div class="msg"></div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    function login() {
        var name = $("#name").val();
        var password = $("#password").val();

        $.ajax({
            url: '<?php echo @constant('__APP__');?>
?c=Login',
            data: {
                name: name,
                password: password,
            },
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if (data.status == 1) {
                    location.href = '<?php echo @constant('__APP__');?>
?c=User';
                } else {
                    $(".msg").html(data.msg);
                }
            },
            error: function () {
                alert("登录失败！");
            }
        });
    }
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
