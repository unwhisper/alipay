<?php
/**
 * Created by PhpStorm.
 * User: jielei
 * Date: 2019.04.16
 * Time: 下午 11:08
 */
return [
    //应用ID,您的APPID。
    'app_id' => "2016092600598325",

    //商户私钥
    'merchant_private_key' => "MIIEowIBAAKCAQEA0hlUkdjnolJKaXo0KDghnJJtMPeErMndnh9/CGsTuzIZffSMRsx6oE6YsvbD4AhRiFrjxw0B2aWp/Q4Q4tHF69Hyx2merI32hFIdPNDUDbYijIWNWijKE0p060ROVMO7HhcAzwOR0sKU9Zp2VwghCDSqZYSfB5C49Z6jOPlAoCnLEU7WSLwboiQHcc8PNKJDLogvRA8VIubKx8O+drtv4i07n5qjl6FJ/SIUNzKZy4yNwEa9K2cXq5DnnmzEXJ79EBH5yAoH7a3+MQdJFbJbGOw4fqJBJnmaKd5pT6Rl1bbPk08HbBYj2qkjIxItT5A2oaRCA/H6dTFC/qgn3rHzIwIDAQABAoIBAEIqJf70XyY4YiTLjmdoHfWwC2ETYh4ESJ3Gb3wYNJOMWIjZHeAh/zBC8EXT/qWsGPknHnqONxny2RDPgDPeOkVkzd9M/OJ8prjPH1QKs+1JgaHdYUGWfOUMWrvIvB5nsaLtPZz0E9Va4Axkw4XvEnACHfNwi6CXTBhWCDMmE9scHDlNCRRmq587lBwPvDmCiqaeEmEO0GaiuCeQtxe2T0jiI9XjO1jefRDh4JlyDrKkwztl7dANkeQ8R7/rsTS5yaKfR94rp54S9077NKxZvKorZrZF7zTCOqU8bPw+glUTBDF9kikZlc3kC99ECM8XbMeiw1y4Gav5OdU4OIkkEpECgYEA6ot9eV1ezePZq33Jb6dDmvIIy1AdDHiBwvOBo1YU+KlRWdtgUkAm0vQy196IqrndCOBIS7wx++zCqrmibkhdHtJOs/bthPcRCevTkqJmUHsV9Et7UQky8jMFx/PIJz99qQRunlKqO/tGps9b0y/Dk5kxCzYKaNrFxKUk7a87TpkCgYEA5VFfK3XeB22NYnHfMWqt87kog9QtWuWFh+f+f2TNuTUYZy4t7GyHjTuhD8adThwmDORYep0FoLDMuYxlZ9+N1hlu8j9chG4qRvdpeYEMMw3EZOZnAnA9LLcdd9XYN/GPTaxQQlEnjNX/OMXHJU7E74z6FF2brZXFECZPOLrMkRsCgYEA4tjLIMj32rbXXpAodb8XGhOiAdKYZelfx8hwyCOH4QESV5BgVu0JH9tkGXl4QXfGmsEh6244Aer6VNl6iqOevSK3UEQxcfrsFeZrGVXNE2YY09D1kmkNR0el/cCBA8TaqtBIlQRq9dyQduHzdAysYmM2FhvMcaG2yfzX/LMQ73ECgYAh1DM58hVi+yJUV4AZhidLQRFdATv/oMRmHC9LE8/VdqO29PUJX6lPiHBmJ2KlVzm1xSnYTLm7ztkktjVvcWc3ImFfk0FOuAG8nlsM9aCbF3jVebfQgEZGBm1udDmFZzlAuB7O6bHv8NHJykNqmYgr3pw1zOleXi3ICB6/u67Z6QKBgB1P8K/+HkzkD4FFdqGtJ2OZypXcI8HXFiuMmR1iG8r9Le8ZJTrSgmFPNM+nrSbGPfiXYPNqBZpaEAj6x1WVEPoOERtfHoogi+lbw8AOzIqsv/0U25gixSHl6HxqaTR58Y4umuq8NExwsYWR24UaP4D37qg8HlIn5KMkEdprdUjv",

    //异步通知地址
    'notify_url' => "http://外网可访问网关地址/1111.trade.page.pay-PHP-UTF-8/notify_url.php",

    //同步跳转
    'return_url' => "http://外网可访问网关地址/1111.trade.page.pay-PHP-UTF-8/return_url.php",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0hlUkdjnolJKaXo0KDghnJJtMPeErMndnh9/CGsTuzIZffSMRsx6oE6YsvbD4AhRiFrjxw0B2aWp/Q4Q4tHF69Hyx2merI32hFIdPNDUDbYijIWNWijKE0p060ROVMO7HhcAzwOR0sKU9Zp2VwghCDSqZYSfB5C49Z6jOPlAoCnLEU7WSLwboiQHcc8PNKJDLogvRA8VIubKx8O+drtv4i07n5qjl6FJ/SIUNzKZy4yNwEa9K2cXq5DnnmzEXJ79EBH5yAoH7a3+MQdJFbJbGOw4fqJBJnmaKd5pT6Rl1bbPk08HbBYj2qkjIxItT5A2oaRCA/H6dTFC/qgn3rHzIwIDAQAB",
];