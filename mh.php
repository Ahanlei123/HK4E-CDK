<?php  session_start()?>
 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>原神3.4剧情服-盲盒系统</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <script  src="https://mihayou.fun/sweetalert2.all.min.js"></script>
</head>
<?php
error_reporting(E_ERROR | E_PARSE);

if(isset($_GET['uid'])) {
    $id = $_GET['uid'];
}

include "./user/cus_check.php";
$sql = "select * from user_information where username = '".$_SESSION['name']."'";
$result = mysqli_query($root,$sql); 
$num = mysqli_num_rows($result);
$Am = mysqli_fetch_array($result);
$qb = $Am['cjcs'];
$scr = $id;
$wzym = $_SERVER['HTTP_HOST'];
?>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>盲盒抽奖</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="table_basic.html#">选项1</a>
                                </li>
                                <li><a href="table_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <p>3.4剧情服盲盒说明</p>
                        <ul>
                            <li>盲盒奖品 一等奖:88888原石 二等奖:50000原石 三等奖:20000原石 四等奖:2888原石 五等奖:1888原石 六等奖:888原石</li>
                            <li>抽奖前请务必保证游戏在线否则将无法到账游戏！</li>
                        </ul>
                        <form action="epayapi.php" method="post">
                        <a>
                            <input hidden type="text" id="username" name="username"  value="<?php echo $scr?>" placeholder="请输入账号" maxlength="30">
                            <button class="btn btn-primary" name="cj" id="cj"> 点击抽奖(8.8元)</button>
                        </a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script src="js/demo/peity-demo.min.js"></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    
    <?php 
if(isset($_GET['result'])){
	$result = $_GET['result'];
	switch($result){
		case '1':
			echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：88888原石(游戏邮件内领取)', 'success');</script>";
			break;
		case '2':
			echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：50000原石(游戏邮件内领取)', 'success');</script>";
			break;
		case '3':
			echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：20000原石(游戏邮件内领取)', 'success');</script>";
			break;
		case '4':
			echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：2888原石(游戏邮件内领取)', 'success');</script>";
			break;
		case '5':
			echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：1888原石(游戏邮件内领取)', 'success');</script>";
			break;
		case '6':
			echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：888原石(游戏邮件内领取)', 'success');</script>";
			break;
		case '7':
			echo "<script>Swal.fire('购买失败！', '请先确认是否绑定输入UID！', 'error');</script>";
			break;
		default:
			break;
	}
} 
    
    
if(isset($_POST["cj"]))
{
    //$cjdz='http://'.$wzym.'/cj.php?user='.$scr;
    $result = file_get_contents($cjdz);
    if ($result == '1') {
        echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：88888原石(游戏邮件内领取)', 'success');</script>";
    } elseif ($result == '2') {
        echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：50000原石(游戏邮件内领取)', 'success');</script>";
    } elseif ($result == '3') {
        echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：20000原石(游戏邮件内领取)', 'success');</script>";
    } elseif ($result == '4') {
        echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：2888原石(游戏邮件内领取)', 'success');</script>";
    } elseif ($result == '5') {
        echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：1888原石(游戏邮件内领取)', 'success');</script>";
    } elseif ($result == '6') {
        echo "<script>Swal.fire('抽奖结果', '恭喜中奖了  奖品：888原石(游戏邮件内领取)', 'success');</script>";
    }  elseif ($result == '9') {
        echo "<script>Swal.fire('抽奖结果', '你的抽奖次数不足无法抽奖！', 'error');</script>";
    }
}
    

?>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>