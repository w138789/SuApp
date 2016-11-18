<?php
//打印函数
function p($arr)
{
    if (is_bool($arr) || is_null($arr))
    {
        var_dump($arr);
    } else
    {
        echo '<pre style="padding: 10px; border-radius: 5px; background: #f5f5f5; border: 1px; solid #ccc; font-size: 14px;">' . print_r($arr, true) . '</pre>';
    }
}

/*
 * 加载
 */
function C($var = NULL, $value = NULL)
{
    static $config = array();
    //加载配置项
    if (is_array($var))
    {
        $config = array_merge($config, array_change_key_case($var, CASE_UPPER));
        return;
    }

    //读取或者动态改变配置项
    if (is_string($var))
    {
        $var = strtoupper($var);
        //两个参数传递
        if (!is_null($value))
        {
            $config[$var] = $value;
            return;
        }

        return isset($config[$var]) ? $config[$var] : NULL;
    }

    //返回所有配置项
    if (is_null($var) && is_null($value))
    {
        return $config;
    }
}

function go($url, $time = 0, $msg = '')
{
    if (!headers_sent())
    {
        $time == 0 ? header('Location:' . $url) : header("refresh:{$time};url={$url}");
        die($msg);
    } else
    {
        echo "<meta http-equiv='refresh' content='{$time}; URL=$url'>";
        if ($time) die($msg);
    }
}

function halt($msg, $level = 'ERROR', $type = 3, $dest = null)
{
    if (is_array($msg))
    {
        Log::write($msg['message'], $level, $type, $dest);
    } else
    {
        Log::write($msg, $level, $type, $dest);
    }
    $e = array();
    if (DEBUG)
    {
        if (!is_array($msg))
        {
            $trace = debug_backtrace();
            $e['message'] = $msg;
            $e['file'] = $trace[0]['file'];
            $e['line'] = $trace[0]['line'];
            $e['class'] = isset($trace[0]['class']) ? $trace[0]['class'] : '';
            $e['funtion'] = isset($trace[0]['function']) ? $trace[0]['function'] : '';
            ob_start();
            debug_print_backtrace();
            $e['trace'] = htmlspecialchars(ob_get_clean());
        } else
        {
            $e = $msg;
        }
    } else
    {
        if ($url = C('ERROR_URL'))
        {
            go($url);
        } else
        {
            $e['message'] = C('ERROR_MSG');
        }
    }
    include_once TPL_PATH . '/halt.html';
    die;
}

function M($table = null)
{
    $obj = new Model($table);
    return $obj;
}

function K($model)
{
    $model .= 'Model';
    return new $model;
}

?>