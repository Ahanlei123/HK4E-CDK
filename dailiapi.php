<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>原神3.4剧情服云支付-道具购买</title>
</head>
<?php
/* *
 * 功能：51云支付即时到账交易接口接入页
 * 
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。
 */

//require_once("epay.config.php");
//require_once("lib/epay_submit.class.php");

/**************************请求参数**************************/
        $notify_url = "https://".$_SERVER['HTTP_HOST']."/notify_url.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
        $return_url = "https://".$_SERVER['HTTP_HOST']."/return_url.php";
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

        //商户订单号
        $out_trade_no = date("YmdHis").mt_rand(100,999);
        //商户网站订单系统中唯一订单号，必填
include "./user/cus_check.php";
$username = $_POST['username'];
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $daili = $Am['daili'];
    if($daili == "0"){
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
    $userzt = $Am['zt'];
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
    $userzt = $Am['zt'];
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
    $userzt = $Am['zt'];
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
    $userzt = $Am['zt'];
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
    $userzt = $Am['zt'];
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
    $userzt = $Am['zt'];
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
    $userzt = $Am['zt'];
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
    $userzt = $Am['zt'];
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
    $userzt = $Am['zt'];
    $cmd = "&msg=equip+add+23335+6";
}




		//支付方式
        $type = 'wxpay';
		//站点名称
        $sitename = '3.4剧情服';
        //必填

        //订单描述


/************************************************************/


include "./user/cus_check.php";
$ddsj = date("Y-m-d H:i:s");
if($username == ""){
    header("Location: gf11.php?result=2"); 
}else{
    $data1 = substr($cmd, strpos($cmd, 'add+') + 4); // 获取第一个加号后面的数据
    $data2 = substr($data1, 0, strpos($data1, '+6')); // 获取第二个加号前面的数据
    $yjfssj=time();
    $yjdqsj=strtotime('+7 days');
    $gmbb=$gmdz;
    $uid=$UID;
    if($gmbb==''){
        $gmbb="正常";
        //$_SESSION["gmdz"] = 'http://110.42.9.80:65412/api?uid=';
    }elseif($gmbb=='1'){
        $gmbb="3.4剧情服";
        $gmdz1="http://202.189.8.53:20011/api?uid=";
        $yjdz="http://202.189.8.53:20011/api?";
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！\nQQ交流群:513364857\n欢迎各位大佬加群交流').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }elseif($gmbb=='2'){
        $gmbb="3.4剧情服";
        $gmdz1="http://202.189.8.53:20011/api?uid=";
        $yjdz="http://202.189.8.53:20011/api?";
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！\nQQ交流群:513364857\n欢迎各位大佬加群交流').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }elseif($gmbb=='3'){
        $gmbb="3.4剧情服";
        $gmdz1="http://202.189.8.53:20011/api?uid=";
        $yjdz="http://202.189.8.53:20011/api?";
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！\nQQ交流群:513364857\n欢迎各位大佬加群交流').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }elseif($gmbb=='4'){
        $gmbb="3.4剧情服";
        $gmdz1="http://43.226.74.250:20011/api?uid=";
        $yjdz="http://43.226.74.250:20011/api?";
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！\nQQ交流群:513364857\n欢迎各位大佬加群交流').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }elseif($gmbb=='9'){
        $gmbb="破解充值";
        $gmdz1="http://122.228.85.147:1452/api?uid=";
        $yjdz="http://122.228.85.147:1452/api?";
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！\nQQ交流群:513364857\n欢迎各位大佬加群交流').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }elseif($gmbb=='8'){
        $gmbb="3.4剧情服";
        $gmdz1="http://ys.syxywl.cn:53497/api?uid=";
        $yjdz="http://ys.syxywl.cn:53497/api?";
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！\n').'&sender='.urlencode('逍遥原神GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }elseif($gmbb=='6'){
        $gmbb="破解充值";
        $gmdz1="http://122.228.85.111:1452/api?uid=";
        $yjdz="http://122.228.85.111:1452/api?";
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }
    $zxurl = $yjdz.$cmd2;
    
    if($userzt == '1'){
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='mail has been sent, do not re_send mail') {
            echo "<script>alert('邮件已发送，请勿重复发送！');</script>";
            echo "邮件已发送，请勿重复发送！";
            exit ;
        }elseif($json['msg']=='succ'){
            include "./user/cus_check.php";
             $sql = "insert into cz_ddsj (username,uid,gmdz,name,money,dd,zt,type,cmd,ddsj,bf) VALUE ('$username','$UID','$gmdz','$name','$money','$out_trade_no','3','$type','$cmd','$ddsj','1')";
            $result = mysqli_query($root,$sql);
            header("Location: gf11.php?result=1"); 
        }else{
            echo "<script>alert('邮件发送异常，请联系管理员处理！');</script>";
            echo "邮件发送异常，请联系管理员处理！".$zxurl;
            exit ;
        }
        
    }else{
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='mail has been sent, do not re_send mail') {
            echo "<script>alert('邮件已发送，请勿重复发送！');</script>";
            echo "邮件已发送，请勿重复发送！";
            exit ;
        }elseif($json['msg']=='succ'){
            include "./user/cus_check.php";
             $sql = "insert into cz_ddsj (username,uid,gmdz,name,money,dd,zt,type,cmd,ddsj,bf) VALUE ('$username','$UID','$gmdz','$name','$money','$out_trade_no','3','$type','$cmd','$ddsj','1')";
            $result = mysqli_query($root,$sql);
            header("Location: ptgf11.php?result=1"); 
        }else{
            echo "<script>alert('邮件发送异常，请联系管理员处理！');</script>";
            echo "邮件发送异常，请联系管理员处理！".$data2;
            exit ;
        }
    }
}
}else{
    header("Location: gf11.php?result=5"); 
    exit ;
}



?>
</body>
</html>
