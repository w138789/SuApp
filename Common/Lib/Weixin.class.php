<?php

class Weixin
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if ($this->checkSignature())
        {
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN"))
        {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature)
        {
            return true;
        } else
        {
            return false;
        }
    }

    //自动回复消息
    public function responseMsg($data = array(), $type = '')
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr))
        {
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            //文本消息
            $textTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            <FuncFlag>0</FuncFlag>
                        </xml>";
            //回复图文消息
            $newsTpl = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <ArticleCount>%s</ArticleCount>
                            <Articles>";
            foreach ($data as $k => $v)
            {
                $newsTpl .= "<item>
                            <Title><![CDATA[" . $v['title'] . "]]></Title>
                            <Description><![CDATA[" . $v['description'] . "]]></Description>
                            <PicUrl><![CDATA[" . $v['picurl'] . "]]></PicUrl>
                            <Url><![CDATA[" . $v['url'] . "]]></Url>
                            </item>";
            }
            $newsTpl .= "</Articles>
                        </xml>";
            //关注回复
            if ($postObj->Event == 'subscribe')
            {
                $msgType = $type;
                switch ($type)
                {
                    //文字消息
                    case 'text':
                        $contentStr = $data['content'];
                        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $resultStr;
                        break;
                    //图文信息
                    case 'news':
                        $count = $k + 1;
                        $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, $msgType, $count);
                        echo $resultStr;
                        break;
                }
                //上级ID
                if ($postObj->EventKey)
                {
                    $parent_id = substr($postObj->EventKey, 8);
                }
                //获取用户信息
                $this->user_obj($fromUsername, $parent_id);
            }
            //自动回复
            if (!empty($keyword))
            {
                $msgType = "text";
                $contentStr = "自动回复消息!";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            } else
            {
                echo "Input something...";
            }

        } else
        {
            echo "";
            exit;
        }
    }

    //回复客服消息
    public function kefu($openid, $data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=' . $this->access_token();
        switch ($data['type'])
        {
            case 'text':
                //发送文本消息
                $str = '{
                    "touser":"' . $openid . '",
                    "msgtype":"' . $data['type'] . '",
                    "text":
                    {
                         "content":"' . $data['content'] . '"
                    }
                 }';
                break;
            case 'news':
                //发送图文消息
                $str = '{
                        "touser":"' . $openid . '",
                        "msgtype":"' . $data['type'] . '",
                        "news":{
                                "articles": [';
                foreach ($data['news'] as $k => $v)
                {
                    $str .= '{
                             "title":"' . $v['title'] . '",
                             "description":"' . $v['description'] . '",
                             "url":"' . $v['url'] . '",
                             "picurl":"' . $v['picurl'] . '"
                         }';
                    if (count($data['news']) > $k + 1)
                    {
                        $str .= ',';
                    }
                }
                $str .= ']
                    }
                }';
                break;
        }
        return $this->post_curl($url, $str);
    }

    //获取用户信息
    public function user_obj($fromUsername, $parent_id = 0)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . C('APPID') . "&secret=" . C('APPSECRET');
        $access = $this->get_curl($url);
        $access = json_decode($access, true);
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=" . $access['access_token'] . "&openid=" . $fromUsername;
        $user = $this->get_curl($url);
        $user = json_decode($user, true);
        $data = array();
        $data['openid'] = $user['openid'];
        $data['nickname'] = $user['nickname'];
        $data['headimgurl'] = $user['headimgurl'];
        $data['parent_id'] = $parent_id;
        //查询数据库是否有数据
        $str = M('user')->field('openid')->where("openid = '" . $fromUsername . "'")->ones();
        if (empty($str))
        {
            M('user')->add($data);
        } else
        {
            M('user')->where("openid LIKE '" . $fromUsername . "'")->update($data);
        }
    }

    //获取用户信息code,access_token
    public function code()
    {
        $REDIRECT_URI = __APP__ . '?c=Common&a=user_login';
        $scope = 'snsapi_base';//不需要授权
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . C('APPID') . '&redirect_uri=' . urlencode($REDIRECT_URI) . '&response_type=code&scope=' . $scope . '&state=123#wechat_redirect';
        header("Location:" . $url);
    }

    //生成用户二维码
    public function qrcode($user_id)
    {
        $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=" . $this->access_token();
        $str = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": ' . $user_id . '}}}';
        $ticket = $this->post_curl($url, $str);
        return $ticket = json_decode($ticket, true);
    }

    public function access_token()
    {
        $wxconfig = M('wxconfig')->where('id = 1')->ones();
        $times = time() - $wxconfig['token_time'];
        if ($times < 3000)
        {
            return $wxconfig['access_token'];
            exit;
        }
        $appid = C('APPID');
        $appsecret = C('APPSECRET');
        $data = $this->get_curl("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=" . $appid . "&secret=" . $appsecret);
        $json = json_decode($data, TRUE);
        if (array_key_exists('errcode', $json) && $json['errcode'] != 0)
        {
            Log::write('access_token获取失败');
            return FALSE;
        } else
        {
            $access_token = $json['access_token'];
            $wxconfig = M('wxconfig')->where('id = 1')->ones();
            $data = array(
                'access_token' => $access_token,
                'token_time' => time(),
            );
            if (empty($wxconfig))
            {
                M('wxconfig')->add($data);
            } else
            {
                M('wxconfig')->where('id = 1')->update($data);
            }
            return $access_token;
        }
    }

    public function get_curl($url = null)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return $file_contents;
    }

    public function post_curl($url = null, $data = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // post数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}