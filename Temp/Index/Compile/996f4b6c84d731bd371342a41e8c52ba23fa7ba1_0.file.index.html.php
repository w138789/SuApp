<?php
/* Smarty version 3.1.29, created on 2016-11-18 18:04:27
  from "D:\WWW\SUAPP\Index\Tpl\User\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ed22b44a489_58866315',
  'file_dependency' => 
  array (
    '996f4b6c84d731bd371342a41e8c52ba23fa7ba1' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Index\\Tpl\\User\\index.html',
      1 => 1472897321,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
    'file:../layout/bottom.html' => 1,
  ),
),false)) {
function content_582ed22b44a489_58866315 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\WWW\\SUAPP\\SUPHP\\Extends\\Org\\Smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div style="margin-top: 40px">
    <div class="col-xs-12" style="height: 150px; background: #2ecc71;">
        <div style="float: left; margin:30px 0 0 20px; width: 20%;">
            <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['headimgurl'];?>
" alt="" style="-webkit-border-radius: 50%;">
        </div>
        <div style="float: left; margin:30px 0 0 30px; color: #666;">
            <p><?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
</p>

            <p>关注时间: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['subscribe_time'],'%Y-%m-%d');?>
</p>
        </div>
    </div>
    <div class="col-xs-12" style="margin-top: 10px;background: #fff; border:1px solid #ccc">
        <div class="col-xs-6" style="float: left; text-align: center; color: #666;">
            <h5>佣金</h5>

            <h5><?php echo $_smarty_tpl->tpl_vars['user']->value['mymoney'];?>
</h5>
        </div>
        <div class="col-xs-6" style="float: left; text-align: center;border-left: 1px solid #ccc; color: #666;">
            <h5>积分</h5>

            <h5><?php echo $_smarty_tpl->tpl_vars['user']->value['mymoney'];?>
</h5>
        </div>
    </div>
    <div class="col-xs-12" style="margin-top: 10px; background: #fff;">
        <ul style="margin-bottom: 0">
            <a href="<?php echo @constant('__APP__');?>
?c=User&a=order">
                <li style="padding-left:20px; line-height: 45px; border-bottom: solid 1px #ccc; color: #666;">
                    <span class="glyphicon glyphicon-sort-by-order" style="margin-right: 10px"></span>全部订单
                </li>
            </a>
            <a href="<?php echo @constant('__APP__');?>
?c=Login&a=out">
                <li style="padding-left:20px; line-height: 45px; color: #666;">
                    <span class="glyphicon glyphicon-user" style="margin-right: 10px"></span>退出登录
                </li>
            </a>
        </ul>
    </div>
</div>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
