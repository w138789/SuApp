<?php

class Wxpay
{

    public function pay($orders = array())
    {
        $path = 'http://' . $_SERVER['HTTP_HOST'] . '/Common/Lib/Wxpay/notify.php';
        //①、获取用户openid
        $tools = new JsApiPay();
        $openId = $tools->GetOpenid();
        $input = new WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        $input->SetOut_trade_no($orders['order_sn']);
        $input->SetTotal_fee($orders['money'] * 100);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url($path);
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = WxPayApi::unifiedOrder($input);
        $data['jsApiParameters'] = $tools->GetJsApiParameters($order);
        $data['editAddress'] = $tools->GetEditAddressParameters();
        return $data;
    }
}