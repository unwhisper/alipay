<?php
namespace app\index\controller;

use think\Controller;
use think\facade\Request;
use alipay\Pagepay;
use alipay\Wappay;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }


    //pc扫码支付
    public function pagePay()
    {

        //商户订单号，商户网站订单系统中唯一订单号，必填
        $data['out_trade_no'] = trim(Request::post('WIDout_trade_no'));

        //订单名称，必填
        $data['subject'] = trim(Request::post('WIDsubject'));

        //付款金额，必填
        $data['total_amount'] = trim(Request::post('WIDtotal_amount'));

        //商品描述，可空
        $data['body'] = trim(Request::post('WIDbody'));

        Pagepay::pay($data);


        //构造参数
        /*$payRequestBuilder = new AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);

        $aop = new AlipayTradeService($config);*/

        /**
         * pagePay 电脑网站支付请求
         * @param $builder 业务参数，使用buildmodel中的对象生成。
         * @param $return_url 同步跳转地址，公网可以访问
         * @param $notify_url 异步通知地址，公网可以访问
         * @return $response 支付宝返回的信息
         */
        /*$response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

        //输出表单
        var_dump($response);*/
    }

    //wap端支付
    public function wapPay()
    {
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $data['out_trade_no'] = trim(Request::post('out_trade_no'));

        //订单名称，必填
        $data['subject'] = trim(Request::post('subject'));

        //付款金额，必填
        $data['total_amount'] = trim(Request::post('total_amount'));

        //商品描述，可空
        $data['body'] = trim(Request::post('body'));
        Wappay::pay($data);
    }

}
