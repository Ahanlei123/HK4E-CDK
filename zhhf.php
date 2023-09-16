<?php  
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    include "./user/cus_check.php";
    $gmbb="3.4剧情服";
    $result = $sdk->query("SHOW TABLE STATUS LIKE 'hk4e_accounts'");
    // 获取查询结果中的AUTO_INCREMENT值
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $auto_increment = $row["Auto_increment"];
    }
    $_SESSION["gmdz"] = 'http://121.62.18.138:20011/api?uid=';
    $_SESSION["yjdz"] = 'http://121.62.18.138:20011/api?';
    $gmdz="http://121.62.18.138:20011/api?uid=";
    $yjdz="http://121.62.18.138:20011/api?";
    $username="游客";
    echo $_POST['UDI1'];
    $_SESSION["UID1"] = @$_POST['UDI1'];
    $_SESSION["wpcdk"] = @$_POST['wpcdk'];
    $UID1= $_SESSION["UID1"] ;
    $cmd1 = $gmdz1;
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+201+1";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $json = json_decode($re, true);
    $qbxsfl= $_SESSION['qbxsfl'];
    if(!isset($_SESSION['admin']) or !$_SESSION['admin'])
{
    echo "<script>alert('本页面只有管理员登录之后才能访问！');location.href='sign.php';</script>";
    exit;
}
    if ($qbxsfl != '') {
        foreach ($_SESSION['qbxsfl'] as $itemId => $itemQuantity) {
            //echo "等待发送道具: $itemId<br>";
            $re = file_get_contents($itemQuantity);
            $json = json_decode($re, true);
            if ($json['msg']=='succ') {
                unset($_SESSION['qbxsfl'][$itemId]);
            }elseif($json['msg']=='recv from nodeserver timeout'){
                break;
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>原神GM3.4剧情服平台 - 高级权限</title>
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
                        <h5>普通权限(<?php echo $gmbb ?>)</h5>
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
                        <p>3.4剧情服普通权限工具</p>
                        <ul>
                            <li>使用前请务必保持游戏处于在线状态，领取成功后返回游戏查看即可</li>
                            <li>本工具仅供3.4剧情服服务器使用！</li>
                            <li>检测到你的账号为「<?php echo $gmbb ?>」账号，请确保是否登录的「<?php echo $gmbb ?>」</li>
                            
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
                        <p class="m-t">当前账户：<a href="#" target="_blank">游客</a>
                        </p>
                        <p>账号恢复：<a href="" target="_blank">登录账号恢复</a>
                        </p>
                        <form action="zhhf.php" method="post">
                        <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
                        <input type="text" class="form-control" name="UID1" id="UID1" placeholder="请输入您的UID"/><span class="help-block m-b-none">请输入您的UID</span></a>
                        <input type="text" class="form-control" name="dlzh" id="dlzh" placeholder="请输入您登录游戏的账号"/><span class="help-block m-b-none">请输入您登录游戏的账号</span></a>
                        <button type="submit" name="xyhqzhf" id="xyhqzhf" class="btn btn-primary"  value="getrand"> 新用户恢复(只用输入账号即可)</button>
                        <br></a>
                        </font>
                        </form>
                    </div>
                </div>
                
<script src="./sweetalert.min.js"></script>
<script>swal('公告','如果你的账号登录上去是一个新号，可以使用此工具恢复你之前的账号数据  ','success');</script>
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




if(isset($_POST["xyhqzhf"]))
{
    include "./user/cus_check.php";
    $dlzh = $_POST['dlzh'];
    $result = $sdk->query("SHOW TABLE STATUS LIKE 'hk4e_accounts'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $auto_increment = $row["Auto_increment"];
    } else {
        echo "<script>swal('恢复失败','没有找到Auto_increment的数据！','error');</script>";
        exit;
    }
    $sql = "select * from hk4e_accounts where username = '".$dlzh."'";
    $result = mysqli_query($sdk1,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $xyhdlzhid=$Am['id'];
    
    
    $sql = "select * from hk4e_accounts where username = '".$dlzh."'";
    $result = mysqli_query($sdk,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $dlzhid=$Am['id'];
    $email=$dlzh.'@a.com';
    if($dlzh==""){
        echo "<script>swal('恢复失败','请输入正确的登录账号！','error');</script>";
        exit;
    }
    if($dlzhid!=""){
        $sql = "DELETE FROM hk4e_accounts WHERE id = $dlzhid";
        if ($sdk->query($sql) === TRUE) {
            
        } else {
            echo "<script>swal('恢复失败','强制恢复失败，请联系管理员！','error');</script>";
            exit;
        }
    }
    $sql = "INSERT INTO `hk4e_accounts` (`id`, `email`, `username`, `password`, `login_token`, `combo_token`, `device`, `is_guest`, `created_at`, `updated_at`, `deleted_at`) " .
       "VALUES ('$xyhdlzhid', '$email', '$dlzh', NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL)";
    $result = mysqli_query($sdk,$sql);
    $auto_increment=$auto_increment+1;
    $sdk->query("ALTER TABLE hk4e_accounts AUTO_INCREMENT = $auto_increment");
    $rows_affected = $sdk->affected_rows;
    echo "<script>swal('恢复成功','你的账号以为你恢复成功！','success');</script>";
    
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
