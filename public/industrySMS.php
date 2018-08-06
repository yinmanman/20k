<?php
/**
 * 验证码通知短信接口
 */
require_once("include/config.php");
require_once("include/httpUtil.php");

/**
 * url中{function}/{operation}?部分
 */
$funAndOperate = "industrySMS/sendSMS";

// 参数详述请参考http://miaodiyun.com/https-xinxichaxun.html

// 生成body
$body = createBasicAuthData();
// 在基本认证参数的基础上添加短信内容和发送目标号码的参数
$body['smsContent']="【{1}】您的验证码为{2}，请于分钟内正确输入，如非本人操作，请忽略此短信。。";
$body['to'] = $_POST['tel'];
$body['templateid'] = '223770425';
$yzm = rand(10000, 99999);
$code = '5';
$body['param']= "$yzm,$code";
$body['accountSid'] = '09a211b1f53a4958a89a026244d092d1';
$time = date("YmdHis",time());
$body['timestamp'] = $time;
/*$body['sig']= md5('d922cabdcbaf4e049e941e8a469fa0f1f76e8589519c443b9dee27bebd1fad4c'.$time);*/
// 提交请求
$result = post($funAndOperate, $body);
echo $yzm;
//echo "<pre>";
//var_dump($result);