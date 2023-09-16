<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>正在为您跳转到支付页面，请稍候...</title>
	<style type="text/css">
body{margin:0;padding:0}
p{position:absolute;left:50%;top:50%;height:35px;margin:-35px 0 0 -160px;padding:20px;font:bold 16px/30px "宋体",Arial;text-indent:40px;border:1px solid #c5d0dc}
#waiting{font-family:Arial}
	</style>
</head>
<body>
<?php

require_once("lib/epay.config.php");
require_once("lib/EpayCore.class.php");

/**************************请求参数**************************/
$notify_url = "http://".$_SERVER['HTTP_HOST']."/notify_url.php";
//需http://格式的完整路径，不能加?id=123这类自定义参数
//页面跳转同步通知页面路径
$return_url = "http://".$_SERVER['HTTP_HOST']."/return_url.php";
//需http://格式的完整路径，不能加?id=123这类自定义参数

//商户订单号
$out_trade_no = date("YmdHis").mt_rand(100,999);
//商户网站订单系统中唯一订单号，必填

//支付方式（可传入alipay,wxpay,qqpay,bank,jdpay）
$type = 'wxpay';
//商品名称
$name = $_POST['WIDsubject'];
//付款金额
$money = $_POST['WIDtotal_fee'];

if(isset($_POST["ktzlfqx"]))
{
    $name ='开通指令服权限';
    $money = '16.6';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['age'];
    $gmdz = $Am['gmbb'];
    $cmd = "ktzlfqx";
}

if(isset($_POST["ptxf"]))
{
    $name ='用户续费7天';
    $money = '50';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "yhxf";
}
if(isset($_POST["gjxf"]))
{
    $name ='用户续费30天';
    $money = '80';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "gjxf";
}

if(isset($_POST["cj"]))
{
    $name ='盲盒抽奖';
    $money = '0.1';
    $username = $_POST['username'];
    $cmd = "mhcj";
    if($username == ""){
        header("Location: mh.php?result=7"); 
    }
}

if(isset($_POST["ys35"]))
{
    $name ='3.5提前体验服(预购买+超级权限)';
    $money = '120';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "ys35";
}



if(isset($_POST["btsyw1"]))
{
    $name ='233333攻/233333防/100%暴击/350%爆伤';
    $money = '10';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=equip+add+23334+6";
}
if(isset($_POST["btsyw2"]))
{
    $name ='30%移动速度';
    $money = '2';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=equip+add+23300+6";
}
if(isset($_POST["btsyw3"]))
{
    $name ='50%冷却缩减';
    $money = '2';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=equip+add+23340+6";
}
if(isset($_POST["btsyw4"]))
{
    $name ='80%伤害增加';
    $money = '2';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=equip+add+23317+6";
}
if(isset($_POST["btsyw5"]))
{
    $name ='80%治疗加成';
    $money = '2';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=equip+add+23338+6";
}
if(isset($_POST["btsyw6"]))
{
    $name ='80%暴击伤害';
    $money = '2';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=equip+add+23336+6";
}
if(isset($_POST["btsyw7"]))
{
    $name ='80%伤害减免';
    $money = '2';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=equip+add+23318+6";
}
if(isset($_POST["btsyw8"]))
{
    $name ='80%物理抗性';
    $money = '2';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=equip+add+23316+6";
}
if(isset($_POST["btsyw9"]))
{
    $name ='80%暴击率';
    $money = '2';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=equip+add+23335+6";
}

if(isset($_POST["zzktqx"]))
{
    $name ='超级权限';
    $money = '888';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "ktqx";
}

if(isset($_POST["ktyj"]))
{
    $name ='永久套餐';
    $money = '160';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "ktyj";
}

if(isset($_POST["mfsyw"]))
{
    $name ='免费圣遗物';
    $money = '66';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "mfsyw";
}

if(isset($_POST["xjpsyw"]))
{
    $name = $_POST["xjpsyw"];
    include "./user/cus_check.php";
    $sql = "select * from shop_syw where name = '".$name."'";
    $result = mysqli_query($syw,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $money = $Am['jg'];
    $cmd = $Am['zl'];
    $username = $_POST['username'];
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $daili=$Am['daili'];
    if($daili == ''){
        $money = '20';
    }
    if($daili == '5'){
        $money = '1';
    }
}


if(isset($_POST["czys"]))
{
    $name ='9万原石';
    $money = '5';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=item+add+201+90000";
}
if(isset($_POST["czjj"]))
{
    $name ='2万创世结晶';
    $money = '5';
    $username = $_POST['username'];
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID = $Am['gf11uid'];
    $gmdz = $Am['gmbb'];
    $cmd = "&msg=mcoin+20000";
}
		//支付方式
        $type = 'wxpay';
		//站点名称
        $sitename = '3.4剧情服';
        //必填

        //订单描述



/************************************************************/

//构造要请求的参数数组，无需改动
$parameter = array(
	"pid" => $epay_config['pid'],
	"type" => $type,
	"notify_url" => $notify_url,
	"return_url" => $return_url,
	"out_trade_no" => $out_trade_no,
	"name" => $name.'-'.$username.'-'.$UID,
	"money"	=> $money,
);


include "./user/cus_check.php";
$ddsj = date("Y-m-d H:i:s");

$sql = "insert into cz_ddsj (username,uid,gmdz,name,money,dd,zt,type,cmd,ddsj) VALUE ('$username','$UID','$gmdz','$name','$money','$out_trade_no','0','$type','$cmd','$ddsj')";
$result = mysqli_query($root,$sql);
$epay = new EpayCore($epay_config);
$html_text = $epay->pagePay($parameter);
echo $html_text;


//建立请求


?>
<p>正在为您跳转到支付页面，请稍候...</p>
</body>
</html>