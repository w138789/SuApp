<?php

class CommonController extends Controller
{
    function __init()
    {
        if (empty($_SESSION['user_id']) || empty($_SESSION['name']))
        {
            //判断是不是微信浏览器
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false && empty($_SESSION['user_id']))
            {
                $this->wechatObj = new Weixin();
                $this->wechatObj->code();
            } else
            {
                go(__APP__ . '?c=Login');
            }

        }
    }

    public function user_login()
    {
        $code = $_GET["code"];
        $get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.C('APPID').'&secret='.c('APPSECRET').'&code='.$code.'&grant_type=authorization_code';
        $res = $this->wechatObj->get_curl($get_token_url);
        $json_obj = json_decode($res,true);
        //根据openid和access_token查询用户信息
        $openid = $json_obj['openid'];
        $user = M('user')->where("openid LIKE '" . $openid . "'")->ones();
        if (!empty($user))
        {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['openid'];
        }
        $this->wechatObj->user_obj($openid);
        go(__APP__ . '?c=User');
    }
}