<?php
return array(
    //验证码位数
    'CODE_LEN' => 4,

    //默认时区
    'DEFAULT_TIME_ZONE' => 'PRC',
    'SESSION_AUTO_START' => TRUE,
    'VAR_CONTROLLER' => 'c',
    'VAR_ACTION' => 'a',
    //是否开启日志
    'SAVE_LOG' => TRUE,
    //错误跳转地址
    'ERROR_URL' => '',
    'ERROR_MSG' => '网站出错了...',
    //自动加载Common/Lib下文件,可以加载多个
    'AUTO_LOAD_FILE' => array('Page.class.php'),

    //数据库连接参数
    'DB_CHARSET' => 'utf8',
    'DB_HOST' => '127.0.0.1',
    'DB_PORT' => '3306',
    'DB_USER' => 'root',
    'DB_PASSWORD' => 'root',
    'DB_DATABASE' => 'cheshi',
    'DB_PREFIX' => 'su_',
    //smarty配置项
    'SMARTY_ON' => true,
    'LEFT_DELIMITER' => '{',
    'RIGHT_DELIMITER' => '}',
    'CACHE_ON' => false,
    'CACHE_TIME' => 60,

);