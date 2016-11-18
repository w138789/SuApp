<?php

class Controller extends SmartyView
{
    public $val = array();

    public function __construct()
    {
        if (C('SMARTY_ON'))
        {
            parent::__construct();
        }

        if (method_exists($this, '__init'))
        {
            $this->__init();
        }
        if (method_exists($this, '__auto'))
        {
            $this->__auto();
        }
        if (method_exists($this, '__autos'))
        {
            $this->__autos();
        }
    }

    protected function success($msg = null, $url = null, $time = 3)
    {
        $url = isset($url) ? "window.location.href='" . $url . "'" : "window.history.back(-1)";
        include_once APP_TPL_PATH . '/success.html';
        exit;
    }

    protected function error($msg = null, $url = null, $time = 3)
    {
        $url = isset($url) ? "window.location.href='" . $url . "'" : "window.history.back(-1)";
        include_once APP_TPL_PATH . '/error.html';
        exit;
    }

    protected function assign($val, $value)
    {
        if (C('SMARTY_ON'))
        {
            parent::assign($val, $value);
        }

        $this->val[$val] = $value;

    }

    protected
    function display($tpl = null)
    {
        $path = $this->get_tpl($tpl);
        is_file($path) || halt($path . '模板不存在');
        if (C('SMARTY_ON'))
        {
            parent::display($path);
        } else
        {
            extract($this->val);
            include $path;
        }

        die;
    }

    public function get_tpl($tpl)
    {
        if (is_null($tpl))
        {
            $path = APP_TPL_PATH . '/' . CONTROLLER . '/' . ACTION . '.html';
        } else
        {
            $suffix = strrchr($tpl, '.');
            $tpl = empty($suffix) ? $tpl . '.html' : $tpl;
            $path = APP_TPL_PATH . '/' . CONTROLLER . '/' . $tpl;
        }
        return $path;
    }
}

?>