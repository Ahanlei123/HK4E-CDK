<?php
/* *
 * 功能：彩虹易支付异步通知页面
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 */

require_once("lib/epay.config.php");
require_once("lib/EpayCore.class.php");

//计算得出通知验证结果
$epay = new EpayCore($epay_config);
$verify_result = $epay->verifyNotify();

if($verify_result) {//验证成功

	//商户订单号
	$out_trade_no = $_GET['out_trade_no'];
	include "./user/cus_check.php";
    $sql = "select * from cz_ddsj where dd = '$out_trade_no'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $zt=$Am['zt'];
    $username=$Am['username'];
    $gmbb=$Am['gmdz'];
    $uid=$Am['uid'];
    $zxml=$Am['cmd'];

	//彩虹易支付交易号
	$trade_no = $_GET['trade_no'];

	//交易状态
	$trade_status = $_GET['trade_status'];

	//支付方式
	$type = $_GET['type'];

	//支付金额
	$money = $_GET['money'];

	if ($_GET['trade_status'] == 'TRADE_SUCCESS') {
		//判断该笔订单是否在商户网站中已经做过处理
		//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
		//如果有做过处理，不执行商户的业务程序
	}
include "./user/cus_check.php";
    $data1 = substr($zxml, strpos($zxml, 'add+') + 4); // 获取第一个加号后面的数据
    $data2 = substr($data1, 0, strpos($data1, '+6')); // 获取第二个加号前面的数据
    $yjfssj=time();
    $yjdqsj=strtotime('+7 days');
    if($gmbb==''){
        $gmbb="正常";
        //$_SESSION["gmdz"] = 'http://110.42.9.80:65412/api?uid=';
    }elseif($gmbb=='1'){
        $gmbb="3.4剧情服";
        $gmdz1="http://121.62.18.138:20011/api?uid=";
        $yjdz="http://121.62.18.138:20011/api?";
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！\nQQ:154867926\n支持购买套餐，免费无限刷圣遗物').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }elseif($gmbb=='2'){
        $gmbb="3.4剧情服";
        $gmdz1="http://121.62.18.138:20011/api?uid=";
        $yjdz="http://121.62.18.138:20011/api?";
       $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！\nQQ:154867926\n支持购买套餐，免费无限刷圣遗物').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }elseif($gmbb=='3'){
        $gmbb="3.4剧情服";
        $gmdz1="http://121.62.18.138:20011/api?uid=";
        $yjdz="http://121.62.18.138:20011/api?";
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！\nQQ:154867926\n支持购买套餐，免费无限刷圣遗物').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }elseif($gmbb=='4'){
        $gmbb="3.4剧情服";
        $gmdz1="http://43.226.74.250:20011/api?uid=";
        $yjdz="http://43.226.74.250:20011/api?";
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！\nQQ交流群:513364857\n欢迎各位大佬加群交流').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    }elseif($gmbb=='9'){
        $gmbb="破解充值";
        $gmdz1="http://122.228.85.143:1452/api?uid=";
        $yjdz="http://122.228.85.143:1452/api?";
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
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $userreg = $Am["userreg"];
    $userzt = $Am['zt'];
    //执行开通权限操作
    if($zxml == 'ktqx'){
        $sql = "update user_information set zt = 1 where username = '$username'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        exit;
    }
    
    if($zxml == 'ktzlfqx'){
        $sql = "update user_information set zlf = 1 where username = '$username'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        header("Location: gf11.php?result=7"); 
        exit;
    }
    
    if($zxml == 'ys35'){
        $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        header("Location: gf11.php?result=6"); 
        exit;
    }
    
    if($zxml == 'ktyj'){
        $new_timestamp=3000000000;
        $sql2= "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
        $result2 = mysqli_query($root,$sql2);
        $sql = "update user_information set daili = '0' where username = '$username'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        header("Location: gf11.php?result=1"); 
        exit;
    }
    
    if($zxml == 'mfsyw'){
        if($userreg < time()){
            include "./user/cus_check.php";
            $new_timestamp = strtotime('+270 days');
            $sql= "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
            $result = mysqli_query($root,$sql);
        }else{
            include "./user/cus_check.php";
            $new_timestamp = strtotime('+270 days', $userreg);
            $sql = "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
            $result = mysqli_query($root,$sql);
        }
        
        $sql = "update user_information set daili = '0' where username = '$username'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        header("Location: gf11.php?result=1"); 
        exit;
    }
    
    //执行普通续费操作
    if($zxml == 'ptxf'){
        $xfjl = "&msg=mcoin+2000";
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $zxurl= $gmdz1.$uid.$xfjl.$cmd2;
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='succ') {
            if($userreg < time()){
                //如果小于当前时间戳取当前时间+7天
                include "./user/cus_check.php";
                $new_timestamp = strtotime('+7 days');
                $sql= "UPDATE user_information SET userreg='$new_timestamp' WHERE username='$username'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                header("Location: userxf.php?result=1"); 
                exit; 
            }else{
                //如果大于数据库时间戳取当前时间+7天
                include "./user/cus_check.php";
                $new_timestamp = strtotime('+7 days', $userreg);
                $sql = "UPDATE user_information SET userreg='$new_timestamp' WHERE username='$username'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                header("Location: userxf.php?result=1"); 
                exit; 
            }
        }else{
            echo "<script>alert('当前用户不在线，请在线后在刷新此页面！');</script>";
            echo "当前用户不在线，请在线后在刷新此页面！";
            exit ;
        }
    }
    
    //执行普通续费操作
    if($zxml == 'ptxf'){
        $xfjl = "&msg=mcoin+2000";
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $zxurl= $gmdz1.$uid.$xfjl.$cmd2;
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='succ') {
            if($userreg < time()){
                //如果小于当前时间戳取当前时间+7天
                include "./user/cus_check.php";
                $new_timestamp = strtotime('+7 days');
                $sql= "UPDATE user_information SET userreg='$new_timestamp' WHERE username='$username'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                header("Location: userxf.php?result=1"); 
                exit; 
            }else{
                //如果大于数据库时间戳取当前时间+7天
                include "./user/cus_check.php";
                $new_timestamp = strtotime('+7 days', $userreg);
                $sql = "UPDATE user_information SET userreg='$new_timestamp' WHERE username='$username'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                header("Location: userxf.php?result=1"); 
                exit; 
            }
        }else{
            echo "<script>alert('当前用户不在线，请在线后在刷新此页面！');</script>";
            echo "当前用户不在线，请在线后在刷新此页面！";
            exit ;
        }
    }
    
    //2万结晶
    if($zxml == 'czjj'){
        $xfjl = "&msg=mcoin+20000";
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $zxurl= $gmdz1.$uid.$xfjl.$cmd2;
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='succ') {
            include "./user/cus_check.php";
            $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
            $result = mysqli_query($root,$sql);
            $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
            $result = mysqli_query($root,$sql);
            header("Location: userxf.php?result=1"); 
            exit; 
        }else{
            echo "<script>alert('当前用户不在线，请在线后在刷新此页面！');</script>";
            echo "当前用户不在线，请在线后在刷新此页面！";
            exit ;
        }
    }
    
    //执行高级续费操作
    if($zxml == 'gjxf'){
        $numbers = array(23336, 23300, 23340, 23317, 23338, 23318, 23316);
        $randomIndex = rand(0, count($numbers) - 1);
        $randomNumber = $numbers[$randomIndex];
        $yjfssj=time();
        $yjdqsj=strtotime('+7 days');
        $yhdqsj = date('Y-m-d H:i:s', $userreg);
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('用户续费成功！').'&content='.urlencode('感谢你在GM平台赞助支持，当前用户:'.$username.'\n用户续费30天成功！\nQQ交流群:513364857\n欢迎各位大佬加群交流').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$randomNumber.':1&cmd=1005&ticket='.$yjfssj;
        $zxurl = $yjdz.$cmd2;
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='succ') {
            if($userreg < time()){
                //如果小于当前时间戳取当前时间+30天
                include "./user/cus_check.php";
                $new_timestamp = strtotime('+30 days');
                $sql= "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                header("Location: userxf.php?result=1"); 
                exit; 
            }else{
                //如果大于数据库时间戳取当前时间+30天
                include "./user/cus_check.php";
                $new_timestamp = strtotime('+30 days', $userreg);
                $sql = "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                header("Location: userxf.php?result=1"); 
                exit; 
            }
        }else{
            echo "<script>alert('邮件发送异常，请联系管理员处理！QQ1548673260');</script>";
            echo "邮件发送异常，请联系管理员处理！QQ1548673260";
            exit ;
        }
    }
    
    //执行购买圣遗物操作
    if($userzt == '1'){
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='mail has been sent, do not re_send mail') {
            echo "<script>alert('邮件已发送，请勿重复发送！');</script>";
            echo "邮件已发送，请勿重复发送！";
            exit ;
        }elseif($json['msg']=='succ'){
            include "./user/cus_check.php";
            $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
            $result = mysqli_query($root,$sql);
            $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
            $result = mysqli_query($root,$sql);
            header("Location: gf11.php?result=1"); 
        }else{
            echo "<script>alert('邮件发送异常，请联系管理员处理！QQ1548673260');</script>";
            echo "邮件发送异常，请联系管理员处理！QQ1548673260";
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
            $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
            $result = mysqli_query($root,$sql);
            $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
            $result = mysqli_query($root,$sql);
            header("Location: ptgf11.php?result=1"); 
        }else{
            echo "<script>alert('邮件发送异常，请联系管理员处理！QQ1548673260');</script>";
            echo "邮件发送异常，请联系管理员处理！QQ1548673260";
            exit ;
        }
    }

	//验证成功返回
	//echo "success";
}
else {
	//验证失败
	echo "fail";
}
?>