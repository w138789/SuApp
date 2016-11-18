<?php

final class SUPHP
{
    public static function run()
    {
        self::_set_const();
        if (DEBUG)
        {
            self::_create_dir();
            self::_import_file();
        } else
        {
            error_reporting(0);
            require_once TEMP_PATH . '/~boot.php';
        }
        Application::run();
    }

    /*
     * 载入框架所需常量
     */
    private static function _set_const()
    {
        $path = str_replace('\\', '/', __FILE__);
        define('SUPHP_PATH', dirname($path));
        define('CONFIG_PATH', SUPHP_PATH . '/Config');
        define('DATA_PATH', SUPHP_PATH . '/Data');
        define('TPL_PATH', DATA_PATH . '/Tpl');
        define('LIB_PATH', SUPHP_PATH . '/Lib');
        define('CORE_PATH', LIB_PATH . '/Core');
        define('FUNCTION_PATH', LIB_PATH . '/Function');

        define('ROOT_PATH', dirname(SUPHP_PATH));

        //临时目录
        define('TEMP_PATH', ROOT_PATH . '/Temp');
        define('LOG_PATH', TEMP_PATH . '/Log');
        //应用目录
        define('APP_PATH', ROOT_PATH . '/' . APP_NAME);
        define('APP_CONFIG_PATH', APP_PATH . '/Config');
        define('APP_CONTROLLER_PATH', APP_PATH . '/Controller');
        define('APP_TPL_PATH', APP_PATH . '/Tpl');
        define('APP_PUBLIC_PATH', APP_TPL_PATH . '/Public');
        define('APP_COMPILE_PATH', TEMP_PATH . '/' . APP_NAME . '/Compile');
        define('APP_CACHE_PATH', TEMP_PATH . '/' . APP_NAME . '/Cache');

        //创建公共文件夹
        define('COMMON_PATH', ROOT_PATH . '/Common');
        //公共配置项文件夹
        define('COMMON_CONFIG_PATH', COMMON_PATH . '/Config');
        //公共模型文件夹
        define('COMMON_MODEL_PATH', COMMON_PATH . '/Model');
        //公共库文件夹
        define('COMMON_LIB_PATH', COMMON_PATH . '/Lib');
        //工具类文件夹
        define('EXTENDS_PATH', SUPHP_PATH . '/Extends');
        define('ORG_PATH', EXTENDS_PATH . '/Org');
        define('TOOL_PATH', EXTENDS_PATH . '/Tool');
//        define('APP_COMPILE_PATH')

        define('IS_POST', ($_SERVER['REQUEST_METHOD'] == 'POST') ? true : false);
//        echo SUPHP_PATH;

    }

    private static function _create_dir()
    {
        $arr = array(
            APP_PATH,
            APP_CONFIG_PATH,
            APP_CONTROLLER_PATH,
            APP_TPL_PATH,
            APP_PUBLIC_PATH,
            TEMP_PATH,
            LOG_PATH,
            COMMON_CONFIG_PATH,
            COMMON_MODEL_PATH,
            COMMON_LIB_PATH,
            APP_COMPILE_PATH,
            APP_CACHE_PATH,
        );
        foreach ($arr as $v)
        {
            is_dir($v) || mkdir($v, 0777, true);
        }
    }

    /*
     * 载入框架所需文件
     */
    private static function _import_file()
    {
        $fileArr = array(
            FUNCTION_PATH . '/function.php',
            ORG_PATH . '/Smarty/Smarty.class.php',
            CORE_PATH . '/SmartyView.class.php',
            CORE_PATH . '/Controller.class.php',
            CORE_PATH . '/Log.class.php',
            CORE_PATH . '/Application.class.php',
        );
        $str = '';
        foreach ($fileArr as $v)
        {
            $str .= trim(substr(file_get_contents($v), 5, -2));
            require_once $v;
        }
        $str = "<?php \t\n" . $str;
        file_put_contents(TEMP_PATH . '/~boot.php', $str);
    }
}


SUPHP::run();