<?php

class LoginController extends Controller
{
    function index()
    {
        if (IS_POST)
        {

            if (empty($_POST['name']) || empty($_POST['password']))
            {
                echo json_encode(array(
                    'status' => '2',
                    'msg' => '登录失败'
                ));
                exit;
            }
            $user = K('User')->field('user_id, mobile_phone, password')->where("mobile_phone = '" . $_POST['name'] . "'")->ones();
            if (empty($user))
            {
                echo json_encode(array(
                    'status' => '2',
                    'msg' => '登录失败'
                ));
                exit;
            }
            $password = $user['password'];
            $passwords = md5($_POST['password']);
            if ($password == $passwords)
            {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['name'] = $user['mobile_phone'];
                echo json_encode(array(
                    'status' => '1',
                    'msg' => '登录成功'
                ));
                exit;
            } else
            {
                echo json_encode(array(
                    'status' => '2',
                    'msg' => '登录失败'
                ));
                exit;
            }
            exit;

        }
        $this->assign('web', '登录页面');
        $this->display();
    }
    function out()
    {
        session_unset();
        session_destroy();
        go(__APP__ . '?c=Login');
    }
}