<?php

final class Application
{
    public static function run()
    {
        self::_init();
        set_error_handler(array(__CLASS__, 'error'));
        register_shutdown_function(array(__CLASS__, 'fatal_error'));
        self::_user_import();
        self::_set_url();
        spl_autoload_register(array(__CLASS__, '_autoload'));
        self::_create_demo();
        self::_app_run();
    }

    /*
    * 初始化框架
    */
    private static function _init()
    {
        //加载配置项
        C(include CONFIG_PATH . '/config.php');

        //加载公共配置项
        $commonPath = COMMON_CONFIG_PATH . '/config.php';
        $commonConfig = <<<str
<?php
return array(
    //配置项 => 配置值
);
?>
str;
        is_file($commonPath) || file_put_contents($commonPath, $commonConfig);
        //加载用户配置项
        C(include $commonPath);

        //用户配置项
        $userPath = APP_CONFIG_PATH . '/config.php';
        $usrConfig = <<<str
<?php
return array(
    //配置项 => 配置值
);
?>
str;
        is_file($userPath) || file_put_contents($userPath, $usrConfig);
        //加载用户配置项
        C(include $userPath);

        //设置默认时区
        date_default_timezone_set(C('DEFAULT_TIME_ZONE'));

        C('SESSION_AUTO_START') && session_start();

        is_file(APP_TPL_PATH . '/success.html') || copy(TPL_PATH . '/success.html', APP_TPL_PATH . '/success.html');
        is_file(APP_TPL_PATH . '/error.html') || copy(TPL_PATH . '/error.html', APP_TPL_PATH . '/error.html');
    }

    /*
     * 加载公共Lib文件
     */
    private static function _user_import()
    {
        $fileArr = C('AUTO_LOAD_FILE');
        foreach ($fileArr as $v)
        {
            require_once COMMON_LIB_PATH . '/' . $v;
        }
    }

    /*
     * 设置外部路径
     */
    private static function _set_url()
    {
        $path = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
        $path = str_replace('\\', '/', $path);
        define('__APP__', $path);
        define('__ROOT__', dirname(__APP__));
        define('__TPL__', __ROOT__ . '/' . APP_NAME . '/Tpl');
        define('__PUBLIC__', __TPL__ . '/Public');
    }

    /*
     * 创建默认控制器
     */

    private static function _create_demo()
    {
        $path = APP_CONTROLLER_PATH . '/IndexController.class.php';
        $str = <<<str
<?php
class IndexController extends Controller
{
    public function index(){
        echo '欢迎使用SUAPP框架';
    }
}
str;
        is_file($path) || file_put_contents($path, $str);
    }

    /*
     * 实例化应用控制器
     */
    private static function _app_run()
    {
        $c = isset($_GET[C('VAR_CONTROLLER')]) ? $_GET[C('VAR_CONTROLLER')] : 'Index';
        $a = isset($_GET[C('VAR_ACTION')]) ? $_GET[C('VAR_ACTION')] : 'index';
        //定义控制器及方法常量
        define('CONTROLLER', $c);
        define('ACTION', $a);
        $c .= 'Controller';
        if (class_exists($c))
        {
            $obj = new $c();
            if (!method_exists($obj, $a))
            {
                if (method_exists($obj, '__empty'))
                {
                    $obj->__empty();
                } else
                {
                    halt('控制器' . $c . '方法' . $a . '不存在...');
                }
            } else
            {
                $obj->$a();
            }
        } else
        {
            $obj = new EmptyControlelr();
            $obj->index();
        }

    }

    /*
     * 另外错误提示
     */

    public static function fatal_error()
    {
        if ($e = error_get_last())
        {
            self::error($e['type'], $e['message'], $e['file'], $e['line']);
        }
    }

    /*
     * 错误提示
     */

    public static function error($errno, $error, $file, $line)
    {
        switch ($errno)
        {
            case E_ERROR:
            case E_PARSE:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_USER_ERROR:
                $msg = $error . $file . " 第{$line}行 ";
                halt($msg);
                break;

            case E_STRICT:
            case E_USER_WARNING:
            case E_USER_NOTICE:
            default:
                if (DEBUG)
                {
                    include TPL_PATH . '/notice.html';
                }
                break;
        }
    }

    /*
     * 自动载入功能
     */

    private static function _autoload($classname)
    {
        switch (true)
        {
            //控制器判断
            case strlen($classname) > 10 && substr($classname, -10) == 'Controller':
                $path = APP_CONTROLLER_PATH . '/' . $classname . '.class.php';
                if (!is_file($path))
                {
                    $emptyPath = APP_CONTROLLER_PATH . '/EmptyController.class.php';
                    if (is_file($emptyPath))
                    {
                        include $emptyPath;
                        return;
                    } else
                    {
                        halt($path . '控制器未找到....');
                    }
                }
                include $path;
                break;
            //模型判断
            case strlen($classname) > 5 && substr($classname, -5) == 'Model':
                $path = COMMON_MODEL_PATH . '/' . $classname . '.class.php';
                include $path;
                break;
            //框架判断
            default:
                $path = TOOL_PATH . '/' . $classname . '.class.php';
                is_file($path) || halt($path . '框架类未找到....');
                include $path;
                break;
        }

    }
}

?>