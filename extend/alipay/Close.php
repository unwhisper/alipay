<?php
namespace alipay;

require_once dirname ( __FILE__ ).'/pay/service/AlipayTradeService.php';
require_once dirname ( __FILE__ ).'/pay/buildermodel/AlipayTradeCloseContentBuilder.php';

/**
 * 统一收单交易关闭接口
 *
 * 用法:
 * 调用 \alipay\Close::exec($query_no) 即可
 *
 */
class Close
{
    // 商户订单号(out_trade_no) or 支付宝交易号(trade_no) 二选一
    const QUERY_TYPE = 'trade_no';

    public static function exec($query_no)
    {
        // 1.构建请求参数
        $RequestBuilder = new \AlipayTradeCloseContentBuilder();
        if (self::QUERY_TYPE == 'trade_no') {
            $RequestBuilder->setTradeNo(trim($query_no));
        } else {
            $RequestBuilder->setOutTradeNo(trim($query_no));
        }

        // 2.获取配置
        $config = config('alipay');
        $aop    = new \AlipayTradeService($config);

        // 3.发起请求
        $response = $aop->Close($RequestBuilder);

        // 4.转为数组格式返回
        $response = json_decode(json_encode($response), true);

        // 5.进行结果处理
        if (!empty($response['code']) && $response['code'] != '10000') {
            self::processError('交易关闭接口出错, 错误码: '.$response['code'].' 错误原因: '.$response['sub_msg']);
        }

        return $response;
    }

    /**
     * 统一错误处理接口
     * @param  string $msg 错误描述
     */
    private static function processError($msg)
    {
        throw new \think\Exception($msg);
    }
}