<?php
/**
 *author    : whisper
 *crateTime : 2019/11/13 14:07
 */
namespace app\index\controller;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;

class Apay
{
    protected $config = [
        'app_id' => '2016092600598325',
        'notify_url' => 'http://外网可访问网关地址/1111.trade.page.pay-PHP-UTF-8/notify_url.php',
        'return_url' => 'http://外网可访问网关地址/1111.trade.page.pay-PHP-UTF-8/return_url.php',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0hlUkdjnolJKaXo0KDghnJJtMPeErMndnh9/CGsTuzIZffSMRsx6oE6YsvbD4AhRiFrjxw0B2aWp/Q4Q4tHF69Hyx2merI32hFIdPNDUDbYijIWNWijKE0p060ROVMO7HhcAzwOR0sKU9Zp2VwghCDSqZYSfB5C49Z6jOPlAoCnLEU7WSLwboiQHcc8PNKJDLogvRA8VIubKx8O+drtv4i07n5qjl6FJ/SIUNzKZy4yNwEa9K2cXq5DnnmzEXJ79EBH5yAoH7a3+MQdJFbJbGOw4fqJBJnmaKd5pT6Rl1bbPk08HbBYj2qkjIxItT5A2oaRCA/H6dTFC/qgn3rHzIwIDAQAB',
        // 加密方式： **RSA2**
        'private_key' => 'MIIEowIBAAKCAQEA0hlUkdjnolJKaXo0KDghnJJtMPeErMndnh9/CGsTuzIZffSMRsx6oE6YsvbD4AhRiFrjxw0B2aWp/Q4Q4tHF69Hyx2merI32hFIdPNDUDbYijIWNWijKE0p060ROVMO7HhcAzwOR0sKU9Zp2VwghCDSqZYSfB5C49Z6jOPlAoCnLEU7WSLwboiQHcc8PNKJDLogvRA8VIubKx8O+drtv4i07n5qjl6FJ/SIUNzKZy4yNwEa9K2cXq5DnnmzEXJ79EBH5yAoH7a3+MQdJFbJbGOw4fqJBJnmaKd5pT6Rl1bbPk08HbBYj2qkjIxItT5A2oaRCA/H6dTFC/qgn3rHzIwIDAQABAoIBAEIqJf70XyY4YiTLjmdoHfWwC2ETYh4ESJ3Gb3wYNJOMWIjZHeAh/zBC8EXT/qWsGPknHnqONxny2RDPgDPeOkVkzd9M/OJ8prjPH1QKs+1JgaHdYUGWfOUMWrvIvB5nsaLtPZz0E9Va4Axkw4XvEnACHfNwi6CXTBhWCDMmE9scHDlNCRRmq587lBwPvDmCiqaeEmEO0GaiuCeQtxe2T0jiI9XjO1jefRDh4JlyDrKkwztl7dANkeQ8R7/rsTS5yaKfR94rp54S9077NKxZvKorZrZF7zTCOqU8bPw+glUTBDF9kikZlc3kC99ECM8XbMeiw1y4Gav5OdU4OIkkEpECgYEA6ot9eV1ezePZq33Jb6dDmvIIy1AdDHiBwvOBo1YU+KlRWdtgUkAm0vQy196IqrndCOBIS7wx++zCqrmibkhdHtJOs/bthPcRCevTkqJmUHsV9Et7UQky8jMFx/PIJz99qQRunlKqO/tGps9b0y/Dk5kxCzYKaNrFxKUk7a87TpkCgYEA5VFfK3XeB22NYnHfMWqt87kog9QtWuWFh+f+f2TNuTUYZy4t7GyHjTuhD8adThwmDORYep0FoLDMuYxlZ9+N1hlu8j9chG4qRvdpeYEMMw3EZOZnAnA9LLcdd9XYN/GPTaxQQlEnjNX/OMXHJU7E74z6FF2brZXFECZPOLrMkRsCgYEA4tjLIMj32rbXXpAodb8XGhOiAdKYZelfx8hwyCOH4QESV5BgVu0JH9tkGXl4QXfGmsEh6244Aer6VNl6iqOevSK3UEQxcfrsFeZrGVXNE2YY09D1kmkNR0el/cCBA8TaqtBIlQRq9dyQduHzdAysYmM2FhvMcaG2yfzX/LMQ73ECgYAh1DM58hVi+yJUV4AZhidLQRFdATv/oMRmHC9LE8/VdqO29PUJX6lPiHBmJ2KlVzm1xSnYTLm7ztkktjVvcWc3ImFfk0FOuAG8nlsM9aCbF3jVebfQgEZGBm1udDmFZzlAuB7O6bHv8NHJykNqmYgr3pw1zOleXi3ICB6/u67Z6QKBgB1P8K/+HkzkD4FFdqGtJ2OZypXcI8HXFiuMmR1iG8r9Le8ZJTrSgmFPNM+nrSbGPfiXYPNqBZpaEAj6x1WVEPoOERtfHoogi+lbw8AOzIqsv/0U25gixSHl6HxqaTR58Y4umuq8NExwsYWR24UaP4D37qg8HlIn5KMkEdprdUjv',
        'log' => [ // optional
            'file' => '../runtime/log/alipay.log',
            'level' => 'debug', // 建议生产环境等级调整为 info，开发环境为 debug
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
        'http' => [ // optional
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
            // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
        ],
        'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
    ];

    public function index()
    {
        $order = [
            'out_trade_no' => time(),
            'total_amount' => '1',
            'subject' => 'test subject - 测试',
        ];

        $alipay = Pay::alipay($this->config)->web($order);

        return $alipay->send();// laravel 框架中请直接 `return $alipay`
    }

    public function verify()
    {
        $data = Pay::alipay($this->config)->verify(); // 是的，验签就这么简单！

        // 订单号：$data->out_trade_no
        // 支付宝交易号：$data->trade_no
        // 订单总金额：$data->total_amount
    }

    public function notify()
    {
        $alipay = Pay::alipay($this->config);

        try{
            $data = $alipay->verify(); // 是的，验签就这么简单！

            // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
            // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）；
            // 4、验证app_id是否为该商户本身。
            // 5、其它业务逻辑情况

            Log::debug('Apay notify', $data->all());
        } catch (\Exception $e) {
            // $e->getMessage();
        }

        return $alipay->success()->send();// laravel 框架中请直接 `return $alipay->success()`
    }
}