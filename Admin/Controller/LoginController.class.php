<?php

class LoginController extends Controller
{
    public function index()
    {
        if (IS_POST)
        {
            $user = K('Admin')->admin($_POST['name'], $_POST['password']);
            if (!empty($user))
            {
                $_SESSION['name'] = $user['name'];
                $_SESSION['password'] = $user['password'];
                $this->success('登录成功', __APP__);
            } else
            {
                $this->success('登录失败', __APP__ . '?c=Login');
            }
        }
        $this->display();
    }

    public function out()
    {
        session_unset();
        session_destroy();
        $this->success('退出成功', __APP__ . '?c=Login');
    }
}