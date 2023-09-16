<?php  session_start();?>
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
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function() {
			$('#searchBtn').on('click', function() {
				var cx = $('#cx').val();
				$.ajax({
					url: 'cxzx.php',
					type: 'POST',
					data: { cx: cx },
					success: function(data) {
						$('#resultTable').html(data);
					},
					error: function() {
						alert('发生了一个错误，请重试！');
					}
				});
			});
		});
	</script>
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
                                <h5>卡密查询</h5>
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
                                    <input type="text" name="cx" id="cx" class="form-control" placeholder="请输入需要查询的卡密"> <span class="help-block m-b-none">请输入需要查询的卡密/输入UID后可查询当前UID使用的全部卡密</span>
                                    <button type="submit" name="cxkm" id="cxkm" class="btn btn-primary" value="getrand"> 查询卡密</button>
                                </form>
                                
                                <button name="searchBtn" id="searchBtn" class="btn btn-primary" > 查询记录</button>
                                </a>
                                <br>
                                <div class="table-responsive">
                                    <div id="resultTable"></div>
                                </div>
                               

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
    if(isset($_POST["cxkm"])){
        $cdk=$_POST["cx"];
        $sql = "select * from cdk_wp where cdk LIKE '$cdk'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        $user = $Am['uid'];//查询用户名
        $cxkm = $Am['cdk'];
        $cxsc = $Am['sc'];
        if($user == ""){
            $user='未使用';
        }
        if($cxkm != ""){
            $cxnr= '卡密：'.$cxkm.'\r\n  生成人：'.$cxsc.'\r\n  使用UID：'.$user;
            echo"<script>swal('查询成功','$cxnr','success');</script>";
        }else{
            echo"<script>swal('查询失败','没有找到相关卡密！','error');</script>";
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
