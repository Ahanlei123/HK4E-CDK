<?php
include "./user/cus_check.php";
$szsql = "select * from web_sz where id = '1'";
$websc = mysqli_query($root,$szsql); 
$num = mysqli_num_rows($websc);
$web = mysqli_fetch_array($websc);
$webbt=$web['webbt'];//网站标题
$webqq=$web['webqq'];//网站QQ群
$webkey='12';
// 获取 name 参数的值，如果没有或者为空，则返回默认值 unknown
$bt = isset($_GET['yjbt']) ? $_GET['yjbt'] : 'unknown';
$nr = isset($_GET['yjnr']) ? $_GET['yjnr'] : 'unknown';
$fsr = isset($_GET['fsr']) ? $_GET['fsr'] : 'unknown';
$uid = isset($_GET['uid']) ? $_GET['uid'] : '0';
$xguid = isset($_GET['xguid']) ? $_GET['xguid'] : '';
$wp = isset($_GET['wp']) ? $_GET['wp'] : '202:1';
$fssj = isset($_GET['fssj']) ? $_GET['fssj'] : '0';
$dqsj = isset($_GET['dqsj']) ? $_GET['dqsj'] : '0';
$fhsj = isset($_GET['fhsj']) ? $_GET['fhsj'] : '0';
$key= isset($_GET['key']) ? $_GET['key'] : 'unknown';
$wpid= isset($_GET['wpid']) ? $_GET['wpid'] : '0';
$zl= isset($_GET['zl']) ? $_GET['zl'] : '';
$yjdz="http://121.62.18.138:20011/api?";
if ($key != $webkey) {
    echo "密钥错误！";
    exit;
}
//处理邮件内容
$nr = str_replace("换行", '\n', $nr);
if ($bt=='0') {
    $bt="原神补偿邮件-请及时领取！";
}elseif($bt=='1'){
    $bt="原神节日邮件-请及时领取！";
}else{
    $bt="你有新的邮件请及时领取！";
}

if($zl == "999"){
    if ($key != $webkey) {
        echo "密钥错误！";
    }elseif($key == $webkey){
        echo "密钥正确！";
    }
}


//全服邮件
if ($zl == "1") {
    $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode($bt).'&content='.urlencode($nr).'&sender='.urlencode($fsr).'&expire_time='.$dqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$wp.'&cmd=1005&ticket='.$fssj;
    $zxurl = $yjdz.$cmd2;
    $re = file_get_contents($zxurl);
    $json = json_decode($re, true);
    if ($json['msg']=='mail has been sent, do not re_send mail') {
        echo "邮件已发送，请勿重复发送！";
        exit ;
    }elseif($json['msg']=='succ'){
        echo "邮件发送成功！";
        exit ;
    }else{
        echo "邮件发送异常，请联系管理员处理！".$json['msg'];
        exit ;
    }
}

//用户封号
if($zl == "2"){
    include "./user/cus_check.php";
    $kssj = date("Y-m-d H:i:s");
	$jssj = date('Y-m-d H:i:s', strtotime('+'.$fhsj.' days'));
    $sql ="INSERT INTO `t_login_black_uid_config` (`id` ,`uid` ,`begin_time` ,`end_time` ,`msg`)VALUES (NULL , '$uid', '$kssj', '$jssj', NULL);";
    mysqli_query($conngame, $sql);
    echo "封号成功";
    exit ;
}

//用户解封
if($zl == "3"){
    include "./user/cus_check.php";
    
    $sql ="DELETE FROM `t_login_black_uid_config` WHERE `t_login_black_uid_config`.`uid` = '$uid'";
    mysqli_query($conngame, $sql);
    echo "解封成功";
    exit ;
}

//用户修改
if($zl == "4"){
    include "./user/cus_check.php";
    $sql = "select * from hk4e_accounts where username = '".$uid."'";
    $result = mysqli_query($sdk,$sql); 
    $num = mysqli_num_rows($result);
    $Amsdk = mysqli_fetch_array($result);
    $xgid = $Amsdk['id'];
    if($xgid == ""){
        echo "修改失败，没查询到当前账号".$uid;
        exit ;
    }
    $sql = "UPDATE hk4e_accounts SET email='".$xguid."@a.com' , username='".$xguid."' WHERE id=".$xgid."";
    mysqli_query($sdk, $sql);
    echo "修改成功".$xguid;
    exit ;
}

//查询UID是否充值
if($zl == "5"){
    include "./user/cus_check.php";
    $sql = "select * from cdk_wp where uid = '".$uid."'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $cdk=$Am['cdk'];
    if($cdk == ""){
        include "./user/cus_check.php";
        $kssj = date("Y-m-d H:i:s");
        $jssj = date('Y-m-d H:i:s', strtotime('+3650 days'));
        $sql ="INSERT INTO `t_login_black_uid_config` (`id` ,`uid` ,`begin_time` ,`end_time` ,`msg`)VALUES (NULL , '$uid', '$kssj', '$jssj', NULL);";
        mysqli_query($conngame, $sql);
        echo "以封号";
        exit ;
    }else{
        echo "以充值";
        exit ;
    }
}

//解封全部账号
if($zl == "6"){
    include "./user/cus_check.php";
    $sql8 = "TRUNCATE t_login_black_uid_config";
    mysqli_query($conngame, $sql8);
    date_default_timezone_set('PRC');
    echo "解封成功";
    exit ;
}

//查询用户
if($zl == "7"){
    include "./user/cus_check.php";
    $sql = "select * from t_player_uid where uid = '".$uid."'";
    $result = mysqli_query($mysql_conn,$sql); 
    $num = mysqli_num_rows($result);
    $Amuser = mysqli_fetch_array($result);
    $account_uid = $Amuser['account_uid'];
    
    $sql = "select * from hk4e_accounts where id = ".$account_uid."";
    $result = mysqli_query($sdk,$sql); 
    $num = mysqli_num_rows($result);
    $Amsdk = mysqli_fetch_array($result);
    $user = $Amsdk['username'];
    
    $sql = "select * from cdk_wp where uid = '".$uid."'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $cdk = $Am['cdk'];
    
    
    
    $sql = "select * from hk4e_accounts where id = ".$account_uid."";
    $result = mysqli_query($sdk1,$sql); 
    $num = mysqli_num_rows($result);
    $Amsdk1 = mysqli_fetch_array($result);
    $xuser = $Amsdk1['username'];
    
    if($cdk == ""){
        $cdk='未充值';
    }else{
        $cdk="以充值";
    }
    echo "登录账号:".$user."(老)--".$xuser."(新)--".$cdk;
    exit ;
}

//用户修改
if($zl == "8"){
    include "./user/cus_check.php";
    $sql = "select * from game_wp where uuid = '".$wpid."'";
    $result = mysqli_query($root,$sql); 
    $Am = mysqli_fetch_array($result);
    echo $Am['name'];
    exit ;
}

?>