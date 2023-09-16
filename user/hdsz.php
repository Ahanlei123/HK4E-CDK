<?php  session_start()?>
<!DOCTYPE html>
<html>
<head>
	<title>下拉框读取数据库</title>
	<meta charset="utf-8">
	<!-- 引入 Bootstrap 样式 -->
	<link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">

</head>
<?php
//判断登录,此页面只有管理员登录才能登录
if(!isset($_SESSION['admin']) or !$_SESSION['admin'])
{
    echo "<script>alert('本页面只有管理员登录之后才能访问！');location.href='sign.php';</script>";
    exit;
}
?>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
    <div class="col-sm-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
                        <h5>活动设置 <small>游戏活动修改</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
  
		<form class="form-horizontal" method="post" action="savehd.php">
			<div class="ibox-content">
			    <div class="form-group">
				    <label class="col-sm-2 control-label">选择活动：</label>
				    <div class="col-sm-10">
					    <select name="select1" class="form-control m-b">
						    <?php
							    $conn = mysqli_connect('数据库地址', 'member', 'hdshJfMJxA7imSfi', 'member');
							    if (!$conn) {
							    	die('连接数据库失败：' . mysqli_connect_error());
							    }
							    $sql = "SELECT name FROM hd_id";
							    $result = mysqli_query($conn, $sql);
							    while ($row = mysqli_fetch_assoc($result)) {
							    	echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
							    }
							    mysqli_close($conn);
							    $kssj = date("Y-m-d H:i:s");
							    $jssj = date('Y-m-d H:i:s', strtotime('+7 days'));
						    ?>
					    </select>
				    </div>
				</div>
				<div class="form-group">
                    <label class="col-sm-2 control-label">开始时间：</label>
                    <div class="col-sm-10">
                        <input type="text" id="kssj" name="kssj" value="<?php echo $kssj; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">结束时间：</label>
                    <div class="col-sm-10">
                        <input type="text" id="jssj" name="jssj" value="<?php echo $jssj; ?>" class="form-control">
                    </div>
                </div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="xzhd" id="xzhd" class="btn btn-primary">新增活动</button>
					<button type="submit" name="gxhd" id="gxhd" class="btn btn-primary">更新活动</button>
				</div>
			</div>
		</form>
		</div>
		</div>
	</div>
	</div>
	</div>

	<script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
</body>
</html>