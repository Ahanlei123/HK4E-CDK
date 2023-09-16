<?php include "./jc.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.33,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <title>会员登录-3.4剧情服</title>
        <meta http-equiv="Content-Language" content="zh-CN">
        <link rel="stylesheet" rev="stylesheet" href="css/fonts/iconfont.css" type="text/css" media="all">
        <link rel="stylesheet" rev="stylesheet" href="css/txcstx.css" type="text/css" media="all">
	    <script  src="./sweetalert2.all.min.js"></script>
        <style> body{color:#;}a{color:#;}a:hover{color:#;}.bg-black{background-color:#;}.tx-login-bg{background:url(img/bg.jpg) no-repeat 0 0;}</style>
        <style>
		.icp {
            /* position: absolute;
            bottom: 0px; */
            padding: 10px 0;
            width: 100%;
            height: 36px;
            text-align: center;
            color: gray;
            z-index: 1000;
        }
        .icp > a {
            color: gray;
            text-decoration: none;
        }
        .icp > a:hover {
            color: aqua;
            text-decoration: none;
        }
	</style>
    </head>
    <body class="tx-login-bg">
        <form class="m-t" role="form" action="login.php" method="post">
        <div class="tx-login-box">
            <div class="login-avatar bg-black"><i class="iconfont icon-wode"></i></div>
				<ul class="tx-form-li row">
					<li class="col-24 col-m-24"><p><input type="text" id="username" name="username" placeholder="Username" class="tx-input"><i>账号(*)</i></p></li>
					<li class="col-24 col-m-24"><p><input type="password" id="password" name="password" placeholder="Password" class="tx-input"><i>密码(*)</i></p></li>
					<li class="col-24 col-m-24"><p class="tx-input-full"><button type="submit" id="loginbtnPost" name="loginbtnPost" onclick="return Ytuser_Login()"  class="tx-btn tx-btn-big bg-black">登录</button></p></li>
					<li class="col-24 col-m-24"><p><p class="tx-input-full"><a href="cdkdh.php" class="tx-btn tx-btn-big bg-black">CDK兑换</a></p></li>
					<li class="col-12 col-m-12"><p><a href="gf.php" class="f-12 f-gray">新用户注册</a></p></li>
					<li class="col-12 col-m-12"><p class="ta-r"><a href="resetpwd.html" class="f-12 f-gray">忘记密码</a></p></li>
				</ul>
				
            </div>
            
            </form>
           
            	

    </body>
    
</html>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
<?php 
if(isset($_GET['result'])){
	$result = $_GET['result'];
	switch($result){
		case '1':
			echo "<script>
					Swal.fire({
					  title: '登录成功',
					  text: '超级权限登录成功！',
					  icon: 'success',
					  confirmButtonText: '好的'
					}).then((result) => {
						window.location.href = 'gf11.php';
					});
				  </script>";
			break;
		case '2':
			echo "<script>
					Swal.fire({
					  title: '登录成功',
					  text: '普通权限登录成功！',
					  icon: 'success',
					  confirmButtonText: '好的'
					}).then((result) => {
						window.location.href = 'ptgf11.php';
					});
				  </script>";
			break;
		case '3':
			echo "<script>Swal.fire('登录失败！', '请重新输入正确的账号密码。', 'error');</script>";
			break;
		case '4':
			echo "<script>Swal.fire('登录失败！', '请重新输入。', 'error');</script>";
			break;
		case '5':
			echo "<script>Swal.fire('登录失败！', '请先保持在线后再登录后台！', 'error');</script>";
			break;
		case '6':
			echo "<script>Swal.fire('登录失败！', '请先联系管理员绑定UID', 'error');</script>";
			break;
		case '7':
			echo "<script>
					Swal.fire({
					  title: '登录成功',
					  text: '超级管理员登录成功！',
					  icon: 'success',
					  confirmButtonText: '好的'
					}).then((result) => {
						window.location.href = '/user';
					});
				  </script>";
			break;
		default:
			break;
	}
} 
?>
</body>

</html>
