<?php
ini_set('date.timezone', 'Asia/Shanghai');
error_reporting(E_ERROR);

require_once "lib/WxPay.Api.php";
require_once 'lib/WxPay.Notify.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SUPHP/Lib/Function/function.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SUPHP/Extends/Tool/Model.class.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SUPHP/Lib/Core/Application.class.php';
C(include $_SERVER['DOCUMENT_ROOT'] . '/Common/Config/config.php');

class PayNotifyCallBack extends WxPayNotify
{
    //查询订单
    public function NotifyProcess($data, &$msg)
    {
        $notfiyOutput = array();

        if (!array_key_exists("transaction_id", $data))
        {
            $msg = "输入参数不正确";
            return false;
        }
        //查询订单，判断订单真实性
        if (!$this->Queryorder($data["transaction_id"]))
        {
            $msg = "订单查询失败";
            return false;
        }
        return true;
    }

    //重写回调处理函数

    public function Queryorder($transaction_id)
    {
        $input = new WxPayOrderQuery();
        $input->SetTransaction_id($transaction_id);
        $result = WxPayApi::orderQuery($input);
        if (array_key_exists("return_code", $result)
            && array_key_exists("result_code", $result)
            && $result["return_code"] == "SUCCESS"
            && $result["result_code"] == "SUCCESS"
        )
        {
            $data['order_sn'] = $result['out_trade_no'];
            $data['status'] = 702;
            $this->pay_success($data);
            return true;
        }
        return false;
    }

    //支付成功处理

    public function pay_success($data = array())
    {
        $order_sn = $data['order_sn'];
        $status = $data['status'];
        if ($status != 702) return false;
        //判断订单是否已经修改状态
        $order = M('order_info')->where('order_sn = ' . $order_sn)->ones();
        if ($order['order_status'] != '2' && $order['pay_status'] != '1')
        {
            file_put_contents("pay.log", $order_sn . ' time:' . time() . "\n", FILE_APPEND);
            $data = array(
                'order_status' => '2',
                'pay_status' => '1',
            );
            M('order_info')->where('order_sn = ' . $order_sn)->update($data);
        }
    }
}
$notify = new PayNotifyCallBack();
$notify->Handle(false);
