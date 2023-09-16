<?php  session_start();
$gmbb=$_POST["qu"];
        if($gmbb=="3.4剧情服"){
            $gmdz="http://121.62.18.138:20011/api?uid=";
            $yjdz="http://121.62.18.138:20011/api?";
        }elseif($gmbb=="3.4剧情服"){
            $gmdz="http://121.62.18.138:20011/api?uid=";
            $yjdz="http://121.62.18.138:20011/api?";
        }elseif($gmbb=="3.4剧情服"){
            $gmdz="http://121.62.18.138:20011/api?uid=";
            $yjdz="http://121.62.18.138:20011/api?";
        }
        

?>
<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/toastr_notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:59 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title></title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

</head>
    <?php

    $user=$_SESSION['name'];
    if(!isset($_SESSION['admin']) or !$_SESSION['admin'])
    {
        echo "<script>alert('本页面只有登录之后才能访问！');location.href='../index.php';</script>";
        exit;
    }
    include "cus_check.php";   //导入用户信息
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    
    //查什么
    $result = mysqli_query($root,$sql); //执行查找
    $num = mysqli_num_rows($result);    //判断查找结果
    if(!$num)
    {
        echo "<script>alert('该用户不存在!');history.back();</script>";
        exit;
    }
    else{
        $infor_Array = mysqli_fetch_array($result,1);
        //根据查找结果指向的位置，取得一行关联数组或者字数组
    }
    ?>
<body class="gray-bg">
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>用户管理</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="./gjqx.php">权限开通</a>
                                        </li>
                                        <li><a href="./cdk.php">卡密兑换</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form action="" method="post">
	        <input hidden  type="text" id="username" name="username"  value="<?php echo $user?>" placeholder="请输入账号" maxlength="30">
	        <select class="form-control m-b" id='qu' name="qu">
                <option>3.4剧情服</option>
            </select>
            <span class="help-block m-b-none">请输选择服务器！</span>
	        <input type="text" name="cx" id="cx" class="form-control" placeholder="请输入游戏用户名/部分功能需要UID，请自行查看()里内容"> <span class="help-block m-b-none">请输入游戏用户名/部分功能需要UID，请自行查看()里内容</span>
	        <input type="text" name="bduid" id="bduid" class="form-control" placeholder="请输入你需要绑定的UID"> <span class="help-block m-b-none">请输入你需要绑定的UID(只有绑定账号时需填写其他时候不填写)！</span>
	        <input type="text" name="wpid" id="wpid" class="form-control" placeholder="请输入物品ID"> <span class="help-block m-b-none">请输入物品ID！</span>
	        <input type="text" name="wpsl" id="wpsl" class="form-control" placeholder="请输入物品数量"> <span class="help-block m-b-none">请输入物品数量！</span>
	        <input type="text" name="ddxg" id="ddxg" class="form-control" placeholder="请输入需要修改的账号"> <span class="help-block m-b-none">请输入需要修改的账号</span>
	        <input type="text" name="xguid" id="xguid" class="form-control" placeholder="请输入修改后的账号"> <span class="help-block m-b-none">请输入修改后的账号</span>
	        <button type="submit" name="cxuid" id="cxuid" class="btn btn-primary" value="getrand"> 取消权限(账号)</button>
	        </a>
	        <button type="submit" name="yhfh" id="yhfh" class="btn btn-primary" value="getrand"> 网站封号(账号)</button>
	        </a>
	        <button type="submit" name="yhxg" id="yhxg" class="btn btn-primary"  value="getrand"> 修改账号(账号+修改后账号)</button>
	        <br>
	        <span class="help-block m-b-none">请注意看(里要求填写的数据)！</span>
	        <button type="submit" name="qx" id="qx" class="btn btn-primary"  value="getrand"> 取消绑定(账号)</button>
	        </a>
	        <button type="submit" name="yhfh" id="yhfh" class="btn btn-primary" value="getrand"> 封禁账号(账号)</button>
	        </a>
	        <button type="submit" name="ktqx" id="ktqx" class="btn btn-primary" value="getrand"> 开通权限(账号)</button>
	        </a>
	        <button type="submit" name="yjqx" id="yjqx" class="btn btn-primary" value="getrand"> 永久权限(账号)</button>
	        </a>
	        <button type="submit" name="xflj" id="xflj" class="btn btn-primary" value="getrand"> 开小月卡(账号)</button>
	        </a>
	        <button type="submit" name="tpdj" id="tpdj" class="btn btn-primary" value="getrand"> 开大月卡(账号)</button>
	        </a>
	        <button type="submit" name="bdzh" id="bdzh" class="btn btn-primary" value="getrand"> 绑定账号(账号+UID)</button>
	        </a>
	        <button type="submit" name="abrw" id="abrw" class="btn btn-primary" value="getrand"> 修复安伯(UID)</button>
	        </a>
	        <button type="submit" name="qtdl" id="qtdl" class="btn btn-primary" value="getrand"> 开启瞄点(UID)</button>
	        </a>
	        <button type="submit" name="czrw" id="czrw" class="btn btn-primary" value="getrand"> 获取物品(UID)</button>
	        </a>
	        <button type="submit" name="yjcs" id="yjcs" class="btn btn-primary" value="getrand"> 邮件测试(UID)</button>
	        </a>
	        <button type="submit" name="czyx" id="czyx" class="btn btn-primary" value="getrand"> 重置账号(UID)</button>
	        </a>
	        <button type="submit" name="cxzcyx" id="cxzcyx" class="btn btn-primary" value="getrand"> 重新注册(账号)</button>
	        </a>
	        </form>
	        <form action="gf11.php" method="get">
	            </a>
	            <input type="text" name="ycuid" id="ycuid" class="form-control" placeholder="请输入游戏UID"> <span class="help-block m-b-none">请输入游戏UID</span>
	            <button type="submit" name="gm" id="gm" class="btn btn-primary"  value="getrand"> GM工具(UID)</button>
	        </a>
            </form>
            </br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./sweetalert.min.js"></script>
    <?php
if($_POST["username"] != ""){
    include "cus_check.php";
    if(isset($_POST["cxuid"])){
    $user=$_POST["cx"];
    $manager = new MongoDB\Driver\Manager('mongodb://root:vSfNv8mqcspnERzT@数据库地址:27017');//链接数据库
    //查询账号数据
    $where = ['username'=>$user];
    $options = ['username'=>'','reservedPlayerId'=>'','permissions'=>'','locale'=>'',];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.accounts', $query);
    foreach($cursor as $doc){
        $UID=$doc->_id;//获取到账号ID
        $username=$doc->username;
        $permissions=$doc->permissions['0'];
        $locale=$doc->locale;
        if($permissions==""){
            $permissions="无权限";
        }elseif($permissions=='*'){
            $permissions="所有权限";
        }elseif($permissions=='mojo.console'){
            $permissions="高级权限";
        }
    }
    //查询游戏数据
    $where = ['accountId'=>$UID];//通过账号ID查询数据
    $options = ['_id'=>'','nickname'=>'','godmode'=>''];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.players', $query);
    foreach($cursor as $doc) {
        $ownerid=$doc->_id;
        $UID1=$ownerid;
        $playername=$doc->nickname;
        $godmode=$doc->godmode;
        $sjdj=$doc->playerProfile->worldLevel;
        if($godmode==false){
            $godmode="关闭";
        }elseif($godmode==true){
            $godmode="开启";
        }else{
            $godmode="关闭";
        }
    }
    if($username==""){
        echo"<script>swal('$cx','','warning');</script>";
	    //echo "<font size='4' color= '#00BFFF'><br>用户名不能为空!<br>";
	}else{
        //开始换绑
                $bulk = new MongoDB\Driver\BulkWrite;
                $filter = ['username'=>$user];
                $admin = array('');
                $newObj = ['$set'=>['username'=>$user,'permissions'=>$admin]];
                $bulk->update($filter, $newObj);
                $manager->executeBulkWrite('grasscutter.accounts',$bulk);
                echo"<script>swal('取消权限成功','','success');</script>";
	}
    }
    
    
    //重新注册游戏账号
if(isset($_POST["cxzcyx"])){
include "./cus_check.php";
$UID1 = $_POST["cx"];
$user='8251633168';
//查询MySQL数据库中account_uid字段等于$user的记录
$sql = "SELECT account_uid FROM t_player_uid WHERE uid = '$UID1'";
$result = mysqli_query($mysql_conn, $sql);

//如果查询结果不为空，则遍历结果集并将数据插入到MongoDB数据库
if (mysqli_num_rows($result) > 0) {
    //连接MongoDB数据库
    $manager = new MongoDB\Driver\Manager('mongodb://root:vSfNv8mqcspnERzT@数据库地址:27017');
    //遍历MySQL查询结果集
    while ($row = mysqli_fetch_assoc($result)) {
        //将数据插入到MongoDB数据库
        $bulk = new MongoDB\Driver\BulkWrite;
        $ppuid =$row["account_uid"];
        echo"<script>swal('匹配uid','$ppuid','success');</script>";
        $bulk->insert(['_id'=>(string)(intval($ppuid)),'username'=>$user,'reservedPlayerId'=>(intval($ppuid)),'permissions'=>['0'=>''],'locale'=>'zh_CN']);
        $manager->executeBulkWrite('grasscutter.accounts', $bulk); 
        
    }
} else {
    echo "没有找到匹配的记录。";
}

} 

    
    
    if(isset($_POST["zjsc"])){
        include "cus_check.php";
        $username = $_POST["cx"];
        $sql = "select * from user_information where username = '$username'";
        $result = mysqli_query($root,$sql); 
        $num = mysqli_num_rows($result);
        $Am = mysqli_fetch_array($result);
        $userreg = $Am["userreg"];
        //echo"<script>swal('封号失败','$zt','warning');</script>";
        if($userreg < time()){
            //如果小于当前时间戳取当前时间+7天
            include "cus_check.php";
            $new_timestamp = strtotime('+30 days');
            $sql= "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
            $result = mysqli_query($root,$sql);
            echo"<script>swal('$userreg','','success');</script>";
        }else{
            //如果大于数据库时间戳取当前时间+7天
            include "cus_check.php";
            $new_timestamp = strtotime('+30 days', $userreg);
            $sql = "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
            $result = mysqli_query($root,$sql);
            echo"<script>swal('续费30天成功','','success');</script>";
        }
    }
    
    if(isset($_POST["yhxg"])){
        include "cus_check.php";
        $ddxg = $_POST["ddxg"];
        $xguid = $_POST["xguid"];
        $sql = "select * from hk4e_accounts where username = '".$ddxg."'";
        $result = mysqli_query($sdk,$sql); 
        $Amsdk = mysqli_fetch_array($result);
        $xgid = $Amsdk['id'];
        if($xgid == ""){
            echo "<script>swal('修改失败！','没查询到需要修改的账号： $ddxg','error');</script>";
            exit ;
        }
        $sql = "UPDATE hk4e_accounts SET email='".$xguid."@a.com' , username='".$xguid."' WHERE id=".$xgid."";
        mysqli_query($sdk, $sql);
        echo "<script>swal('修改成功！','修改后账号： $xguid','success');</script>";
        exit ;
    }
    
    
    if(isset($_POST["bdzh"])){
        $username = $_POST["cx"];
        $bduid=$_POST["bduid"];
        include "cus_check.php";
        $sql = "UPDATE user_information SET gf11uid='".$bduid."' WHERE username='".$username."'";
        $result = mysqli_query($root,$sql);
        echo "<script>swal('UID绑定成功！','$bduid','success');</script>";
    }
    
    if(isset($_POST["gm"])){
        $username = $_POST["cx"];
        $url = "Location: http://".$_SERVER['HTTP_HOST']."/user/gf11.php?uid=".$username;
        echo '<meta http-equiv="refresh" content="2;url='.$url.'">';
    }
    
    if(isset($_POST["yjqx"])){
        $username = $_POST["cx"];
        include "cus_check.php";
        $new_timestamp=3000000000;
        $sql2= "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
        $result2 = mysqli_query($root,$sql2);
        echo "<script>swal('永久权限开通成功！','$bduid','success');</script>";
    }
    
    if(isset($_POST["yjcs"])){
        $username = $_POST["cx"];
        $dquser=$_SESSION['name'];
        $user=$_POST["cx"];
        $yjfssj=time();
        $yjdqsj=strtotime('+7 days');
        $wpid=$_POST["wpid"];
        $wpsl=$_POST["wpsl"];
        $cmd2 = 'importance=&config_id=&uid='.$user.'&title='.urlencode('物品到账啦！').'&content='.urlencode('GM管理已为您发放物品 \n 如有问题请联系管理员').'&sender='.urlencode('原神GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$wpid.':'.$wpsl.'&cmd=1005&ticket='.$yjfssj;
        $cmd = $yjdz.$cmd2;
        $re=file_get_contents($cmd);
        echo "<script>swal('邮件发送成功！','','success');</script>";
    }
    
    if(isset($_POST["yhfh"])){
        include "cus_check.php";
        $user=$_POST["cx"];
        $sql = "select * from user_information where username LIKE '$user'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        $zt = $Am['zt'];
        //echo"<script>swal('封号失败','$zt','warning');</script>";
        if($zt == '3'){
            echo"<script>swal('封号失败','当前用户已处于封号状态,已为你自动解封！','warning');</script>";
            $sql = "update user_information set zt = 0 where username = '$user'";
            $result = mysqli_query($root,$sql);
        }else{
            if($user == '8251633168'){
                echo"<script>swal('封号失败','此账号无法封号！','warning');</script>";
            }else{
                $sql = "update user_information set zt = 3 where username = '$user'";
                $result = mysqli_query($root,$sql);
                echo"<script>swal('封号成功','','success');</script>";
            }
        }
    }
    
    if(isset($_POST["ktqx"])){
        include "cus_check.php";
        $user=$_POST["cx"];
        $sql = "select * from user_information where username LIKE '$user'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        $zt = $Am['zt'];
        //echo"<script>swal('封号失败','$zt','warning');</script>";
        if($zt == '3'){
            echo"<script>swal('开通失败','当前用户已处于封号状态,无法开通权限！','warning');</script>";
        }else{
            $sql = "update user_information set zt = 1 where username = '$user'";
            $result = mysqli_query($root,$sql);
            include "cus_check.php";
            $data = $namespace;  
            $data .= $_SERVER ['REQUEST_TIME'];     // 请求那一刻的时间戳  
            $data .= $_SERVER ['HTTP_USER_AGENT'];  // 获取访问者在用什么操作系统  
            $data .= $_SERVER ['SERVER_ADDR'];      // 服务器IP  
            $data .= $_SERVER ['SERVER_PORT'];      // 端口号  
            $data .= $_SERVER ['REMOTE_ADDR'];      // 远程IP  
            $data .= $_SERVER ['REMOTE_PORT'];      // 端口信息  
            $hash = strtoupper ( hash ( 'ripemd128', $uid . $guid . md5 ( $data ) ) );  
            $guid = substr ( $hash, 20, 12 ) ;  
            $cdk=$guid;
            $wp='201';
            $sl='1';
            $bt="注册官服1:1";
            $nr="感谢注册官服1:1账号注册成功！";
            $sc=$_SESSION['name'];
            $sql = "select * from cdk_gf where cdk LIKE '$cdk'";
            $result = mysqli_query($root,$sql);             //查询SELECT * FROM `cdk_wp` WHERE `cdk` LIKE 'zpl'
            $no = mysqli_num_rows($result);   
            $sj = time(); 
            $sql = "insert into cdk_gf (cdk,wp,sl,bt,nr,uid,sc,sj,zt,bduid) VALUE ('$cdk','$wp','$sl','$bt','$nr','','$sc','$sj','0','')";
            $result = mysqli_query($root,$sql);
            $qbkm = $qbkm.$guid.'\r\n';
            $sql = "update user_information set zt = 1 where username = '$user'";
            $result = mysqli_query($root,$sql);
            $sql = "update cdk_gf set zt = 1 where cdk = '$cdk'";
            $result = mysqli_query($root,$sql);
            $sql = "update cdk_gf set uid = '$user' where cdk = '$cdk'";
            $result = mysqli_query($root,$sql);
            $dqsj = strtotime("+30 days");
            $sql3 = "update user_information set userreg = '$dqsj' where username = '$user'";
            $result3 = mysqli_query($root,$sql3);
            
            echo"<script>swal('开通成功','使用卡密：$qbkm 开通用户：$user','success');</script>";
        }
    }
    if(isset($_POST["szyg"])){
        $dquser=$_SESSION['name'];
        if($dquser == '8251633168'){
            include "cus_check.php";
            $user=$_POST["cx"];
            $sql = "select * from user_information where username LIKE '$user'";
            $result = mysqli_query($root,$sql);
            $Am = mysqli_fetch_array($result);
            $zt = $Am['admin'];
            if($zt == '3'){
            echo"<script>swal('设置失败','当前用户已是管理员，无法进行设置！','warning');</script>";
            }else{
                if($user == '8251633168'){
                    echo"<script>swal('设置失败','此账号无法设置！','warning');</script>";
                }else{
                    $sql = "update user_information set admin = 1 where username = '$user'";
                    $result = mysqli_query($root,$sql);
                    echo"<script>swal('设置管理员成功','用户：$user 已成为管理员，请让他重新登录网站即可','success');</script>";
                }
            }
        }else{
            echo"<script>swal('设置失败','你没有权限使用此功能！','warning');</script>";
        }
    }
    
    
    if(isset($_POST["abrw"])){
        $dquser=$_SESSION['name'];
        $user=$_POST["cx"];
        $cmd2 = '&msg=quest+finish+35404&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = $gmdz.$user.$cmd2;
        $re=file_get_contents($cmd);
        echo "<script>swal('修复的安伯任务成功！','$cmd','success');</script>";
    }
    
    if(isset($_POST["czyx"])){
        $dquser=$_SESSION['name'];
        $user=$_POST["cx"];
        $cmd2 = '&msg=clear+all&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = $gmdz.$user.$cmd2;
        $re=file_get_contents($cmd);
        echo "<script>swal('重置账号成功！','','success');</script>";
    }
    
    if(isset($_POST["tpdj"])){
        $user=$_POST["cx"];
        $sql = "update user_information set vip = '2' where username = '$user'";
        $result = mysqli_query($root,$sql);
        $sql = "select * from user_information where username = '".$user."'";
        $result = mysqli_query($root,$sql); 
        $num = mysqli_num_rows($result);
        $Am = mysqli_fetch_array($result);
        $UID1=$Am['gf11uid'];
        $cmd2 = 'importance=&config_id=&uid='.$UID1.'&title='.urlencode($yjbt).'&content='.urlencode('尊敬的用户:'.$username.'\n感谢您的支持，您的大月卡开通成功！').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list=201:1&cmd=1005&ticket='.$yjfssj;
        $zxurl = $yjdz.$cmd2;
        echo "<script>swal('开通成功','大月卡开通成功，请刷新网页领取每日礼包！','success');</script>";
    }
    
    if(isset($_POST["qtdl"])){
        $dquser=$_SESSION['name'];
        $user=$_POST["cx"];
        $UID1 = $_POST["cx"];
        $cmd1 = $gmdz;
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=quest+finish+30302";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30303";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30304";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30305";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30306";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30307";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30308";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30309";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30310";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30311";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30312";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30313";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30314";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30315";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30316";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30317";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30318";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30319";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30320";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30321";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30322";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30323";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30324";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30325";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30326";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=quest+finish+30327";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=point+3+all";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=point+5+all";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $cmd = "&msg=point+6+all";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        echo "<script>swal('全图点亮成功','','success');</script>";
    }
    
    if(isset($_POST["xflj"])){
        $user=$_POST["cx"];
        $sql = "update user_information set vip = '1' where username = '$user'";
        $result = mysqli_query($root,$sql);
        $sql = "select * from user_information where username = '".$user."'";
        $result = mysqli_query($root,$sql); 
        $num = mysqli_num_rows($result);
        $Am = mysqli_fetch_array($result);
        $UID1=$Am['gf11uid'];
        $cmd2 = 'importance=&config_id=&uid='.$UID1.'&title='.urlencode($yjbt).'&content='.urlencode('尊敬的用户:'.$username.'\n感谢您的支持，您的小月卡开通成功！').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list=201:1&cmd=1005&ticket='.$yjfssj;
        $zxurl = $yjdz.$cmd2;
        echo "<script>swal('开通成功','小月卡开通成功，请刷新网页领取每日礼包！','success');</script>";
    }
    
    if(isset($_POST["czrw"])){
        $dquser=$_SESSION['name'];
        $user=$_POST["cx"];
        $wpid=$_POST["wpid"];
        $wpsl=$_POST["wpsl"];
        $cmd2 = '&msg=item+add+'.$wpid.'+'.$wpsl.'&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = $gmdz.$user.$cmd2;
        $re=file_get_contents($cmd);
        $json = json_decode($re, true);
        if ($json['msg']=='succ') {
            echo "<script>swal('获取成功','','success');</script>";
            exit; 
        }else{
            echo "<script>swal('获取失败，请保证用户在线','','error');</script>";
            exit ;
        }
    }
    
    if(isset($_POST["hqjj"])){
        $dquser=$_SESSION['name'];
        $user=$_POST["cx"];
        $cmd2 = '&msg=mcoin+20000&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = $gmdz.$user.$cmd2;
        $re=file_get_contents($cmd);
        $json = json_decode($re, true);
        if ($json['msg']=='succ') {
            echo "<script>swal('获取2万创世结晶成功','','success');</script>";
            exit; 
        }else{
            echo "<script>swal('获取失败，请保证用户在线','','error');</script>";
            exit ;
        }
        
    }
    
    if(isset($_POST["wmcf"])){
        $dquser=$_SESSION['name'];
        $user=$_POST["cx"];
        $cmd2 = '&msg=quest+finish+800001&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = $gmdz.$user.$cmd2;
        $re = file_get_contents($cmd);
        $cmd2 = '&msg=quest+accept+800002&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = $gmdz.$user.$cmd2;
        $re = file_get_contents($cmd);
        echo "<script>swal('修复我们终将重逢任务成功','','success');</script>";
    }
    
    
    if(isset($_POST["qx"])){
        $dquser=$_SESSION['name'];
       
            include "cus_check.php";
            $user=$_POST["cx"];
            $sql = "select * from user_information where username LIKE '$user'";
            $result = mysqli_query($root,$sql);
            $Am = mysqli_fetch_array($result);
            $zt = $Am['gf11uid'];
            if($zt == ''){
            echo"<script>swal('解绑失败','当前未绑定账号无法解绑！','warning');</script>";
            }else{
                if($user == '8251633168'){
                    echo"<script>swal('解绑失败','此账号无法解绑！','warning');</script>";
                }else{
                    $sql = "update user_information set gf11uid = '' where username = '$user'";
                    $result = mysqli_query($root,$sql);
                    echo"<script>swal('解绑成功','用户：$user 已取消绑定','success');</script>";
                }
            }
      
        
    }
    if(isset($_POST["xf"])){
            $user = $_SESSION['name'];
            $sql = "select * from user_information where username LIKE '$user'";
            $result = mysqli_query($root,$sql);
            $Am = mysqli_fetch_array($result);
            $zt = $Am['admin'];
            $ZQZH = $_POST["cx"];
            if($zt == "1"){
                //$UID = $Am['uid'];
                $manager = new MongoDB\Driver\Manager('mongodb://root:vSfNv8mqcspnERzT@数据库地址:27017');
                $where = ['username'=>$ZQZH];
                $options = ['username'=>'','reservedPlayerId'=>'','permissions'=>'','locale'=>'',];
                $query = new MongoDB\Driver\Query($where, $options);
                $cursor = $manager->executeQuery('grasscutter.accounts', $query);
                foreach($cursor as $doc){
                $ZQUID=$doc->_id;
                }
                $user = $_POST["cx"];
                $bulk = new MongoDB\Driver\BulkWrite;
                $filter = ['_id' => $ownerid];
                $option = ['limit' => 0];
                $bulk->delete($filter, $option);
                $manager->executeBulkWrite('grasscutter.players',$bulk);
                $bulk = new MongoDB\Driver\BulkWrite;
                $filter = ['username'=>$ZQZH];
                $newObj = ['$set'=>['_id'=>$ZQUID,'reservedPlayerId'=>"0"]];
                if($ZQUID==""){
                    echo"<script>swal('未查询到相关账号','','warning');</script>";
                }else{
                    $bulk->update($filter, $newObj);
                    $manager->executeBulkWrite('grasscutter.accounts',$bulk);
                    echo"<script>swal('通过管理员修复成功！！','如未成功，请下游戏后在点修复，然后在等待5分钟后上游戏','success');</script>";
                }
                
        }else{
            echo"<script>swal('非管理员无法使用此接口修复','','warning');</script>";
        }
    }
}
?>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/toastr_notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:00 GMT -->
</html>
