<?php  
    include ("./user/conn.php");
    error_reporting(E_ERROR | E_PARSE);
    include "./user/cus_check.php";
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $userzt=$Am['zt'];
    $gmbb=$Am['gmbb'];
    $daili=$Am['daili'];
    $userid=$Am['id'];
    $reg=$Am['regDate'];
    $UID1 = $Am['age'];
    $zlf = $Am['zlf'];
    $dqrw=$Am['dqrw'];
    //$UID1 = '10001';
    $userreg=$Am['userreg'];
    $token = 'Admin32890..';
    $sql3 = "SELECT * FROM game_rwsx WHERE hzrw='$dqrw'";
    $result3 = mysqli_query($root,$sql3);
    $num3 = mysqli_num_rows($result3);
    $Am3 = mysqli_fetch_array($result3);
    $rwname = $Am3['name'];
    $sql4 = "SELECT * FROM game_rw WHERE name LIKE '%$rwname%'";
    $result4 = $root->query($sql4);
    if ($result4->num_rows > 0) {
        while($row = $result4->fetch_assoc()) {
        $id_array[] = $row['uuid'];
        $name_array[] = $row['name'];
    }
    }
    
    if($userzt=="1"){
        $userzt="正常";
        $jrsj = time();
        if($userreg == ""){
            include "./user/cus_check.php";
            $dqsj = strtotime("+30 days");
            $sql3 = "update user_information set userreg = '$dqsj' where username = '".$_SESSION['name']."'";
            $result3 = mysqli_query($root,$sql3);
            $uudqsj = date('Y-m-d H:i:s', $userreg);
        }elseif($userreg <= $jrsj){
            $userzt="到期";
            echo "<script>alert('该用户以到期，请及时续费! 续费后可领取一个随机变态圣遗物！');location.href = './userxf.php';</script>";
            exit;
        }else{
            $uudqsj = date('Y-m-d H:i:s', $userreg);
        }
    }elseif($userzt==''){
        $userzt="未开通";
        echo "<script>alert('当前用户未开通权限!');location.href = './ptgf11.php';</script>";
        exit;
    }elseif($userzt=='3'){
        $userzt="封号";
        echo "<script>alert('该用户以被封号!');history.back();</script>";
        exit;
    }
    if($zlf==''){
        $gmbb="未开通";
        echo "<script>alert('当前用户未开通权限，请先开通！');</script>";
    }else{
        $gmbb="3.6剧情修复";
        $_SESSION["gmdz"] = 'https://ys36.mihayou.fun/opencommand/api';
        $gmdz1="https://ys36.mihayou.fun/opencommand/api";
    }
    
    if($UID1==''){
        echo "<script>alert('当前用户未绑定UID请先绑定！');location.href = './user/zlfuid.php';</script>";
        exit;
    }
    
    if(!$num)
    {
        echo "<script>alert('该用户不存在!');history.back();</script>";
        exit;
    }else{
    $user=$_SESSION['name'];
    $username=$_SESSION['name'];
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $UID1 = $Am['age'];
    //$UID1 = '10001';
    $_SESSION["UID1"] = $UID1;
    $_SESSION["wpid"] = @$_POST['put'];
    $_SESSION["wpsl"] = @$_POST['wpsl'];
    $_SESSION["jsid"] = @$_POST['put2'];
    $_SESSION["jssl"] = @$_POST['syw'];
    $_SESSION["wqid"] = @$_POST['put3'];
    $_SESSION["wqsl"] = @$_POST['wqsl'];
    $_SESSION["wqtp"] = @$_POST['wqtp'];
    $_SESSION["rwid"] = @$_POST['put4'];
    }
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
                            <li>检测到你的账号为「<?php echo $gmbb ?>」账号，请确保是否登录的「<?php echo $gmbb ?>」</li>
                            <li>由于服务器成本较高，为了服务器长久运行，现设置服务器维护费用，你账号距离到期时间「<?php 
                            if ($userreg=='3000000000') {
                                echo '永久套餐」，无需续费！(可免费获取变态圣遗物)';
                            }else{
                                echo $uudqsj.'」到期后只需「8元」进行续费30天！(完成续费后可获得随机变态圣遗物)';
                            }?></li>
                        </ul>
                        <a href="./userxf.php">
                            <button class="btn btn-primary" > 续费账号</button>
                        </a>
                        <a href="https://jq.qq.com/?_wv=1027&k=1gBd1ebS">
                            <button class="btn btn-primary" > QQ交流群</button>
                        </a>
                        <a href="#">
                            <button class="btn btn-primary" > 代理提卡</button>
                        </a>
                        <a href="./yqhy.php">
                            <button class="btn btn-primary" > 邀请送现金</button>
                        </a>
                        <form name=alipayment action=epayapi.php method=post target="_blank">
                        <a>
                            <input hidden type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
                            <?php 
                            if ($zlf=='') {
                                echo '<button class="btn btn-primary" name="ktzlfqx" id="ktzlfqx"> 开通权限(有剧情有任务有BUG/价格16.6元)</button>
                                </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>';
                                exit;
                            }?>

                            <button class="btn btn-primary" name="ktyj" id="ktyj"> 永久套餐(180元/活动价160,支持免费无限刷变态圣遗物)</button>
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
                        <p>常用功能：<a href="" target="_blank">基础常用功能</a>
                        </p>
                        <form action="" method="post" class="form-horizontal">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="swys" id="swys" class="btn btn-primary"  value="getrand"> 十万原石</button>
	                    <button type="submit" name="swjc" id="swjc" class="btn btn-primary"  value="getrand"> 十万纠缠</button>
	                    <button type="submit" name="swxy" id="swxy" class="btn btn-primary"  value="getrand"> 十万相遇</button>
	                    <button type="submit" name="bwml" id="bwml" class="btn btn-primary"  value="getrand"> 百万摩拉</button>
	                    <button type="submit" name="qbjs" id="qbjs" class="btn btn-primary"  value="getrand"> 全部角色</button>
	                    <button type="submit" name="qbwp" id="qbwp" class="btn btn-primary"  value="getrand"> 全部物品</button>
	                    <button type="submit" name="tl" id="tl" class="btn btn-primary"  value="getrand"> 无限体力</button>
	                    <button type="submit" name="wxbf" id="wxbf" class="btn btn-primary"  value="getrand"> 无限爆发</button>
	                    <button type="submit" name="jsmj" id="jsmj" class="btn btn-primary"  value="getrand"> 角色满级</button>
	                    <button type="submit" name="jsmm" id="jsmm" class="btn btn-primary"  value="getrand"> 角色满命</button>
	                    <button type="submit" name="jsjn" id="jsjn" class="btn btn-primary"  value="getrand"> 角色技能</button>
	                    <button type="submit" name="kqwd" id="kqwd" class="btn btn-primary"  value="getrand"> 开启无敌</button>
	                    <button type="submit" name="swyl" id="swyl" class="btn btn-primary"  value="getrand"> 十万阅历</button>
	                    <button type="submit" name="jszt" id="jszt" class="btn btn-primary"  value="getrand"> 解锁状态</button>
	                    <button type="submit" name="jsdt" id="jsdt" class="btn btn-primary"  value="getrand"> 解锁地图</button>
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
                                <input type="text" class="form-control" name="wqtp" id="wqtp" placeholder="请输入需要刷取的武器精练等级，不要设置0"/> <span class="help-block m-b-none">请输入精练等级，请不要设置0</span></a>
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
                        <p>任务管理：<a href="" target="_blank">如果出现卡任务，可以用这个完成一次任务，即可跳过(没有卡就别使用这个功能，否则造成一切后果不负责)</a>
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
	                    <button type="submit" name="wcrw" id="wcrw" class="btn btn-primary"  value="getrand"> 完成任务</button>
	                    <button type="submit" name="tjrw" id="tjrw" class="btn btn-primary"  value="getrand"> 添加任务</button>
	                    <?php 
                            if ($dqrw=='') {
                                echo '<button type="submit" name="jhrw" id="jhrw" class="btn btn-primary"  value="getrand"> 激活任务</button>';
                            }else{
                                echo '<br></a>
                                <button type="submit" name="srw" id="srw" class="btn btn-primary"  value="getrand"> 上一个任务</button>
                                <button type="submit" name="xrw" id="xrw" class="btn btn-primary"  value="getrand"> 下一个任务</button>
                                <br></a>
                                ';
                                $num_of_buttons = count($name_array);
                                for ($i = 0; $i < $num_of_buttons; $i++) {
                                    $button_title = $name_array[$i];
                                    echo '<button type="submit" name="xxrw" id="jhrw'.$i.'" class="btn btn-primary"  value="'.$i.'"> '.$button_title.'</button>
                                    ' ;
                                }
                            }
                        ?><br></a>
                        
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
	                    <button type="submit" name="czzh" id="czzh" class="btn btn-primary"  value="getrand"> 重置账号(谨慎使用！！！买的圣遗物重置了没办法补发)</button>
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
			echo "<script>
					Swal.fire({
					  title: '购买成功！',
					  icon: 'success',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'gf11.php';
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
					  text: '请联系管理员创建游戏账号',
					  icon: 'success',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'gf11.php';
					});
				  </script>";
			break;
		default:
			break;
	}
} 


//重新注册游戏账号
if(isset($_POST["cxzcyx"])){
include "./user/cus_check.php";

$user=$_SESSION['name'];
//查询MySQL数据库中account_uid字段等于$user的记录
$sql = "SELECT account_uid FROM t_player_uid WHERE uid = '$UID1'";
$result = mysqli_query($mysql_conn, $sql);
//如果查询结果不为空，则遍历结果集并将数据插入到MongoDB数据库
if (mysqli_num_rows($result) > 0) {
    //连接MongoDB数据库
    
    //遍历MySQL查询结果集
    while ($row = mysqli_fetch_assoc($result)) {
        //将数据插入到MongoDB数据库
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


if(isset($_POST["jszt"]))
{
    
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'unlockall @'.$_SESSION["UID1"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('全部状态解锁成功！','','success');</script>";
    } else {
        echo "<script>swal('全部状态解锁失败！','','error');</script>";
    }
    
}


if(isset($_POST["tll"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'prop ns on @'.$_SESSION["UID1"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('无限体力开启成功！','','success');</script>";
    } else {
        echo "<script>swal('无限体力开启失败！','','error');</script>";
    }
}


if(isset($_POST["hqwq"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'give @'.$_SESSION["UID1"].' '.$_SESSION["wqid"].' x1 lv'.$_SESSION["wqsl"].' r'.$_SESSION["wqtp"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('武器获取成功！','','success');</script>";
    } else {
        echo "<script>swal('武器获取失败！','','error');</script>";
    }

}


if(isset($_POST["tl"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'prop ns on @'.$_SESSION["UID1"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('无限体力开启成功！','','success');</script>";
    } else {
        echo "<script>swal('无限体力开启失败！','','error');</script>";
    }
}

if(isset($_POST["wxbf"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'prop ue on @'.$_SESSION["UID1"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('无限元素爆发-Q技能开启成功！','','success');</script>";
    } else {
        echo "<script>swal('无限元素爆发-Q技能开启失败！','','error');</script>";
    }

}
if(isset($_POST["qbjs"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'give avatars @'.$_SESSION["UID1"].' lv90 c6 sl10'
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('全部角色获取成功！','','success');</script>";
    } else {
        echo "<script>swal('全部角色获取失败！','','error');</script>";
    }
}

if(isset($_POST["qbwp"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'give all x9999 lv90 c6 r5 sl10 @'.$_SESSION["UID1"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('全部物品获取成功！','','success');</script>";
    } else {
        echo "<script>swal('全部物品获取失败！','','error');</script>";
    }
}

if(isset($_POST["czzh"]))
{
    echo "<script>swal('无法使用此功能！','','error');;</script>";
}

if(isset($_POST["jsdt"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'prop unlockmap 1 @'.$_SESSION["UID1"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('地图解锁成功！','','success');</script>";
    } else {
        echo "<script>swal('地图解锁失败！','','error');</script>";
    }
}


if(isset($_POST["jsmm"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'setConst @'.$_SESSION["UID1"].' 6'
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('当前选中角色满命成功！','','success');</script>";
    } else {
        echo "<script>swal('当前选中角色满命失败！','','error');</script>";
    }
}

if(isset($_POST["jsjn"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'talent @'.$_SESSION["UID1"].' all 10'
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('当前选中角色技能满级成功！','','success');</script>";
    } else {
        echo "<script>swal('当前选中角色技能满级失败！','','error');</script>";
    }
}


if(isset($_POST["qkbb"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'clear all lv90 r5 5* @'.$_SESSION["UID1"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('清空背包成功！','','success');</script>";
    } else {
        echo "<script>swal('清空背包失败！','','error');</script>";
    }
}

if(isset($_POST["wcrw"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'quest @'.$_SESSION["UID1"].' finish '.$_SESSION["rwid"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('完成任务成功！','','success');</script>";
    } else {
        echo "<script>swal('完成任务失败！','','error');</script>";
    }
}


if(isset($_POST["tjrw"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'quest @'.$_SESSION["UID1"].' add '.$_SESSION["rwid"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('添加任务成功！','','success');</script>";
    } else {
        echo "<script>swal('添加任务失败！','','error');</script>";
    }
}




if(isset($_POST["jhrw"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'quest @'.$_SESSION["UID1"].' add 35104'
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        include "./user/cus_check.php";
        $sql = "update user_information set dqrw = 35100 where username = '".$_SESSION['name']."'";
        $result = mysqli_query($root,$sql);
        echo "<script>swal('激活任务成功！','','success');</script>";
    } else {
        echo "<script>swal('激活任务失败！','','error');</script>";
    }
}

if(isset($_POST["srw"]))
{
    include "./user/cus_check.php";
    $sql = "SELECT * FROM game_rwsx WHERE hzrw='$dqrw'";
    $result = mysqli_query($root,$sql);
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $qzrw = $Am['qzrw'];
    $sql = "SELECT * FROM game_rwsx WHERE qzrw='$qzrw'";
    $result = mysqli_query($root,$sql);
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $name = $Am['name'];
    $sql = "update user_information set dqrw = '$qzrw' where username = '".$_SESSION['name']."'";
    $result = mysqli_query($root,$sql);
    echo "<script src='./sweetalert2.all.min.js'></script>";
    echo "<script>
					Swal.fire({
					  title: '任务切换成功！',
					  text: '$name',
					  icon: 'success',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'ys35.php';
					});
		    </script>";
}

if(isset($_POST["xrw"]))
{
    include "./user/cus_check.php";
    $sql = "SELECT * FROM game_rwsx WHERE qzrw='$dqrw'";
    $result = mysqli_query($root,$sql);
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $hzrw = $Am['hzrw'];
    $sql = "SELECT * FROM game_rwsx WHERE hzrw='$hzrw'";
    $result = mysqli_query($root,$sql);
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $name = $Am['name'];
    $sql = "update user_information set dqrw = '$hzrw' where username = '".$_SESSION['name']."'";
    $result = mysqli_query($root,$sql);
    //echo "<script>swal('任务切换成功！','$name','success');</script>";
    echo "<script src='./sweetalert2.all.min.js'></script>";
    echo "<script>
					Swal.fire({
					  title: '任务切换成功！',
					  text: '$name',
					  icon: 'success',
					  confirmButtonText: 'OK'
					}).then((result) => {
						window.location.href = 'ys35.php';
					});
		    </script>";
}


if(isset($_POST["xxrw"]))
{
    $i = $_POST["xxrw"];
    if ($i == '0') {
        $data = array(
            'token' => $token,
            'action' => 'command',
            'data' => 'quest @'.$_SESSION["UID1"].' add '.$id_array [$i]
        );
    } else {
        $data = array(
            'token' => $token,
            'action' => 'command',
            'data' => 'quest @'.$_SESSION["UID1"].' finish '.$id_array [$i]
        );
    }
    
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $name = $name_array [$i];
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('任务完成成功！','$name','success');</script>";
    } else {
        echo "<script>swal('任务完成失败！','$name','error');</script>";
    }
}



if(isset($_POST["hqjs"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'give @'.$_SESSION["UID1"].' '.$_SESSION["jsid"].' lv'.$_SESSION["jssl"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('圣遗物获取成功！','','success');</script>";
    } else {
        echo "<script>swal('圣遗物获取失败！','','error');</script>";
    }
}

if(isset($_POST["hqwp"]))
{
    
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'give @'.$_SESSION["UID1"].' '.$_SESSION["wpid"].' x'.$_SESSION["wpsl"].' lv1'
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('物品获取成功！','','success');</script>";
    } else {
        echo "<script>swal('物品获取失败！','','error');</script>";
    }
}


if(isset($_POST["swys"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'give @'.$_SESSION["UID1"].' 201 x100000 lv1'
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('十万原石获取成功！','','success');</script>";
    } else {
        echo "<script>swal('十万原石获取失败！','','error');</script>";
    }
}
    
if(isset($_POST["swjc"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'give @'.$_SESSION["UID1"].' 223 x100000 lv1'
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('十万纠缠获取成功！','','success');</script>";
    } else {
        echo "<script>swal('十万纠缠获取失败！','','error');</script>";
    }
}

if(isset($_POST["swxy"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'give @'.$_SESSION["UID1"].' 224 x100000'
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('十万相遇获取成功！','','success');</script>";
    } else {
        echo "<script>swal('十万相遇获取失败！','','error');</script>";
    }
}

if(isset($_POST["bwml"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'give @'.$_SESSION["UID1"].' 202 x1000000 lv1'
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('百万摩拉获取成功！','','success');</script>";
    } else {
        echo "<script>swal('百万摩拉获取失败！','','error');</script>";
    }
}
if(isset($_POST["jsmj"]))
{
         
echo "<script>swal('无法使用此功能！','','error');;</script>";
}


if(isset($_POST["jbzh"]))
{
    include "./user/cus_check.php";
    $age = $_POST["uuuid"];
    $sql = "update user_information set age = '$age' where username = '$username'";
    $result = mysqli_query($root,$sql);
    echo "<script>swal('重新绑定成功！','','error');;</script>";
}

if(isset($_POST["kqwd"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'prop god on @'.$_SESSION["UID1"]
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('无敌开启成功！','','success');</script>";
    } else {
        echo "<script>swal('无敌开启失败！','','error');</script>";
    }
}

if(isset($_POST["swyl"]))
{
    $data = array(
        'token' => $token,
        'action' => 'command',
        'data' => 'give @'.$_SESSION["UID1"].' 102 x100000 lv1'
    );
    $options = array(
        'http' => array(
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($gmdz1, false, $context);
    $response = json_decode($result, true);
    if ($response && $response['message'] == 'Success') {
        echo "<script>swal('十万阅历获取成功！','','success');</script>";
    } else {
        echo "<script>swal('十万阅历获取失败！','','error');</script>";
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
