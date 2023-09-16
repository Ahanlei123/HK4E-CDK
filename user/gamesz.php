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
                        <h5>卡池修改 <small>游戏卡池修改</small></h5>
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
  
		<form class="form-horizontal" method="post" action="save.php">
			<div class="ibox-content">
				<label class="col-sm-2 control-label">游戏卡池1(常驻角色813)：</label>
				<div class="col-sm-10">
					<select name="select1" class="form-control m-b">
						<?php
							// 连接数据库
							$conn = mysqli_connect('数据库地址', 'member', '数据库密码', 'member');
							if (!$conn) {
								die('连接数据库失败：' . mysqli_connect_error());
							}
							// 查询数据
							$sql = "SELECT name FROM game_kc";
							$result = mysqli_query($conn, $sql);
							// 动态生成下拉选项
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
							}
							mysqli_close($conn);
						?>
					</select>
				</div>
				<br>
				<label class="col-sm-2 control-label">游戏卡池2(活动角色823)：</label>
				<div class="col-sm-10">
					<select name="select2" class="form-control m-b">
						<?php
							// 连接数据库
							$conn = mysqli_connect('数据库地址', 'member', '数据库密码', 'member');
							if (!$conn) {
								die('连接数据库失败：' . mysqli_connect_error());
							}
							// 查询数据
							$sql = "SELECT name FROM game_kc";
							$result = mysqli_query($conn, $sql);
							// 动态生成下拉选项
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
							}
							mysqli_close($conn);
						?>
					</select>
				</div>
				<br>
				<label class="col-sm-2 control-label">游戏卡池3(活动角色833)：</label>
				<div class="col-sm-10">
					<select name="select3" class="form-control m-b">
						<?php
							// 连接数据库
							$conn = mysqli_connect('数据库地址', 'member', '数据库密码', 'member');
							if (!$conn) {
								die('连接数据库失败：' . mysqli_connect_error());
							}
							// 查询数据
							$sql = "SELECT name FROM game_kc";
							$result = mysqli_query($conn, $sql);
							// 动态生成下拉选项
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
							}
							mysqli_close($conn);
						?>
					</select>
				</div>
				<br>
				<label class="col-sm-2 control-label">游戏卡池4(祈愿武器843)：</label>
				<div class="col-sm-10">
					<select name="select4" class="form-control m-b">
						<?php
							// 连接数据库
							$conn = mysqli_connect('数据库地址', 'member', '数据库密码', 'member');
							if (!$conn) {
								die('连接数据库失败：' . mysqli_connect_error());
							}
							// 查询数据
							$sql = "SELECT name FROM game_kc";
							$result = mysqli_query($conn, $sql);
							// 动态生成下拉选项
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
							}
							mysqli_close($conn);
						?>
					</select>
				</div>
				<br>
				<label class="col-sm-2 control-label">游戏卡池5(定轨武器853)：</label>
				<div class="col-sm-10">
					<select name="select5" class="form-control m-b">
						<?php
							// 连接数据库
							$conn = mysqli_connect('数据库地址', 'member', '数据库密码', 'member');
							if (!$conn) {
								die('连接数据库失败：' . mysqli_connect_error());
							}
							// 查询数据
							$sql = "SELECT name FROM game_kc";
							$result = mysqli_query($conn, $sql);
							// 动态生成下拉选项
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
							}
							mysqli_close($conn);
						?>
					</select>
				</div>
				<br>
				<label class="col-sm-2 control-label">游戏卡池6(祈愿角色903)：</label>
				<div class="col-sm-10">
					<select name="select6" class="form-control m-b">
						<?php
							// 连接数据库
							$conn = mysqli_connect('数据库地址', 'member', '数据库密码', 'member');
							if (!$conn) {
								die('连接数据库失败：' . mysqli_connect_error());
							}
							// 查询数据
							$sql = "SELECT name FROM game_kc";
							$result = mysqli_query($conn, $sql);
							// 动态生成下拉选项
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
							}
							mysqli_close($conn);
						?>
					</select>
				</div>
				
			
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">保存卡池</button><br>
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