<?php
return array(
    //数据库连接参数
    'DB_CHARSET' => 'utf8',
    'DB_HOST' => '127.0.0.1',
    'DB_PORT' => '3306',
    'DB_USER' => 'root',
    'DB_PASSWORD' => 'root',
    'DB_DATABASE' => 'su',
    'DB_PREFIX' => 'su_',

    //自动加载Common/Lib下文件,可以加载多个
    'AUTO_LOAD_FILE' => array(
        'Page.class.php',
        'Upload.class.php',
        'Weixin.class.php',
        'Wxpay/WxPay.JsApiPay.php',
        'Wxpay.class.php',
    ),

    //smarty配置项
    'SMARTY_ON' => true,
    'LEFT_DELIMITER' => '{',
    'RIGHT_DELIMITER' => '}',
    'CACHE_ON' => false,
    'CACHE_TIME' => 60,

    //微信配置项
    'TOKEN' => 'weixin',
    'APPID' => 'wx085512e589edf80f',
    'APPSECRET' => '3501f1935c0c32c75f39dc8d0a43fb91',
    'MCHID' => '10053889',
    'KEY' => 'HGM2113ksjdlkasjdk23232131312312',
);