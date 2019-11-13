<?php
/**
 *author    : whisper
 *crateTime : 2019/11/13 14:25
 */


namespace app\index\controller;
use think\Controller;
use think\Response;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;

class Wpay extends Controller
{
    protected $config = [
        'appid' => 'wx23ec662bd0365933', // APP APPID
        'app_id' => 'wx23ec662bd0365933', // 公众号 APPID
        'miniapp_id' => 'wxb3fxxxxxxxxxxx', // 小程序 APPID
        'mch_id' => '1533967131',
        'key' => 'A5K86me4Os5AM6010f08edk97f22ebaB',
        'notify_url' => 'http://h5-api.gebodata.com/v1/callback/notify',
        'cert_client' => '', // optional，退款等情况时用到
        'cert_key' => '',// optional，退款等情况时用到
        'log' => [ // optional
            'file' => '../runtime/log/wechat.log',
            'level' => 'debug', // 建议生产环境等级调整为 info，开发环境为 debug
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
        'http' => [ // optional
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
            // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
        ],
        'mode' => 'normal', // optional, dev/hk;当为 `hk` 时，为香港 gateway。
    ];

    public function index()
    {
        $order = [
            'out_trade_no' => time(),
            'total_fee' => '1', // **单位：分**
            'body' => 'test body - 测试',
            //'openid' => 'onkVf1FjWS5SBIixxxxxxx'
        ];

        $pay = Pay::wechat($this->config)->scan($order);
        $pay_url = $pay['code_url'];//echo $pay_url;
        // Create a basic QR code
        $qrCode = new QrCode();
        $qrCode->setText($pay_url);
        $qrCode->setSize(300);

// Set advanced options
        $qrCode->setWriterByName('png');
        $qrCode->setMargin(8);
        $qrCode->setEncoding('UTF-8');
        $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::MEDIUM());
        $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
        $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
        $qrCode->setRoundBlockSize(true);
        $qrCode->setValidateResult(false);
        $qrCode->setWriterOptions(['exclude_xml_declaration' => true]);
        /*header('Content-Type: '.$qrCode->getContentType());
        echo $qrCode->writeString();*/
        return new Response($qrCode->writeString(), 200, ['Content-Type' => $qrCode->getContentType()]);

        // $pay->appId
        // $pay->timeStamp
        // $pay->nonceStr
        // $pay->package
        // $pay->signType
    }

    public function pay_qr()
    {
        return $this->fetch();
    }

    public function notify()
    {
        $pay = Pay::wechat($this->config);

        try{
            $data = $pay->verify(); // 是的，验签就这么简单！

            Log::debug('Wechat notify', $data->all());
        } catch (\Exception $e) {
            // $e->getMessage();
        }

        return $pay->success()->send();// laravel 框架中请直接 `return $pay->success()`
    }
}