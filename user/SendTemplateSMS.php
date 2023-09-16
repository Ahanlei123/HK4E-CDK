<?php
$tel = $_POST['tel'];
session_start();
$dqsj=time();
    //$res = sendTemplateSMS($tel, array($verify, 2),"1");  //$verify是所包含的verify.php文件里动态生成的四位数字验证码变量，生成时已将验证码存于SESSION里 ，到提交验证码时用于验证判断
$statusStr = array(
		"0" => "短信发送成功",
		"-1" => "参数不全",
		"-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
		"30" => "密码错误",
		"40" => "账号不存在",
		"41" => "余额不足",
		"42" => "帐户已过期",
		"43" => "IP地址限制",
		"50" => "内容含有敏感词"
	);	
if($dqsj >= $_SESSION["yzmsj"]){
    include "cus_check.php";   //导入用户信息
    $sql = "select * from user_information where email = '".$tel."'";
    $result = mysqli_query($root,$sql); //执行查找
    $num = mysqli_num_rows($result);    //判断查找结果
    $Am = mysqli_fetch_array($result);
    if($Am['username'] != "")
    {
        echo "手机号重复";
    }else{
    $captcha = rand(100000,999999);
    $_SESSION["captcha"] = $captcha;
    $smsapi = "http://www.smsbao.com/"; //短信网关
    $user = "laomo"; //短信平台帐号
    $pass = md5("li062014"); //短信平台密码
    $content="【GM平台】您的注册验证码是".$captcha."。如非本人操作，请忽略本短信，注册成功后记得在账号设置里解锁地图！";//要发送的短信内容
    //$content="【小宇发卡】您的验证码是".$captcha."。如非本人操作，请忽略本短信";//要发送的短信内容
    $phone = $tel;
    $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
    $result =file_get_contents($sendurl) ;
    $_SESSION["yzmsj"] = time() + 240;
    echo("ok");
    }
}else{
    $sysj=$_SESSION["yzmsj"] - time();
    echo($sysj);
}
//echo $statusStr[$result];
?>