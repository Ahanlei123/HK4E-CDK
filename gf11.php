<?php  
    include ("./user/conn.php");
    session_start();
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
    $UID1 = $Am['gf11uid'];
    $userreg=$Am['userreg'];
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
            echo "<script>alert('该用户以到期，请及时续费! ');location.href = './userxf.php';</script>";
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
    
    if($gmbb==''){
        $gmbb="正常";
        //$_SESSION["gmdz"] = 'http://110.42.9.80:65412/api?uid=';
    }elseif($gmbb=='1'){
        $gmbb="3.4剧情服";
        $_SESSION["gmdz"] = 'http://121.62.18.138:20011/api?uid=';
        $gmdz1="http://121.62.18.138:20011/api?uid=";
    }
    
    if($UID1==''){
        header("Location: index.php?result=6"); 
        exit;
    }
    $cmd1 = $gmdz1;
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=item+add+201+1";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $json = json_decode($re, true);
    if ($json['msg']=='recv from nodeserver timeout') {
        $gmbb=$gmbb."--离线";
        $_SESSION["gmdz"] = 'http://121.62.18.138:20011/api?uid=';
        $gmdz1="http://121.62.18.138:20011/api?uid=";
        $cmd1 = $gmdz1;
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $json = json_decode($re, true);
        if ($json['msg']=='succ') {
            $gmbb=$gmbb."--在线";
        }else{
            $_SESSION["gmdz"] = 'http://121.62.18.138:20011/api?uid=';
            $gmdz1="http://121.62.18.138:20011/api?uid=";
            $cmd1 = $gmdz1;
            $cmd = $cmd1.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                $gmbb=$gmbb."--离线";
                header("Location: index.php?result=5"); 
            }elseif($json['msg']=='succ'){
                $gmbb=$gmbb."--在线";
                include "./user/cus_check.php";
                $sxsj = date("Y-m-d H:i:s");
                $sql2 = "update user_information set zhsx = '$sxsj' where username = '".$_SESSION['name']."'";
                $result2 = mysqli_query($root,$sql2);
            }else{
                $gmbb=$gmbb."--错误";
            } 
        } 
    }elseif($json['msg']=='succ'){
        $gmbb=$gmbb."--在线";
        include "./user/cus_check.php";
        $sxsj = date("Y-m-d H:i:s");
        $sql2 = "update user_information set zhsx = '$sxsj' where username = '".$_SESSION['name']."'";
        $result2 = mysqli_query($root,$sql2);
    }else{
        $gmbb=$gmbb."--错误";
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
    $UID1 = $Am['gf11uid'];
    $sql4 = "SELECT * FROM shop_syw ";
    $result4 = $syw->query($sql4);
    if ($result4->num_rows > 0) {
        while($row = $result4->fetch_assoc()) {
        $id_array2[] = $row['jg'];
        $name_array2[] = $row['name'];
        }
    }
    
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
                            <li>检测到你的账号为「<?php echo $gmbb ?>」账号，请确保是否登录的「<?php echo $gmbb ?>」否则将无法获取物品！</li>
                            <li>你账号权限距离到期时间「<?php 
                            if ($userreg=='3000000000') {
                                echo '永久套餐」，无需续费！';
                            }else{
                                echo $uudqsj.'」到期后起注意续费！';
                            }?></li>
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
                        <p>小极品圣遗物：<a href="" target="_blank">收费功能(直接获取极品圣遗物，强化100%不歪！)</a>
                        </p>
                        <?php
                        if ($userreg=='30000000000') {
                        echo '<form name=alipayment action=dailiapi.php method=post target="_blank">
	                    <input hidden type="text" id="username" name="username"  value="'.$username.'" placeholder="请输入账号" maxlength="30">';
	                    $num_of_buttons = count($name_array2);
                        for ($i = 0; $i < $num_of_buttons; $i++) {
                            $button_title = $name_array2[$i];
                            $button_zl = $id_array2[$i];
                            echo '<button type="submit" name="xjpsyw" id="xjpsyw'.$i.'" class="btn btn-primary"  value="'.$button_title.'">'.$button_title.' </button> ' ;
                        }
	                    echo '<br></a>
                        </font>
                        </form>';
                        }elseif ($daili=='0'){
                        echo '<form name=alipayment action=epayapi.php method=post target="_blank">
	                    <input hidden type="text" id="username" name="username"  value="'.$username.'" placeholder="请输入账号" maxlength="30">';
	                    $num_of_buttons = count($name_array2);
                        for ($i = 0; $i < $num_of_buttons; $i++) {
                            $button_title = $name_array2[$i];
                            $button_zl = $id_array2[$i];
                            echo '<button type="submit" name="xjpsyw" id="xjpsyw'.$i.'" class="btn btn-primary"  value="'.$button_title.'">'.$button_title.' (' .$button_zl.'元)</button> ' ;
                        }
                        echo '<br></a>
                        </font>
                        </form>';
                        }else{
                        echo '<form name=alipayment action=epayapi.php method=post target="_blank">
	                    <input hidden type="text" id="username" name="username"  value="'.$username.'" placeholder="请输入账号" maxlength="30">';
	                    $num_of_buttons = count($name_array2);
                        for ($i = 0; $i < $num_of_buttons; $i++) {
                            $button_title = $name_array2[$i];
                            $button_zl = $id_array2[$i];
                            echo '<button type="submit" name="xjpsyw" id="xjpsyw'.$i.'" class="btn btn-primary"  value="'.$button_title.'">'.$button_title.' (20元)</button> ' ;
                        }
                        echo '<br></a>
                        </font>
                        </form>';
                        }
                        
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
	                    <button type="submit" name="tl" id="tl" class="btn btn-primary"  value="getrand"> 无限体力（开）</button>
	                    <button type="submit" name="tll" id="tll" class="btn btn-primary"  value="getrand"> 无限体力（关）</button>
	                    <button type="submit" name="wxbf" id="wxbf" class="btn btn-primary"  value="getrand"> 无限爆发</button>
	                    <button type="submit" name="jsmj" id="jsmj" class="btn btn-primary"  value="getrand"> 角色满级</button>
	                    <button type="submit" name="jsmm" id="jsmm" class="btn btn-primary"  value="getrand"> 角色满命</button>
	                    <button type="submit" name="jsjn" id="jsjn" class="btn btn-primary"  value="getrand"> 角色技能</button>
	                    <button type="submit" name="kqwd" id="kqwd" class="btn btn-primary"  value="getrand"> 开启无敌</button>
	                    <button type="submit" name="swyl" id="swyl" class="btn btn-primary"  value="getrand"> 十万阅历</button>
	                    <button type="submit" name="bfsyw" id="bfsyw" class="btn btn-primary"  value="getrand"> 补发圣遗物</button>
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


if(isset($_POST["bfsyw"]))
{
// 连接数据库

include "./user/cus_check.php";

// 查询所有符合条件的记录
$query = "SELECT * FROM cz_ddsj WHERE zt=1 AND username='".$_SESSION['name']."' AND bf IS NULL";
$result = $root->query($query);
$count = 0;
$countsb = 0;
$countcg = 0;
// 循环处理每个记录
while ($row = $result->fetch_assoc()) {
    // 执行cmd字段中的代码
    $count++;
    $id = $row['id'];
    $xfjl=$row['cmd'];
    $gmdz1=$_SESSION["gmdz"];
    $uid= $_SESSION["UID1"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $zxurl=$gmdz1.$uid.$xfjl.$cmd2;
    $re = file_get_contents($zxurl);
    sleep(1);
        $json = json_decode($re, true);
        if ($json['msg']=='recv from nodeserver timeout') {
            $countsb++;
        }elseif($json['msg']=='succ'){
            include "./user/cus_check.php";
            $update_query = "UPDATE cz_ddsj SET bf=1 WHERE id=$id";
            $root->query($update_query);
            $countcg++;
        }else{
            $countsb++;
        }
    // 更新记录的bf字段为1
}
if ($count == 0) {
    echo "<script>swal('补发失败','当前暂无需要补发的圣遗物！','error');</script>";
} else {
    $count = '当前共补发：'.$count.'个\r\n成功：'.$countcg.'个\r\n失败：'.$countsb.'个';
    echo "<script>swal('补发成功','$count','success');</script>";
}

}


if(isset($_POST["tll"]))
{
    $main=new config17();
    call_user_func([$main,"tll"]);
}
class config17
{
    public function tll()
    {
        $UID1 = $_SESSION["UID1"];
        $cmd1 = $_SESSION["gmdz"];
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=stamina+infinite+off";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        echo "<script>swal('以关闭无限体力！','','success');</script>";
    }
}


if(isset($_POST["hqwq"]))
{
    $main=new config16();
    call_user_func([$main,"hqwq"]);
}
class config16
{
    public function hqwq()
    {
        $UID1 = $_SESSION["UID1"];
        $cmd1 = $_SESSION["gmdz"];
        $xj = 1;
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=equip+add+".$_SESSION["wqid"]."+".$_SESSION["wqsl"]."+".$_SESSION["wqtp"];
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        echo "<script>swal('武器获取成功！','','success');</script>";
    }
}


if(isset($_POST["tl"]))
{
    $main=new config15();
    call_user_func([$main,"tl"]);
}
class config15
{
    public function tl()
    {
        $UID1 = $_SESSION["UID1"];
        $cmd1 = $_SESSION["gmdz"];
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=stamina+infinite+on";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        echo "<script>swal('以开启无限体力！','','success');</script>";
    }
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
    $main=new config14();
    call_user_func([$main,"czzh"]);
}
class config14
{
    public function czzh()
    {
        $UID1 = $_SESSION["UID1"];
        $cmd1 = $_SESSION["gmdz"];
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=clear+all";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        echo "<script>swal('重置账号成功！','','success');</script>";
    }
}

if(isset($_POST["jsdt"]))
{
    $main=new config13();
    call_user_func([$main,"jsdt"]);
}
class config13
{
    public function jsdt()
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
    $main=new config11();
    call_user_func([$main,"qkbb"]);
}
class config11
{
    public function qkbb()
    {
        $UID1 = $_SESSION["UID1"];
        $cmd1 = $_SESSION["gmdz"];
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=item+clear+all";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        echo "<script>swal('清空背包成功','','success');</script>";
    }
}

if(isset($_POST["wcrw"]))
{
    $main=new config9();
    call_user_func([$main,"wcrw"]);
}
class config9
{
    public function wcrw()
    {
        $UID1 = $_SESSION["UID1"];
        //完成任务
        $cmd1 = $_SESSION["gmdz"];
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=quest+finish+".$_SESSION["rwid"];
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        //新增任务
        $cmd1 = $_SESSION["gmdz"];
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $clrwid = $_SESSION["rwid"]+1;
        $cmd = "&msg=quest+accept+".$clrwid;
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        echo "<script>swal('当前任务以完成！','','success');</script>";
    }
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
    $main=new config6();
    call_user_func([$main,"swys"]);
}
class config6
{
    public function swys()
    {
        $UID1 = $_SESSION["UID1"];
        $cmd1 = $_SESSION["gmdz"];
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=item+add+201+100000";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        
        echo "<script>swal('十万原石获取成功！','','success');</script>";
    }
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
    <script src="./js/search.js"></script>
</body>


</html>
