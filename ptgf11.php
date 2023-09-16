<?php  
    include ("./user/conn.php");
    error_reporting(E_ERROR | E_PARSE);
    include "./user/cus_check.php";
    session_start();
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $userzt=$Am['zt'];
    $gmbb=$Am['gmbb'];
    $userid=$Am['id'];
    $reg=$Am['regDate'];
    $UID1 = $Am['gf11uid'];
    $userreg=$Am['userreg'];
    $yhyk=$Am['vip'];
    if($userzt=="1"){
        echo "<script>alert('当前用户以开通权限!');location.href = './gf11.php';</script>";
        exit;
    }elseif($userzt==''){
        $userzt="未开通";
        $jrsj = time();
        if($userreg == ""){
            include "./user/cus_check.php";
            $dqsj = strtotime("+3000 days");
            $sql3 = "update user_information set userreg = '$dqsj' where username = '".$_SESSION['name']."'";
            $result3 = mysqli_query($root,$sql3);
            $uudqsj = date('Y-m-d H:i:s', $userreg);
        }elseif($userreg <= $jrsj){
            $userzt="到期";
            //echo "<script>alert('该用户以到期，请及时续费! 续费后可领取一个随机变态圣遗物！');location.href = './userxf.php';</script>";
            //exit;
        }else{
            $uudqsj = date('Y-m-d H:i:s', $userreg);
        }
    }elseif($userzt=='3'){
        $userzt="封号";
        echo "<script>alert('该用户以被封号!');history.back();</script>";
        exit;
    }
    if($gmbb==''){
        $gmbb="正常";
        //$_SESSION["gmdz"] = 'http://110.42.9.80:65412/api?uid=';
    }elseif($gmbb=='1'){
        $gmbb="3.4剧情服";
        $_SESSION["gmdz"] = 'http://121.62.18.138:20011/api?uid=';
        $_SESSION["yjdz"] = 'http://121.62.18.138:20011/api?';
        $gmdz1="http://121.62.18.138:20011/api?uid=";
        $yjdz="http://121.62.18.138:20011/api?";
    }
    if($UID1==''){
        header("Location: index.php?result=6"); 
        exit;
    }
    $cmd1 = $gmdz1;
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+201+1";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $json = json_decode($re, true);
    if ($json['msg']=='recv from nodeserver timeout') {
        $gmbb=$gmbb."--离线";
        $_SESSION["gmdz"] = 'http://121.62.18.138:20011/api?uid=';
        $gmdz1="http://121.62.18.138:20011/api?uid=";
        $cmd1 = $gmdz1;
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $json = json_decode($re, true);
        if ($json['msg']=='succ') {
            $gmbb=$gmbb."--在线";
        }else{
            $_SESSION["gmdz"] = 'http://121.62.18.138:20011/api?uid=';
            $gmdz1="http://121.62.18.138:20011/api?uid=";
            $cmd1 = $gmdz1;
            $cmd = $cmd1.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                $gmbb=$gmbb."--离线";
                header("Location: index.php?result=5"); 
            }elseif($json['msg']=='succ'){
                $gmbb=$gmbb."--在线";
                include "./user/cus_check.php";
                $sxsj = date("Y-m-d H:i:s");
                $sql2 = "update user_information set zhsx = '$sxsj' where username = '".$_SESSION['name']."'";
                $result2 = mysqli_query($root,$sql2);
            }else{
                $gmbb=$gmbb."--错误";
            } 
        } 
    }elseif($json['msg']=='succ'){
        $gmbb=$gmbb."--在线";
        include "./user/cus_check.php";
        $sxsj = date("Y-m-d H:i:s");
        $sql2 = "update user_information set zhsx = '$sxsj' where username = '".$_SESSION['name']."'";
        $result2 = mysqli_query($root,$sql2);
    }else{
        $gmbb=$gmbb."--错误";
    } 
    if(!$num)
    {
        echo "<script>alert('该用户不存在!');history.back();</script>";
        exit;
    }else{
    $user=$_SESSION['name'];
    $username=$_SESSION['name'];
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID1 = $Am['gf11uid'];
    $_SESSION["UID1"] = $UID1;
    $sql4 = "SELECT * FROM shop_syw ";
    $result4 = $syw->query($sql4);
    if ($result4->num_rows > 0) {
        while($row = $result4->fetch_assoc()) {
        $id_array2[] = $row['jg'];
        $name_array2[] = $row['name'];
        }
    }
    
    $_SESSION["wpcdk"] = @$_POST['wpcdk'];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>原神GM3.4剧情服平台 - 高级权限</title>
    <meta name="keywords" content="3.4剧情服">
    <meta name="description" content="3.4剧情服">
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet" />
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet" />
    <link href="css/animate.min.css" rel="stylesheet" />
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="./css/search.css" />
  </head>
<body class="gray-bg">
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>普通权限(<?php echo $gmbb ?>)</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="tabs_panels.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="tabs_panels.html#">选项1</a>
                                </li>
                                <li><a href="tabs_panels.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <p>3.4剧情服普通权限工具</p>
                        <ul>
                            <li>使用前请务必保持游戏处于在线状态，领取成功后返回游戏查看即可</li>
                            <li>本工具仅供3.4剧情服服务器使用！</li>
                            <li>检测到你的账号为「<?php echo $gmbb ?>」账号，请确保是否登录的「<?php echo $gmbb ?>」</li>
                            
                        </ul>
                        <a href="./user/gf11uid.php">
                            <button class="btn btn-primary" > 卡密兑换权限</button>
                        </a>
                        <a href="./userxf.php">
                            <button class="btn btn-primary" > 续费账号</button>
                        </a>
                        <a href="#">
                            <button class="btn btn-primary" > QQ交流群</button>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
              
              <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>小极品圣遗物：<a href="" target="_blank">收费功能(直接获取极品圣遗物，强化100%不歪！)</a>
                        </p>
                        <?php
                        if ($userreg=='30000000000') {
                        echo '<form name=alipayment action=dailiapi.php method=post target="_blank">
	                    <input hidden type="text" id="username" name="username"  value="'.$username.'" placeholder="请输入账号" maxlength="30">';
	                    $num_of_buttons = count($name_array2);
                        for ($i = 0; $i < $num_of_buttons; $i++) {
                            $button_title = $name_array2[$i];
                            $button_zl = $id_array2[$i];
                            echo '<button type="submit" name="xjpsyw" id="xjpsyw'.$i.'" class="btn btn-primary"  value="'.$button_title.'">'.$button_title.' </button> ' ;
                        }
	                    echo '<br></a>
                        </font>
                        </form>';
                        }elseif ($daili=='0'){
                        echo '<form name=alipayment action=epayapi.php method=post target="_blank">
	                    <input hidden type="text" id="username" name="username"  value="'.$username.'" placeholder="请输入账号" maxlength="30">';
	                    $num_of_buttons = count($name_array2);
                        for ($i = 0; $i < $num_of_buttons; $i++) {
                            $button_title = $name_array2[$i];
                            $button_zl = $id_array2[$i];
                            echo '<button type="submit" name="xjpsyw" id="xjpsyw'.$i.'" class="btn btn-primary"  value="'.$button_title.'">'.$button_title.' (' .$button_zl.'元)</button> ' ;
                        }
                        echo '<br></a>
                        </font>
                        </form>';
                        }else{
                        echo '<form name=alipayment action=epayapi.php method=post target="_blank">
	                    <input hidden type="text" id="username" name="username"  value="'.$username.'" placeholder="请输入账号" maxlength="30">';
	                    $num_of_buttons = count($name_array2);
                        for ($i = 0; $i < $num_of_buttons; $i++) {
                            $button_title = $name_array2[$i];
                            $button_zl = $id_array2[$i];
                            echo '<button type="submit" name="xjpsyw" id="xjpsyw'.$i.'" class="btn btn-primary"  value="'.$button_title.'">'.$button_title.' (20元)</button> ' ;
                        }
                        echo '<br></a>
                        </font>
                        </form>';
                        }
                        
                        ?>
                    </div>
                </div>
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>CDK兑换：<a href="" target="_blank">CDK兑换功能</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <input type="text" class="form-control" name="wpcdk" id="wpcdk" placeholder="请输入您购买的CDK"/><span class="help-block m-b-none">请输入您购买的CDK</span></a>
	                    <button type="submit" name="dhcdk" id="dhcdk" class="btn btn-primary"  value="getrand"> 兑换CDK</button>
	                    <button type="submit" name="xsfl" id="xsfl" class="btn btn-primary"  value="getrand"> 新手福利(进蒙德城在领取)</button>
	                    <br></a>
                        </font>
                    </div>
                </div>
                
                
                
                <?php
                if ($yhyk != '') {
                echo '<div class="ibox float-e-margins"><div class="ibox-content"><p class="m-t">当前绑定UID：<a href="#" target="_blank">'.$UID1.'</a></p><p>月卡功能：<a href="" target="_blank">月卡功能中心</a></p><form action="" method="post"><input hidden  type="text" id="username" name="username"  value="'.$username.'" placeholder="请输入账号" maxlength="30">';
	                    if ($yhyk == '1') {
	                    echo '<button type="submit" name="swys" id="swys" class="btn btn-primary"  value="getrand"> 小月卡每日礼包</button>';
	                    }elseif ($yhyk == '2') {
	                    echo '<button type="submit" name="swjc" id="swjc" class="btn btn-primary"  value="getrand"> 大月卡每日礼包</button>';
	                    }
                echo '<br></a></font></div></div>';
                }
                ?>
                
                
                
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>高危功能：<a href="" target="_blank">高危功能谨慎操作！</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="qkbb" id="qkbb" class="btn btn-primary"  value="getrand"> 清空背包</button>
	                    <button type="submit" name="czzh" id="czzh" class="btn btn-primary"  value="getrand"> 重置账号(谨慎使用！！！)</button>
	                    <br></a>
                        </font>
                    </div>
                </div>
                
<script src="./sweetalert.min.js"></script>
<script>swal('公告','---------小月卡--------- \r\n 每日原石X2888 \r\n ---------大月卡--------- \r\n 原石X8888','success');</script>
<?php

if(isset($_GET['result'])){
    echo "<script src='./sweetalert2.all.min.js'></script>";
	$result = $_GET['result'];
	switch($result){
		case '1':
			echo "<script>
					Swal.fire({
					  title: '购买成功！',
					  icon: 'success',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'ptgf11.php';
					});
				  </script>";
			break;
		case '2':
			echo "<script>
					Swal.fire({
					  title: '购买失败！',
					  icon: 'error',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'ptgf11.php';
					});
				  </script>";
			break;
		case '3':
			echo "<script>Swal.fire('登录失败！', '请重新输入账号密码。', 'error');</script>";
			break;
		case '4':
			echo "<script>Swal.fire('登录失败！', '请重新输入。', 'error');</script>";
			break;
		default:
			break;
	}
} 


if(isset($_POST["bfsyw"]))
{
// 连接数据库
include "./user/cus_check.php";

// 查询所有符合条件的记录
$query = "SELECT * FROM cz_ddsj WHERE zt=1 AND username='".$_SESSION['name']."' AND bf IS NULL";
$result = $root->query($query);
$count = 0;
$countsb = 0;
$countcg = 0;
// 循环处理每个记录
while ($row = $result->fetch_assoc()) {
    // 执行cmd字段中的代码
    $count++;
    $id = $row['id'];
    $xfjl=$row['cmd'];
    $gmdz1=$_SESSION["gmdz"];
    $uid= $_SESSION["UID1"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $zxurl=$gmdz1.$uid.$xfjl.$cmd2;
    $re = file_get_contents($zxurl);
    sleep(1);
        $json = json_decode($re, true);
        if ($json['msg']=='recv from nodeserver timeout') {
            $countsb++;
        }elseif($json['msg']=='succ'){
            include "./user/cus_check.php";
            $update_query = "UPDATE cz_ddsj SET bf=1 WHERE id=$id";
            $root->query($update_query);
            $countcg++;
        }else{
            $countsb++;
        }
}
if ($count == 0) {
    echo "<script>swal('补发失败','当前暂无需要补发的圣遗物！','error');</script>";
} else {
    $count = '当前共补发：'.$count.'个\r\n成功：'.$countcg.'个\r\n失败：'.$countsb.'个';
    echo "<script>swal('补发成功','$count','success');</script>";
}
}

if(isset($_POST["xsfl"]))
{
    $UID1 = $_SESSION["UID1"];
    $sql = "select * from cdk_xs where uid LIKE '$UID1'";
    $result = mysqli_query($root,$sql);
    $Am = mysqli_fetch_array($result);
    $yjfssj=time();
    $yjdqsj=strtotime('+7 days');
    if($Am['zt']==""){
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=item+add+201+100000";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $json = json_decode($re, true);
        if ($json['msg']=='recv from nodeserver timeout') {
            echo "<script>swal('领取失败','请保持游戏在线后在领取！','error');</script>";
            exit ;
        }elseif($json['msg']=='succ'){
            include "./user/cus_check.php";
            $sj = time(); 
            $sql = "insert into cdk_xs (uid,sj,zt) VALUE ('$UID1','$sj','1')";
            $result = mysqli_query($root,$sql);
            $yjbt='新手福利领取成功';
            $cmd2 = 'importance=&config_id=&uid='.$UID1.'&title='.urlencode($yjbt).'&content='.urlencode('尊敬的用户:'.$username.'\n感谢您的支持，您的新手福利领取成功！').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list=201:1&cmd=1005&ticket='.$yjfssj;
            $zxurl = $yjdz.$cmd2;
            echo "<script>swal('领取成功','新手福利领取成功！','success');</script>";
        }else{
           echo "<script>swal('领取失败','发生未知错误，请联系管理员！','error');</script>";
        } 
        
        
        exit;
    }else{
        echo "<script>swal('领取失败','$wpcdk 当前UID已领取新手福利，请勿重复领取！','error');</script>";
        exit;
    }
}


if(isset($_POST["czzh"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=clear+all";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('重置账号成功！','','success');</script>";
}

if(isset($_POST["dhcdk"]))
{
    include "./user/cus_check.php";
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $wpcdk = $_SESSION["wpcdk"];
    $sql = "select * from cdk_wp where cdk LIKE '$wpcdk'";
    $result = mysqli_query($root,$sql);
    $Am = mysqli_fetch_array($result);
    $sysl = (int)$Am['sl']; 
    if($Am['zt']==""){
        echo "<script>swal('兑换失败','$wpcdk 卡密错误,无法完成兑换','error');</script>";
        exit;
    }elseif($Am['zt']=="1"){
        echo "<script>swal('兑换失败','$wpcdk 卡密已被使用，无法完成兑换','error');</script>";
        exit;
    }
    $wpid=$Am['wp'];
    $wpsl=$Am['sl'];
    $yjbt=$Am['bt'];
    $yjnr=$Am['nr'];
    $yjfssj=time();
    $yjdqsj=strtotime('+7 days');
    if($wpid == 'xyk'){
        $sql = "update user_information set vip = '1' where username = '$username'";
        $result = mysqli_query($root,$sql);
        $cmd2 = 'importance=&config_id=&uid='.$UID1.'&title='.urlencode($yjbt).'&content='.urlencode('尊敬的用户:'.$username.'\n感谢您的支持，您的小月卡开通成功！').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list=201:1&cmd=1005&ticket='.$yjfssj;
        $zxurl = $yjdz.$cmd2;
        echo "<script>swal('开通成功','小月卡开通成功，请刷新网页领取每日礼包！','success');</script>";
        exit ;
    }
    if($wpid == 'dyk'){
        $sql = "update user_information set vip = '1' where username = '$username'";
        $result = mysqli_query($root,$sql);
        $yjbt='大月卡开通成功';
        $cmd2 = 'importance=&config_id=&uid='.$UID1.'&title='.urlencode($yjbt).'&content='.urlencode('尊敬的用户:'.$username.'\n感谢您的支持，您的大月卡开通成功！').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list=201:1&cmd=1005&ticket='.$yjfssj;
        $zxurl = $yjdz.$cmd2;
        echo "<script>swal('开通成功','大月卡开通成功，请刷新网页领取每日礼包！','success');</script>";
        exit ;
    }
    if($wpsl > 0){
        //物品数量大于1000使用指令发
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=item+add+".$wpid."+".$wpsl;
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $json = json_decode($re, true);
        if ($json['msg']=='recv from nodeserver timeout') {
            echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
            exit ;
        }elseif($json['msg']=='succ'){
            include "./user/cus_check.php";
            $sql = "update cdk_wp set zt = 1 where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            $sql = "update cdk_wp set uid = '$UID1' where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            $cmd2 = 'importance=&config_id=&uid='.$UID1.'&title='.urlencode($yjbt).'&content='.urlencode('尊敬的用户:'.$username.'\n'.$yjnr).'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list=201:1&cmd=1005&ticket='.$yjfssj;
            $zxurl = $yjdz.$cmd2;
            $re = file_get_contents($zxurl);
            echo "<script>swal('兑换成功','$yjnr 物品已直接到账游戏！','success');</script>";
        }else{
           echo "<script>swal('兑换失败','发生未知错误，请联系管理员！','error');</script>";
        } 
    }else{
        //物品数量小于1000使用邮件发
        $cmd2 = 'importance=&config_id=&uid='.$UID1.'&title='.urlencode($yjbt).'&content='.urlencode('尊敬的用户:'.$username.'\n'.$yjnr).'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$wpid.':'.$wpsl.'&cmd=1005&ticket='.$yjfssj;
        $zxurl = $yjdz.$cmd2;
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='mail has been sent, do not re_send mail') {
            echo "<script>swal('兑换失败','$wpcdk 邮件已发送，请勿重复发送！','error');</script>";
            exit ;
        }elseif($json['msg']=='succ'){
            include "./user/cus_check.php";
            $sql = "update cdk_wp set zt = 1 where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            $sql = "update cdk_wp set uid = '$UID1' where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            echo "<script>swal('兑换成功','$yjnr 请前往邮件领取！','success');</script>";
        }else{
            echo "<script>swal('兑换失败','$wpcdk 邮件发送异常，请联系管理员处理！QQ1548673260','error');</script>";
            exit ;
        }
    }
}


if(isset($_POST["qkbb"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+clear";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('清空背包成功','','success');</script>";
}


if(isset($_POST["swys"]))
{
    $main=new config6();
    call_user_func([$main,"swys"]);
}
class config6
{
    public function swys()
    {
        include "./user/cus_check.php";
        $sql = "select * from user_information where username = '".$_SESSION['name']."'";
        $result = mysqli_query($root,$sql); 
        $num = mysqli_num_rows($result);
        $Am = mysqli_fetch_array($result);
        $mrlb=$Am['mrlb'];
        $yhyk=$Am['vip'];
        $jr=date("Y-m-d");
        $user=$_SESSION['name'];
        if($mrlb == $jr){
            echo "<script>swal('今日已领取礼包，请勿重复领取！','','error');</script>";
        }else{
            $UID1 = $_SESSION["UID1"];
            $cmd1 = $_SESSION["gmdz"];
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+201+2888";
            $cmd = $cmd1.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('当前用户不在线，请在线后领取','','error');</script>";
                exit ;
            }elseif($json['msg']=='succ'){
                include "./user/cus_check.php";
                $sql = "update user_information set mrlb = '$jr' where username = '$user'";
                $result = mysqli_query($root,$sql);
                echo "<script>swal('每日小月卡礼包领取成功！','','success');</script>";
            }else{
                echo "<script>swal('未知错误领取失败','','error');</script>";
                exit ;
            } 
            
        }
    }
}
    
if(isset($_POST["swjc"]))
{
    $main=new config5();
    call_user_func([$main,"swjc"]);
}
class config5
{
    public function swjc()
    {
       include "./user/cus_check.php";
        $sql = "select * from user_information where username = '".$_SESSION['name']."'";
        $result = mysqli_query($root,$sql); 
        $num = mysqli_num_rows($result);
        $Am = mysqli_fetch_array($result);
        $mrlb=$Am['mrlb'];
        $yhyk=$Am['vip'];
        $jr=date("Y-m-d");
        $user=$_SESSION['name'];
        if($mrlb == $jr){
            echo "<script>swal('今日已领取礼包，请勿重复领取！','','error');</script>";
        }else{
            $UID1 = $_SESSION["UID1"];
            $cmd1 = $_SESSION["gmdz"];
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+201+8888";
            $cmd = $cmd1.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('当前用户不在线，请在线后领取','','error');</script>";
                exit ;
            }elseif($json['msg']=='succ'){
                include "./user/cus_check.php";
                $sql = "update user_information set mrlb = '$jr' where username = '$user'";
                $result = mysqli_query($root,$sql);
                echo "<script>swal('每日大月卡礼包领取成功！','','success');</script>";
            }else{
                echo "<script>swal('未知错误领取失败','','error');</script>";
                exit ;
            } 
            
        }
    }
}

?>
                                </font>
                             

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <!--<script src="js/content.min.js?v=1.0.0"></script>-->
    <script src="js/plugins/toastr/toastr.min.js"></script>
    <script src="js/jquery.min.js?v=2.1.4"></script>
  <script src="js/bootstrap.min.js?v=3.3.6"></script>
  <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="js/plugins/layer/layer.min.js"></script>
  <script src="js/hplus.min.js?v=4.1.0"></script>
  <script type="text/javascript" src="js/contabs.min.js"></script>
  <script src="js/plugins/pace/pace.min.js"></script>
  <script src="./js/search.js"></script>
</body>


</html>
