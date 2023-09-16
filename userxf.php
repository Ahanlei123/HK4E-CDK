<?php  session_start();?>
<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/toastr_notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:59 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>原神GM3.4剧情服平台 - 续费服务</title>
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
    include "./user/cus_check.php";   //导入用户信息
    $username=$_SESSION['name'];
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    //查什么
    $result = mysqli_query($root,$sql); //执行查找
    $num = mysqli_num_rows($result);    //判断查找结果
    $Am = mysqli_fetch_array($result);
    $userzt=$Am['zt'];
    $gmbb=$Am['gmbb'];
    $user=$Am['user'];
    $userreg=$Am['userreg'];
    $userzt=$Am['zt'];
    $uudqsj = date('Y-m-d H:i:s', $userreg);
    if(!$num)
    {
        echo "<script>alert('该用户不存在!');history.back();</script>";
        exit;
    }else{
        $infor_Array = mysqli_fetch_array($result,1);
    }
    
    if($userzt=="1"){
        
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
                                <h5>续费服务器</h5>
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
                        <p>续费说明</p>
                        <ul>
                            <li>为保持服务器正常运行，现开通续费套餐(用于服务器维护及管理费用！)</li>
                            <li>周卡续费：续费周期7天，成功后可获取2000创世结晶 作为奖励</li>
                            <li>月卡续费：续费周期30天，成功后可获取一个变态圣遗物 作为奖励</li>
                            <li>你的账号到期时间为：「<?php echo $uudqsj ?>」，请及时续费！</li>
                        </ul>
                    </div>
                            <div class="ibox-content">
                                <form name=alipayment action=epayapi.php method=post target="_blank">
                                    <input hidden type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30"><br>
                                    <?php
                                    if($userzt=='1'){
                                        echo "<button type='submit' name='gjxf' id='gjxf' class='btn btn-primary' value='getrand'> 权限续费(80元/30天)</button></a>";
                                    }else{
                                        echo "<button type='submit' name='ptxf' id='ptxf' class='btn btn-primary' value='getrand'> 权限续费(50元/7天)</button></a>";
                                    }
                                    ?>
                                </form>
<script src="./sweetalert.min.js"></script>
<script>swal('注意','由于服务器成本较高，为保持服务器正常运营，现开通续费功能，普通用户只支持7天续费，权限用户支持30天续费\r\n 7天续费价格：50元(送2000创世结晶)\r\n 30天续费价格：80元(送随机变态圣遗物)','success');</script>
<?php

if(isset($_GET['result'])){
    echo "<script src='./sweetalert2.all.min.js'></script>";
	$result = $_GET['result'];
	switch($result){
		case '1':
			echo "<script>
					Swal.fire({
					  title: '续费成功！',
					  icon: 'success',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'userxf.php';
					});
				  </script>";
			break;
		case '2':
			echo "<script>
					Swal.fire({
					  title: '续费失败！',
					  icon: 'error',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'userxf.php';
					});
				  </script>";
			break;
		default:
			break;
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
