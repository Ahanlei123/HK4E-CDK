<?php  session_start();?>
<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/toastr_notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:59 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>官服1:1自定义uid</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

</head>
    <?php

    
    if(!isset($_SESSION['name']) or !$_SESSION['name'])
    {
        echo "<script>alert('本页面只有登录之后才能访问！');location.href='index.php';</script>";
        exit;
    }
    include "cus_check.php";   //导入用户信息
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    //查什么
    $result = mysqli_query($root,$sql); //执行查找
    $Zl = mysqli_fetch_array($result);
    $gmbb = $Zl['gmbb'];
    $gf11uid = $Zl['gf11uid'];
    $num = mysqli_num_rows($result);    //判断查找结果
    if(!$num)
    {
        echo "<script>alert('该用户不存在!');history.back();</script>";
        exit;
    }
    else{
        $infor_Array = mysqli_fetch_array($result,1);
        //根据查找结果指向的位置，取得一行关联数组或者字数组
        $user=$_SESSION['name'];
        
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
                                <h5>自定义UID(装X专用)</h5>
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
	        <input hidden type="text" id="username" name="username" value="<?php echo $username ?>" placeholder="请输入账号" maxlength="30">
	        <input hidden type="text" id="gf11uid" name="gf11uid" value="<?php echo $gf11uid ?>" placeholder="请输入账号" maxlength="30">
	        
	        <input type="text" name="getcdk" id="getcdk" class="form-control" placeholder="请输入购买的自定义CDK"> <span class="help-block m-b-none">请输入购买的CDK</span>
	        <input type="text" name="zdyuid" id="zdyuid" class="form-control" placeholder="请输入需要修改的UID(如你的官服UID 一定要填你想要的UID不要填你现在的私服UID)"> <span class="help-block m-b-none">请输入自定义UID 就是你想要的UID</span>
	        <button type="submit" name="zdy" id="zdy" class="btn btn-primary" value="getrand"> 开始自定义</button>
	        </a>
	        <button type="submit" name="home" id="home" class="btn btn-primary"  value="getrand"> 购买卡密</button>
	        </a>
	        <br>
	        <font size='3' color= '#00BFFF'><br>注意：自定义UID会重置账号数据 账号绑定高级权限uid会自动更换 请谨慎操作</font>
</font>
<script src="./sweetalert.min.js"></script>
<?php
            if(isset($_POST["home"])){
header("Location: https://pay.yssf66.top?code=YT0xJmI9Mw%3D%3D"); 
exit;
}
    include "cus_check.php"; 
    $setUID=$_POST["set_UID"];
    $zdyuid=$_POST["zdyuid"];
    $usecdk=($_POST["getcdk"]);
    if(isset($_POST["zdy"])){
        $sql = "select * from cdk_wp where cdk LIKE '$usecdk' AND wp LIKE '9999'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        if($Am['zt']=="0"){
            $sql = "update cdk_wp set uid= '".$zdyuid."', zt= '1' where cdk = '$usecdk'";
            $result = mysqli_query($root,$sql);
            if($gmbb=="1"){
                $sql1 = "update t_player_uid set uid= '".$zdyuid."' where uid = '$gf11uid'";
                $result1 = mysqli_query($root1,$sql1);
                echo"<script>swal('官服1:1(1服)UID自定义成功！','请重启游戏后查看','success');</script>";
            }elseif($gmbb=='2'){
                $sql2 = "update t_player_uid set uid= '".$zdyuid."' where uid = '$gf11uid'";
                $result2 = mysqli_query($root2,$sql2);
                echo"<script>swal('官服1:1(2服)UID自定义成功！','请重启游戏后查看','success');</script>";
            }elseif($gmbb=='3'){
                $sql3 = "update t_player_uid set uid= '".$zdyuid."' where uid = '$gf11uid'";
                $result3 = mysqli_query($root3,$sql3);
                echo"<script>swal('官服1:1(3服)UID自定义成功！','请重启游戏后查看','success');</script>";
            }elseif($gmbb=='4'){
                $sql4 = "update t_player_uid set uid= '".$zdyuid."' where uid = '$gf11uid'";
                $result4 = mysqli_query($root4,$sql4);
                echo"<script>swal('官服1:1(4服)UID自定义成功！','请重启游戏后查看','success');</script>";
            }
            $sql = "update user_information set gf11uid= '".$zdyuid."' where username = '".$_SESSION['name']."'";
            $result = mysqli_query($root,$sql);
        }elseif($Am['zt']=='1'){
            echo"<script>swal('当前卡密已被使用！','','warning');</script>";
        }else{
            echo"<script>swal('自定义UID CDK错误，请重新输入！','','warning');</script>";
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
    <script src="js/content.min.js?v=1.0.0"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/toastr_notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:00 GMT -->
</html>
