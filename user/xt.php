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
$host = '121.62.18.138';
$port = 22;
$username = 'root';
$password = '8KrJoQ2V7NK97r88';
$connection = ssh2_connect($host, $port);
if (!$connection) {
    die('SSH connection failed');
}
if (!ssh2_auth_password($connection, $username, $password)) {
   die('SSH authentication failed');
}
$command = "ps -C gameserver -o etimes= | awk '{print int($1/60), ".'"分钟"}'."'";
$stream = ssh2_exec($connection, $command);
if (!$stream) {
    die('SSH command execution failed');
}
stream_set_blocking($stream, true);
$yxsc = stream_get_contents($stream);
fclose($stream);
//GM服务运行时长
$command = "ps -C muipserver -o etimes= | awk '{print int($1/60), ".'"分钟"}'."'";
$stream = ssh2_exec($connection, $command);
if (!$stream) {
    die('SSH command execution failed');
}
stream_set_blocking($stream, true);
$gmyxsc = stream_get_contents($stream);
fclose($stream);

//邮件服务运行时长
$command = "ps -C multiserver -o etimes= | awk '{print int($1/60), ".'"分钟"}'."'";
$stream = ssh2_exec($connection, $command);
if (!$stream) {
    die('SSH command execution failed');
}
stream_set_blocking($stream, true);
$yjyxsc = stream_get_contents($stream);
fclose($stream);
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
                                <h5>服务器管理</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form action="" method="post">
                                    <input hidden type="text" id="username" name="username" value="<?php echo $user?>" placeholder="" maxlength="30">
                                    <span class="help-block m-b-none">游戏服务运行时长：<?php echo $yxsc?></span></br>
                                    <span class="help-block m-b-none">邮件服务运行时长：<?php echo $yjyxsc?></span></br>
                                    <span class="help-block m-b-none">GM服务运行时长：<?php echo $gmyxsc?></span></br>
                                    <button type="submit" name="cqfwq" id="cqfwq" class="btn btn-primary"  value="getrand"> 重启游戏服务</button>
                                    <button type="submit" name="cqfwq" id="cqgmfw" class="btn btn-primary"  value="getrand"> 重启GM服务</button>
                                    <button type="submit" name="cqvia" id="cqvia" class="btn btn-primary"  value="getrand"> 重启备用Via</button>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>数据库管理</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form action="" method="post">
                                    <input hidden type="text" id="username" name="username" value="<?php echo $user?>" placeholder="" maxlength="30">
                                    <span class="help-block m-b-none">数据库地址：数据库地址</span></br>
                                    <span class="help-block m-b-none">数据库端口：3306</span></br>
                                    <span class="help-block m-b-none">数据库账号：gmkc</span></br>
                                    <span class="help-block m-b-none">数据库密码：数据库密码</span></br>
                                    <button type="submit" name="bfmysql" id="bfmysql" class="btn btn-primary"  value="getrand"> 备份数据库</button>
                                    <br>
                                </form>
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
    if(isset($_POST["cqfwq"])){
        $host = '121.62.18.138';
        $port = 22;
        $username = 'root';
        $password = '8KrJoQ2V7NK97r88';
        $connection = ssh2_connect($host, $port);
        if (!$connection) {
            die('SSH connection failed');
        }
        if (!ssh2_auth_password($connection, $username, $password)) {
           die('SSH authentication failed');
        }
        $command = "pkill -9 gameserver";
        $stream = ssh2_exec($connection, $command);
        if (!$stream) {
            die('SSH command execution failed');
        }
        stream_set_blocking($stream, true);
        $output = stream_get_contents($stream);
        fclose($stream);
        echo "<script>swal('重启成功','游戏服务以成功重启，预计将在5分钟内完成重启！','success');</script>";
    }
    
    if(isset($_POST["cqgmfw"])){
        echo "<script>swal('重启失败','当前网站未开启此功能！','error');</script>";
    }
    if(isset($_POST["bfmysql"])){
        echo "<script>swal('备份失败','当前网站未开启此功能！','error');</script>";
    }
    
    if(isset($_POST["cqvia"])){
        $host = '121.62.18.138';
        $port = 22;
        $username = 'root';
        $password = '8KrJoQ2V7NK97r88';
        $connection = ssh2_connect($host, $port);
        if (!$connection) {
            die('SSH connection failed');
        }
        if (!ssh2_auth_password($connection, $username, $password)) {
           die('SSH authentication failed');
        }
        $command = "pkill -9 gameserver";
        $stream = ssh2_exec($connection, $command);
        if (!$stream) {
            die('SSH command execution failed');
        }
        stream_set_blocking($stream, true);
        $output = stream_get_contents($stream);
        fclose($stream);
        echo "<script>swal('重启成功','Via服务以成功重启，预计将在30秒内完成重启！','success');</script>";
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
