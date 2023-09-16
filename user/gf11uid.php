<?php  session_start();?>
<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/toastr_notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:59 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>原神GM3.4剧情服平台 - 绑定UID</title>
    <meta name="keywords" content="3.4剧情服">
    <meta name="description" content="3.4剧情服">

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
    $username=$_SESSION['name'];
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    //查什么
    $result = mysqli_query($root,$sql); //执行查找
    $num = mysqli_num_rows($result);    //判断查找结果
    $Am = mysqli_fetch_array($result);
    $userzt=$Am['zt'];
    $userqx=$Am['zt'];
    $gmbb=$Am['gmbb'];
    $user=$Am['user'];
    
    if(!$num)
    {
        echo "<script>alert('该用户不存在!');history.back();</script>";
        exit;
    }else{
        $infor_Array = mysqli_fetch_array($result,1);
    }
    
    if($userzt=="1"){
        $userzt="正常";
    }elseif($userzt=='3'){
        $userzt="封号";
        echo "<script>alert('该用户以被封号!');history.back();</script>";
        exit;
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
                                <h5>绑定3.4剧情服UID</h5>
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
                                    </form>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form action="" method="post">
	        <input hidden type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	        <br>
	        
	        <?php
                                    if($userqx=='1'){
                                        echo '<input type="text" name="gf11uid" id="gf11uid" class="form-control" value="" placeholder="请输入需要绑定3.4剧情服UID"> <span class="help-block m-b-none">请输入需要绑定的剧情服UID（一定要注意，进摩卡原神服务器后右下角的UID 不要乱填）</span>' ;
                                    }else{
                                        echo '<input type="text" name="gfcdk" id="gfcdk" class="form-control" value="" placeholder="请输入你拥有的激活后台卡密"> <span class="help-block m-b-none">请输入你拥有的激活后台卡密</span>' ;
                                    }
                                    ?>
	        
	        <button type="submit" name="usecdk" id="usecdk" class="btn btn-primary" value="getrand"> 绑定UID</button>
	        <form name=alipayment action=epayapi.php method=post target="_blank">
	            <input hidden type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	            <button type="submit" name="ktqx" id="ktqx" class="btn btn-primary" value="getrand"> 自助开通权限</button>
	       </form>
	        </a>
<script src="./sweetalert.min.js"></script>
<script>swal('注意','绑定UID请务必保证输入的UID是3.4剧情服的UID 不要乱填！\r\n 如你已有激活码，请填写激活码即可获取超级权限！','success');</script>
<?php

    if(isset($_POST["usecdk"])){
        include "cus_check.php";
        $gf11uid = $_POST["gf11uid"];
        $gfcdk = $_POST["gfcdk"];
        $username = $_SESSION['name'];
        $sql = "select * from user_information where username LIKE '$username'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        if($Am['gf11uid'] == ''){
            if($gfcdk == ''){
                $sql = "update user_information set gf11uid = '$gf11uid' where username = '$username'";
                $result = mysqli_query($root,$sql);
                echo "<script>swal('绑定成功！','当前绑定UID：$gf11uid','success');</script>";
                echo "<script>location.href = '/gf11.php'</script>";
            }else{
                //echo "<script>swal('绑定成功！','123','success');</script>";
                $sql = "select * from cdk_gf where cdk LIKE '$gfcdk'";
                $result = mysqli_query($root,$sql);
                $Am = mysqli_fetch_array($result);
                $sysl = (int)$Am['sl']; 
                $cdkzt = $Am['zt']; 
                if($cdkzt==''){
                    echo "<script>swal('绑定失败！','激活码错误，无法完成绑定!','error');</script>";
                    exit;
                }elseif($cdkzt=='1'){
                    echo "<script>swal('绑定失败！','激活码已被使用，无法完成绑定!','error');</script>";
                }else{
                    $sql = "update user_information set gf11uid = '$gf11uid' where username = '$username'";
                    $result = mysqli_query($root,$sql);
                    $sql = "update user_information set zt = 1 where username = '$username'";
                    $result = mysqli_query($root,$sql);
                    $sql = "update cdk_gf set zt = '1' where cdk = '$gfcdk'";
                    $result = mysqli_query($root,$sql);
                    $sql = "update cdk_gf set uid = '$username' where cdk = '$gfcdk'";
                    $result = mysqli_query($root,$sql);
                    
            $dqsj = strtotime("+30 days");
            $sql3 = "update user_information set userreg = '$dqsj' where username = '$username'";
            $result3 = mysqli_query($root,$sql3);
                    echo "<script>swal('绑定成功！','当前绑定UID：$gf11uid 并开通超级权限 重新登录礼包网站即可','success');</script>";
                    
                }
            }
        }else{
        if($gfcdk == ''){
                echo"<script>swal('当前账号已绑定UID无法重新绑定！','','error');</script>";
            }else{
                $sql = "select * from cdk_gf where cdk LIKE '$gfcdk'";
                $result = mysqli_query($root,$sql);
                $Am = mysqli_fetch_array($result);
                $sysl = (int)$Am['sl']; 
                $cdkzt = $Am['zt']; 
                if($cdkzt==''){
                    echo "<script>swal('绑定失败！','激活码错误，无法完成绑定!','error');</script>";
                    exit;
                }elseif($cdkzt=='1'){
                    echo "<script>swal('绑定失败！','激活码已被使用，无法完成绑定!','error');</script>";
                }else{
                    $sql = "update cdk_gf set zt = '1' where cdk = '$gfcdk'";
                    $result = mysqli_query($root,$sql);
                    $sql = "update user_information set zt = 1 where username = '$username'";
                    $result = mysqli_query($root,$sql);
                    $sql = "update cdk_gf set uid = '$username' where cdk = '$gfcdk'";
                    $result = mysqli_query($root,$sql);
                    
            $dqsj = strtotime("+30 days");
            $sql3 = "update user_information set userreg = '$dqsj' where username = '$username'";
            $result3 = mysqli_query($root,$sql3);
                    echo "<script>swal('绑定成功！','当前绑定UID：$gf11uid 并开通超级权限 重新登录礼包网站即可','success');</script>";
                    
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
    <script src="js/content.min.js?v=1.0.0"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/toastr_notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:00 GMT -->
</html>
