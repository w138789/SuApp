<?php
/* Smarty version 3.1.29, created on 2016-11-18 17:52:35
  from "D:\WWW\SUAPP\Index\Tpl\Goods\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_582ecf63d0ed65_14259583',
  'file_dependency' => 
  array (
    '120383787a26f072f7685f6588c46f33d9d69900' => 
    array (
      0 => 'D:\\WWW\\SUAPP\\Index\\Tpl\\Goods\\index.html',
      1 => 1472886577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layout/head.html' => 1,
  ),
),false)) {
function content_582ecf63d0ed65_14259583 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../layout/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php
$_from = $_smarty_tpl->tpl_vars['gallery']->value;
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
        <div class="swiper-slide"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['img_url'];?>
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
<div class="col-xs-12 good-name">
    <p>
        <?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_name'];?>

    </p>

    <p class="p-price">
        <span>市场价:￥2016</span> <span>会员价:￥1056</span>
    </p>

    <p>
        <span>数量</span>
        <button type="button"
                class="weui_btn weui_btn_mini weui_btn_default"
                onclick="reduce()">-
        </button>
        <span class="sum">1</span>
        <button type="button"
                class="weui_btn weui_btn_mini weui_btn_default"
                onclick="plus()">+
        </button>
    </p>
</div>
<div class="col-xs-12" style="margin-bottom: 35px">
    <div class="goods-content">
        商品详情
    </div>
    <div>
        <?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_desc'];?>

    </div>
</div>

<?php echo '<script'; ?>
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
<nav class="navbar navbar-fixed-bottom">
    <ul id="nav">
        <li class="col-xs-6" style="width: 50%; margin-bottom: 10px; text-align: center">
            <a href="javascript:;">
                <button type="button" class="weui_btn weui_btn_warn add">加入购物车</button>
            </a>
        </li>
        <li class="col-xs-6" style="width: 50%; margin-bottom: 10px; text-align: center">
            <a href="javascript:;">
                <button type="button" class="weui_btn weui_btn_primary buy">立即购买
                </button>
            </a>
        </li>
    </ul>
</nav>
<?php echo '<script'; ?>
 type="text/javascript">
    function plus() {
        var sum = $('.sum').html();
        sum++;
        $('.sum').text(sum);
    }
    function reduce() {
        var sum = $('.sum').html();
        sum--;
        if (sum >= 1) {
            $('.sum').text(sum);
        } else {
            $('.sum').text('1');
        }

    }

    $('.buy').click(function () {
        var goods_num = $('.sum').html();
        var goods_id = '<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_id'];?>
';
        location.href = "<?php echo @constant('__APP__');?>
?c=Mycart&a=add&goods_id=" + goods_id + "&goods_num=" + goods_num;
    });

    $('.add').click(function () {
        var goods_num = $('.sum').html();
        var goods_id = '<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_id'];?>
';
//        location.href = "<?php echo @constant('__APP__');?>
?c=Mycart&a=add&goods_id=" + goods_id + "&goods_num=" + goods_num;
        $.ajax({
            url: "<?php echo @constant('__APP__');?>
?c=Mycart&a=add",
            data: {
                goods_id: goods_id,
                goods_num: goods_num,
            },
            type: 'post',
            dataType: 'json',
            success: function (data) {
                if (data.status == 1) {
                    $(".alert").css("display","block");
                }
            },
            error: function () {
                alert('添加失败');
            }
        });
    });
<?php echo '</script'; ?>
>
<div class="weui_dialog_alert alert" style="display: none;">
    <div class="weui_mask"></div>
    <div class="weui_dialog">
        <div class="weui_dialog_hd"><strong class="weui_dialog_title">添加成功</strong></div>
        <div class="weui_dialog_bd">商品已经成功添加到购物车</div>
        <div class="weui_dialog_ft">
            <a href="javascript:;" class="weui_btn_dialog primary alertnone">确定</a>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
    $('.alertnone').click(function () {
        $('.alert').css('display', 'none');
    });
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
