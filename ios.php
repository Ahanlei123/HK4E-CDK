<?php  
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $gmbb="3.4剧情服";
    $username="游客";
    $_SESSION["UID1"] = @$_POST['UDI1'];
    $_SESSION["wpcdk"] = @$_POST['wpcdk'];

    $UID1= $_SESSION["UID1"] ;
    function isIOSDevice() {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $isIOS = (bool) preg_match('/\b(iPhone|iPod|iPad)\b/', $userAgent);
        return $isIOS;
    }
    if (isIOSDevice()) {
    
    } else {
        //echo "非苹果设备禁止访问！".$userAgent;
       
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>原神IOS下载</title>
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
                        <h5>IOS下载</h5>
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
                        <p>IOS下载</p>
                        <ul>
                            <li>使用前请务必保持IOS版本低于17.0</li>
                            <li>本工具仅供3.4剧情服服务器使用！</li>
                        </ul>
                        <a href="#">
                            <button class="btn btn-primary" > QQ交流群</button>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前账户：<a href="#" target="_blank">游客</a></p>
                        <p>CDK兑换：<a href="" target="_blank">IOS安装CDK功能</a></p>
                        <form action="" method="post">
                        <input type="text" class="form-control" name="wpcdk" id="wpcdk" placeholder="请输入您购买的CDK"/><span class="help-block m-b-none">请输入您购买的CDK</span></a>
                        <input type="text" class="form-control" name="U" id="U" placeholder="U"/><span class="help-block m-b-none">请输入</span></a>
                        <button type="submit" name="dhcdk" id="dhcdk" class="btn btn-primary"  value="getrand"> 开始安装</button>
                        <br/></a>
                        </font>
                        </form>
                    </div>
                </div>
<script src="./sweetalert.min.js"></script>

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

if(isset($_POST["dhcdk"]))
{
    include "./user/cus_check.php";
    $UID1 = $_POST['UID1'];
    $wpcdk = $_SESSION["wpcdk"];
    $sql = "select * from cdk_wp where cdk LIKE '$wpcdk'";
    $result = mysqli_query($root,$sql);
    $Am = mysqli_fetch_array($result);
    $wpid=$Am['wp'];
    $wpsl=$Am['sl'];
    if($wpcdk == ''){
        if(!isset($_SESSION['ios']) or !$_SESSION['ios']){
            //没有检测
        }else{
            echo "<script>location.href = 'iosxz.php';</script>";
            exit ;
        }
    }  
    if($wpid == 'IOS'){
        $_SESSION['IOS'] = 1;
        if($Am['zt'] == '0'){
            include "./user/cus_check.php";
            $_SESSION['ios'] = 1;
            $sql = "update cdk_wp set zt = 1 where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            echo "<script>location.href = 'iosxz.php';</script>";
            exit ;
        }else{
            echo "<script>swal('兑换失败','卡密错误或已被使用','error');</script>";
        }
    }elseif($wpid == ''){
        echo "<script>swal('兑换失败','卡密错误','error');</script>";
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
