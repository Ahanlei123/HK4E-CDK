<?php  
    include ("./conn.php");
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    include "./cus_check.php";
    $ycuid = $_GET['ycuid'];
    $gmbb="3.4剧情服";
    $_SESSION["gmdz"] = 'http://121.62.18.138:20011/api?uid=';
    $gmdz1="http://121.62.18.138:20011/api?uid=";
    $user=@$_POST['$username'];
    $username=@$_POST['$username'];
    $sql4 = "SELECT * FROM shop_syw ";
    $result4 = $syw->query($sql4);
    if ($result4->num_rows > 0) {
        while($row = $result4->fetch_assoc()) {
        $id_array2[] = $row['jg'];
        $name_array2[] = $row['name'];
        }
    }
    if($ycuid==""){
        $_SESSION["UID1"] = @$_POST['$username'];
        $UID1 = @$_POST['$username'];
    }else{
        $_SESSION["UID1"] = $ycuid;
        $UID1 = $ycuid;
    }
    $_SESSION["wpid"] = @$_POST['put'];
    $_SESSION["wpsl"] = @$_POST['wpsl'];
    $_SESSION["jsid"] = @$_POST['put2'];
    $_SESSION["jssl"] = @$_POST['syw'];
    $_SESSION["wqid"] = @$_POST['put3'];
    $_SESSION["wqsl"] = @$_POST['wqsl'];
    $_SESSION["wqtp"] = @$_POST['wqtp'];
    $_SESSION["wqjl"] = @$_POST['wqjl'];
    $_SESSION["rwid"] = @$_POST['put4'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>3.4剧情服GM平台 - 高级权限</title>
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
                        <h5>超级权限(<?php echo $gmbb ?>)</h5>
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
                        <p>3.4剧情服超级权限工具</p>
                        <ul>
                            <li>使用前请务必保持游戏处于在线状态，领取成功后返回游戏查看即可</li>
                            <li>本工具仅供3.4剧情服服务器使用！</li>
                            <li>当前平台仅供管理员使用，变态圣遗物及极品圣遗物为邮件发送！</li>
                        </ul>
                        <form name=alipayment action=epayapi.php method=post target="_blank">
                        <a>
                            <input hidden type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
                        </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>变态圣遗物：<a href="" target="_blank"></a>
                        </p>
                        <?php
                        echo '<form name=alipayment action=dailiapi.php method=post >
	                    <input hidden type="text" id="username" name="username"  value="'.$UID1.'" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="btsyw1" id="btsyw1" class="btn btn-primary"  value="getrand"> 233333攻/233333防/100%暴击/350%爆伤</button>
	                    <button type="submit" name="btsyw2" id="btsyw2" class="btn btn-primary"  value="getrand"> 30%移动速度</button>
	                    <button type="submit" name="btsyw3" id="btsyw3" class="btn btn-primary"  value="getrand"> 50%冷却缩减</button>
	                    <button type="submit" name="btsyw4" id="btsyw4" class="btn btn-primary"  value="getrand"> 80%伤害增加</button>
	                    <button type="submit" name="btsyw5" id="btsyw5" class="btn btn-primary"  value="getrand"> 80%治疗加成</button>
	                    <button type="submit" name="btsyw6" id="btsyw6" class="btn btn-primary"  value="getrand"> 80%暴击伤害</button>
	                    <button type="submit" name="btsyw7" id="btsyw7" class="btn btn-primary"  value="getrand"> 80%伤害减免</button>
	                    <button type="submit" name="btsyw8" id="btsyw8" class="btn btn-primary"  value="getrand"> 80%物理抗性</button>
	                    <button type="submit" name="btsyw9" id="btsyw9" class="btn btn-primary"  value="getrand"> 80%暴击率</button>
	                    <br></a>
                        </font>
                        </form>';
                        ?>
                    </div>
                </div>
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>小极品圣遗物：<a href="" target="_blank"></a>
                        </p>
                        <form name=alipayment action=dailiapi.php method=post>
                        <input hidden type="text" id="username" name="username"  value="<?php echo $UID1?>" placeholder="请输入账号" maxlength="30">
                        <?php
	                    $num_of_buttons = count($name_array2);
                        for ($i = 0; $i < $num_of_buttons; $i++) {
                            $button_title = $name_array2[$i];
                            $button_zl = $id_array2[$i];
                            echo '<button type="submit" name="xjpsyw" id="xjpsyw'.$i.'" class="btn btn-primary"  value="'.$button_title.'">'.$button_title.' </button> ' ;
                        }
	                    echo '<br></a>
                        </font>
                        </form>';
                        ?>
                    </div>
                </div>
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>常用功能：<a href="" target="_blank">基础常用功能</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="swys" id="swys" class="btn btn-primary"  value="getrand"> 十万原石</button>
	                    <button type="submit" name="swjc" id="swjc" class="btn btn-primary"  value="getrand"> 十万纠缠</button>
	                    <button type="submit" name="swxy" id="swxy" class="btn btn-primary"  value="getrand"> 十万相遇</button>
	                    <button type="submit" name="bwml" id="bwml" class="btn btn-primary"  value="getrand"> 百万摩拉</button>
	                    <button type="submit" name="qbjs" id="qbjs" class="btn btn-primary"  value="getrand"> 全部角色</button>
	                    <button type="submit" name="qbwq" id="qbwq" class="btn btn-primary"  value="getrand"> 全部武器</button>
	                    <button type="submit" name="tl" id="tl" class="btn btn-primary"  value="getrand"> 无限体力(开)</button>
	                    <button type="submit" name="tll" id="tll" class="btn btn-primary"  value="getrand"> 无限体力(关)</button>
	                    <button type="submit" name="wxbf" id="wxbf" class="btn btn-primary"  value="getrand"> 无限爆发</button>
	                    <button type="submit" name="jsmj" id="jsmj" class="btn btn-primary"  value="getrand"> 角色满级</button>
	                    <button type="submit" name="jsmm" id="jsmm" class="btn btn-primary"  value="getrand"> 角色满命</button>
	                    <button type="submit" name="jsjn" id="jsjn" class="btn btn-primary"  value="getrand"> 角色技能</button>
	                    <button type="submit" name="kqwd" id="kqwd" class="btn btn-primary"  value="getrand"> 开启无敌</button>
	                    <button type="submit" name="swyl" id="swyl" class="btn btn-primary"  value="getrand"> 十万阅历</button>
	                    <br></a>
                        </font>
                        
                    </div>
                </div>
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>获取物品/角色：<a href="" target="_blank">如果部分物品刷了不到账请少设置两个试一下</a>
                        </p>
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <input type="text" class="form-control" name="put" id="put" placeholder="请输入物品名称(模糊输入就可以了)"/><span class="help-block m-b-none">请输入物品ID</span></a>
                                <span hidden class="col-xs" name="content" id="content"></span>
                            </div>
                            <div class="list col-sm">
                                </a><ul id="ul-list"></ul>
                            </div></a>
                            <div class="form-group">
                                <input type="text" class="form-control" name="wpsl" id="wpsl" placeholder="请输入需要刷取的数量"/> <span class="help-block m-b-none">请输入物品数量</span></a>
                            </div>
                          
	                    <br></a>
	                    <button type="submit" name="hqwp" id="hqwp" class="btn btn-primary"  value="getrand"> 获取物品</button>
                        </font>
                    </div>
                </div>
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>获取圣遗物：<a href="" target="_blank">圣遗物等级请不要设置0，会卡存档</a>
                        </p>
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <input type="text" class="form-control" name="put2" id="put2" placeholder="请输入圣遗物名称(模糊输入就可以了)"/><span class="help-block m-b-none">请输入圣遗物ID</span></a>
                                <span hidden class="col-xs" name="content2" id="content2"></span>
                            </div>
                            <div class="list col-sm">
                                </a><ul id="ul-list2"></ul>
                            </div></a>
                            <div class="form-group">
                                <input type="text" class="form-control" name="syw" id="syw" placeholder="请输入需要刷取的圣遗物等级，不要设置0"/> <span class="help-block m-b-none">请输入圣遗物等级，请不要设置0</span></a>
                            </div>
                            
	                    <br></a>
	                    <button type="submit" name="hqjs" id="hqjs" class="btn btn-primary"  value="getrand"> 获取圣遗物</button></a>
	                    
                    </div>
                </div>
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>获取武器：<a href="" target="_blank">武器等级请不要设置0，会卡存档</a>
                        </p>
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <input type="text" class="form-control" name="put3" id="put3" placeholder="请输入武器名称(模糊输入就可以了)"/><span class="help-block m-b-none">请输入武器ID</span></a>
                                <span hidden class="col-xs" name="content3" id="content3"></span>
                            </div>
                            <div class="list col-sm">
                                </a><ul id="ul-list3"></ul>
                            </div></a>
                            <div class="form-group">
                                <input type="text" class="form-control" name="wqsl" id="wqsl" placeholder="请输入需要刷取的武器等级，不要设置0"/> <span class="help-block m-b-none">请输入武器等级，请不要设置0</span></a>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="wqtp" id="wqtp" placeholder="请输入需要刷取的武器突破等级，不要设置0"/> <span class="help-block m-b-none">请输入武器突破等级，请不要设置0</span></a>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="wqjl" id="wqjl" placeholder="请输入需要刷取的武器精炼等级，不要设置0"/> <span class="help-block m-b-none">请输入武器精炼等级，请不要设置0</span></a>
                            </div>
                            
	                    <br></a>
	                    <button type="submit" name="hqwq" id="hqwq" class="btn btn-primary"  value="getrand"> 获取武器</button>
                        </font>
                    </div>
                </div>
                
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>任务管理：<a href="" target="_blank">如果出现卡任务，可以用这个完成一次任务，即可跳过</a>
                        </p>
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <input type="text" class="form-control" name="put4" id="put4" placeholder="请输入请输入任务名称(模糊输入就可以了)"/><span class="help-block m-b-none">请输入任务ID</span></a>
                                <span hidden class="col-xs" name="content4" id="content4"></span>
                            </div>
                            <div class="list col-sm">
                                </a><ul id="ul-list4"></ul>
                            </div></a>
	                    <br></a>
	                    <button type="submit" name="tjrw" id="tjrw" class="btn btn-primary"  value="getrand"> 添加任务</button>
	                    <button type="submit" name="jsrw" id="jsrw" class="btn btn-primary"  value="getrand"> 接受任务</button>
	                    <button type="submit" name="wcrw" id="wcrw" class="btn btn-primary"  value="getrand"> 完成任务</button>
                        </font>
                    </div>
                </div>
                
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>高危功能：<a href="" target="_blank">高危功能谨慎操作！</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="qkbb" id="qkbb" class="btn btn-primary"  value="getrand"> 清空背包</button>
	                    <button type="submit" name="jsdt" id="jsdt" class="btn btn-primary"  value="getrand"> 解锁地图</button>
	                    <button type="submit" name="qxhq" id="qxhq" class="btn btn-primary"  value="getrand"> 取消红圈</button>
	                    <button type="submit" name="czzh" id="czzh" class="btn btn-primary"  value="getrand"> 重置账号(谨慎使用！！！)</button>
	                    <br></a>
                        </font>
                        
                    </div>
                </div>
                
<script src="./sweetalert.min.js"></script>
<?php
if(isset($_GET['result'])){
    echo "<script src='./sweetalert2.all.min.js'></script>";
	$result = $_GET['result'];
	switch($result){
		case '1':
			echo "<script>Swal.fire('发送成功！', '请前往邮件查看', 'success');</script>";
			break;
		case '2':
			echo "<script>
					Swal.fire({
					  title: '发送失败！',
					  icon: 'error',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'gf11.php';
					});
				  </script>";
			break;
		case '3':
			echo "<script>Swal.fire('登录失败！', '请重新输入账号密码。', 'error');</script>";
			break;
		case '4':
			echo "<script>Swal.fire('登录失败！', '请重新输入。', 'error');</script>";
			break;
		case '5':
			echo "<script>
					Swal.fire({
					  title: '购买失败！',
					  text: '你并未开通永久套餐',
					  icon: 'error',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'gf11.php';
					});
				  </script>";
			break;
		case '6':
			echo "<script>
					Swal.fire({
					  title: '购买成功！',
					  text: '请联系管理员创建游戏账号QQ1548673260',
					  icon: 'success',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'gf11.php';
					});
				  </script>";
			break;
		case '7':
			echo "<script>
					Swal.fire({
					  title: '购买成功！',
					  text: '3.6权限开通成功，请下载群文件3.6安装包安装',
					  icon: 'success',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'zlf.php';
					});
				  </script>";
			break;
		case '8':
			echo "<script>Swal.fire('发送失败！', '邮件已发送，请勿重复发送！', 'error');</script>";
		case '9':
			echo "<script>Swal.fire('发送失败！', '邮件发送异常，请联系管理员处理！', 'error');</script>";
		default:
			break;
	}
} 


//重新注册游戏账号
if(isset($_POST["cxzcyx"])){
include "./user/cus_check.php";
$user=$_SESSION['name'];
$sql = "SELECT account_uid FROM t_player_uid WHERE uid = '$UID1'";
$result = mysqli_query($mysql_conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $manager = new MongoDB\Driver\Manager('mongodb://root:vSfNv8mqcspnERzT@数据库地址:27017');
        $bulk = new MongoDB\Driver\BulkWrite;
        $ppuid =$row["account_uid"];
        $bulk->insert(['_id'=>(string)(intval($ppuid)),'username'=>$user,'reservedPlayerId'=>(intval($ppuid)),'permissions'=>['0'=>''],'locale'=>'zh_CN']);
        $manager->executeBulkWrite('grasscutter.accounts', $bulk); 
        echo "<script>Swal.fire('重新匹配数据成功', '$ppuid', 'error');</script>";
    }
} else {
    echo "<script>Swal.fire('没有查询到UID', '$ppuid', 'error');</script>";
}
} 


if(isset($_POST["tll"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=stamina+infinite+off";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('以关闭无限体力！','','success');</script>";
}

if(isset($_POST["qxhq"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=quest+finish+35001";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('以取消地图红圈限制','','success');</script>";
}


if(isset($_POST["hqwq"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $xj = 1;
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=equip+add+".$_SESSION["wqid"]."+".$_SESSION["wqsl"]."+".$_SESSION["wqtp"]."+".$_SESSION["wqjl"];
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('武器获取成功！','','success');</script>";
}


if(isset($_POST["tl"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=stamina+infinite+on";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('以开启无限体力！','','success');</script>";
}

if(isset($_POST["wxbf"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=energy+infinite+on";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('以开启无限元素爆发-Q技能！','','success');</script>";
}

if(isset($_POST["qbjs"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+avatar+all";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('以成功获取全部角色!','','success');</script>";
}

if(isset($_POST["qbwq"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+weapon+all";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('以成功获取全部武器!','','success');</script>";
}

if(isset($_POST["qbwp"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+avatar+all";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('以成功获取全部物品!','','success');</script>";
}

if(isset($_POST["czzh"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=clear+all";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('重置账号成功！','','success');</script>";
}

if(isset($_POST["jsdt"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=quest+finish+30302";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30303";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30304";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30305";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30306";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30307";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30308";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30309";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30310";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30311";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30312";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30313";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30314";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30315";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30316";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30317";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30318";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30319";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30320";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30321";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30322";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30323";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30324";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30325";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30326";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+30327";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=point+3+all";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=point+5+all";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=point+6+all";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('解锁地图+瞄点成功','','success');</script>";
}


if(isset($_POST["jsmm"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=talent+unlock+all";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('当前选中角色满命成功','','success');</script>";
}

if(isset($_POST["jsjn"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=skill+1+10";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=skill+2+10";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=skill+3+10";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('当前选中角色技能满级成功','','success');</script>";
}


if(isset($_POST["qkbb"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+clear";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('清空背包成功','','success');</script>";
}

if(isset($_POST["wcrw"]))
{

    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=quest+finish+".$_SESSION["rwid"];
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('当前任务以完成！','','success');</script>";
}

if(isset($_POST["tjrw"]))
{

    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $clrwid = $_SESSION["rwid"];
    $cmd = "&msg=quest+add+".$clrwid;
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('添加任务成功！','','success');</script>";
}

if(isset($_POST["jsrw"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $clrwid = $_SESSION["rwid"];
    $cmd = "&msg=quest+accept+".$clrwid;
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('接受任务成功！','','success');</script>";
}



if(isset($_POST["hqjs"]))
{
    $main=new config8();
    call_user_func([$main,"hqjs"]);
}
class config8
{
    public function hqjs()
    {
        $UID1 = $_SESSION["UID1"];
        $cmd1 = $_SESSION["gmdz"];
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=equip+add+".$_SESSION["jsid"]."+".$_SESSION["jssl"];
        if($_SESSION["jsid"]=="23334"){
        $cmd = "&msg=equip+add+23341".$_SESSION["jssl"];
        }
        if($_SESSION["jsid"]=="23335"){
        $cmd = "&msg=equip+add+23341".$_SESSION["jssl"];
        }
        if($_SESSION["jsid"]=="23336"){
        $cmd = "&msg=equip+add+23341".$_SESSION["jssl"];
        }
        if($_SESSION["jsid"]=="23337"){
        $cmd = "&msg=equip+add+23341".$_SESSION["jssl"];
        }
        if($_SESSION["jsid"]=="23338"){
        $cmd = "&msg=equip+add+23341".$_SESSION["jssl"];
        }
        if($_SESSION["jsid"]=="23339"){
        $cmd = "&msg=equip+add+23341".$_SESSION["jssl"];
        }
        if($_SESSION["jsid"]=="23340"){
        $cmd = "&msg=equip+add+23341".$_SESSION["jssl"];
        }
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        echo "<script>swal('圣遗物获取成功！','','success');</script>";
    }
}

if(isset($_POST["hqwp"]))
{
    $main=new config7();
    call_user_func([$main,"hqwp"]);
}
class config7
{
    public function hqwp()
    {
        $UID1 = $_SESSION["UID1"];
        $cmd1 = $_SESSION["gmdz"];
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=item+add+".$_SESSION["wpid"]."+".$_SESSION["wpsl"];
        if($_SESSION["wpid"]=="23334"){
        $cmd = "&msg=equip+add+23341".$_SESSION["wpid"];
        }
        if($_SESSION["wpid"]=="23335"){
        $cmd = "&msg=equip+add+23341".$_SESSION["wpid"];
        }
        if($_SESSION["wpid"]=="23336"){
        $cmd = "&msg=equip+add+23341";
        }
        if($_SESSION["wpid"]=="23337"){
        $cmd = "&msg=equip+add+23341";
        }
        if($_SESSION["wpid"]=="23338"){
        $cmd = "&msg=equip+add+23341";
        }
        if($_SESSION["wpid"]=="23339"){
        $cmd = "&msg=equip+add+23341";
        }
        if($_SESSION["wpid"]=="23340"){
        $cmd = "&msg=equip+add+23341";
        }
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        echo "<script>swal('物品获取成功','','success');</script>";
    }
}


if(isset($_POST["swys"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+201+100000";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('十万原石获取成功！','','success');</script>";
}
    
if(isset($_POST["swjc"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+223+100000";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('十万纠缠获取成功！','','success');;</script>";
}

if(isset($_POST["swxy"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+224+100000";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('十万相遇获取成功！','','success');;</script>";
}

if(isset($_POST["bwml"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+202+1000000";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('百万摩拉获取成功！','','success');</script>";
}

if(isset($_POST["jsmj"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=break+6";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=level+90";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('当前游戏内选中的角色已满级！','','success');;</script>";
}

if(isset($_POST["kqwd"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=wudi+global+avatar+on";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('当前角色已开启无敌状态！','','success');;</script>";
}

if(isset($_POST["swyl"]))
{
    $UID1 = $_SESSION["UID1"];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+102+100000";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('十万阅历获取成功！','','success');;</script>";
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
    <script src="js/plugins/toastr/toastr.min.js"></script>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/layer/layer.min.js"></script>
    <script src="js/hplus.min.js?v=4.1.0"></script>
    <script type="text/javascript" src="js/contabs.min.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/search.js"></script>
</body>


</html>
