<?php  
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    include "./user/cus_check.php";
    $gmbb="3.4剧情服";
    $_SESSION["gmdz"] = 'http://121.62.18.138:20011/api?uid=';
    $_SESSION["yjdz"] = 'http://121.62.18.138:20011/api?';
    $gmdz="http://121.62.18.138:20011/api?uid=";
    $yjdz="http://121.62.18.138:20011/api?";
    $username="游客";
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
    <title>原神GM3.4剧情服平台</title>
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
                        <p>CDK兑换：<a href="" target="_blank">CDK兑换功能</a>
                        </p>
                        <form action="cdkdh.php" method="post">
                        <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
                        <input type="text" class="form-control" name="UID1" id="UID1" placeholder="请输入您的UID"/><span class="help-block m-b-none">请输入您的UID</span></a>
                        <input type="text" class="form-control" name="wpcdk" id="wpcdk" placeholder="请输入您购买的CDK"/><span class="help-block m-b-none">请输入您购买的CDK</span></a>
                        <button type="submit" name="dhcdk" id="dhcdk" class="btn btn-primary"  value="getrand"> 兑换CDK</button>
                        <button type="submit" name="xsfl" id="xsfl" class="btn btn-primary"  value="getrand"> 新手福利(进蒙德城在领取)</button>
                        <br/>
                        <button type="submit" name="xfrw1" id="xfrw1" class="btn btn-primary"  value="getrand"> 鸣海栖霞–第一步</button>
                        <button type="submit" name="xfrw2" id="xfrw2" class="btn btn-primary"  value="getrand"> 鸣海栖霞–第二步</button>
                        <button type="submit" name="xfrw3" id="xfrw3" class="btn btn-primary"  value="getrand"> 巧瞒七星解磐健</button>
                        <button type="submit" name="xfrw4" id="xfrw4" class="btn btn-primary"  value="getrand"> 意外之客</button>
                        <br></a>
                        </font>
                        </form>
                    </div>
                </div>
                
      
                
<script src="./sweetalert.min.js"></script>
<script>swal('公告','上线福利3万原石+流浪者+艾尔海森+图莱杜拉的回忆+裁叶萃光 \r\n注意：（新人福利一个号领一次）\r\n第一步：（别着急领礼包，否则后果自负，切记）\r\n主线做到安柏人物任务结束或者到蒙德城 \r\n新人福利：1.突破,神瞳等材料近300多种\r\n2.常用材料:精炼用魔矿，大英雄的经验，祝圣精华 \r\n 3.直升等级45级\r\n4.尘歌壶材料\r\n5.洞天宝钱,仙速瓶\r\n6.脆弱树脂,晶核\r\n7.印记\r\n8.声望 \r\n ','success');</script>
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


if(isset($_POST["test"]))
{
    $UID1 = $_POST['UID1'];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=quest+finish+1101307";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('测试','','success');</script>";
}

if(isset($_POST["xfrw1"]))
{
    $UID1 = $_POST['UID1'];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=quest+finish+1101307";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+1101308";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=dungeon+1127";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('鸣海栖霞–前往鸣海栖霞洞天','第一步已完成，请进入秘境后在跳第二部','success');</script>";
}

if(isset($_POST["xfrw2"]))
{
    $UID1 = $_POST['UID1'];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=quest+finish+1101309";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+1101310";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('鸣海栖霞–前往鸣海栖霞洞天','跳过成功','success');</script>";
}

if(isset($_POST["xfrw3"]))
{
    $UID1 = $_POST['UID1'];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=quest+finish+7104410";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+7104414";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+7104416";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+7104418";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+finish+7104418";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('巧瞒七星解磐健','跳过成功','success');</script>";
}

if(isset($_POST["xfrw4"]))
{
    $UID1 = $_POST['UID1'];
    $cmd1 = $_SESSION["gmdz"];
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $cmd = "&msg=quest+finish+101901";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    $cmd = "&msg=quest+accept+101902";
    $cmd = $cmd1.$UID1.$cmd.$cmd2;
    $re = file_get_contents($cmd);
    echo "<script>swal('意外之客','跳过成功','success');</script>";
}


if(isset($_POST["xsfl"]))
{
    $UID1 = $_POST['UID1'];
    $sql = "select * from cdk_xs where uid LIKE '$UID1'";
    $result = mysqli_query($root,$sql);
    $Am = mysqli_fetch_array($result);
    $yjfssj=time();
    $yjdqsj=strtotime('+7 days');
    if($Am['zt']==""){
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        //$cmd = "&msg=avatar+add+10000075";
        $cmd = "&msg=item+add+1075+1";
        $cmd = $gmdz.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $json = json_decode($re, true);
        if ($json['msg']=='recv from nodeserver timeout') {
            echo "<script>swal('领取失败','请保持游戏在线后在领取！','error');</script>";
            exit ;
        }elseif($json['msg']=='succ'){
            $sj = time(); 
            $sql = "insert into cdk_xs (uid,sj,zt) VALUE ('$UID1','$sj','1')";
            $result = mysqli_query($root,$sql);
            $cmd = "&msg=item+add+1078+1";
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $cmd = "&msg=equip+add+11512+1+6";
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $cmd = "&msg=equip+add+14512+1+6";
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $cmd = "&msg=player+level+45";
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $cmd = "&msg=item+add+1173+6";
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $cmd = "&msg=item+add+201+30000";
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $cmd = "&msg=item+add+101222+300";
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $cmd = "&msg=item+add+104013+999";
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $cmd = "&msg=item+add+104003+999";
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $cmd = "&msg=item+add+105003+999";
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            include "./user/cus_check.php";
            //$sql4 = "SELECT * FROM game_xs ";
            //$result4 = $root->query($sql4);
            //if ($result4->num_rows > 0) {
                
                //while($row = $result4->fetch_assoc()) {
                    //$cmd = "&msg=item+add+".$row['uuid']."+".$row['wpsl'];
                    //$cmd = $gmdz.$UID1.$cmd.$cmd2;
                    //$itemId = $row['uuid']; 
                    //$itemQuantity = $cmd; 
                    //$_SESSION['qbxsfl'][$itemId] = $itemQuantity; 
                //}
                
                //while($row = $result4->fetch_assoc()) {
                    //$cmd = "&msg=item+add+".$row['uuid']."+".$row['wpsl'];
                    //$cmd = $gmdz.$UID1.$cmd.$cmd2;
                    //$re = file_get_contents($cmd);
                    //$json = json_decode($re, true);
                    //$itemId = $row['uuid']; 
                    //if ($json['msg']=='succ') {
                        //unset($_SESSION['qbxsfl'][$itemId]);
                    //}
                //}
            //}
            
            echo "<script>swal('领取成功','新手福利领取成功,如未到账，请多刷新两次网页！','success');</script>";
        }else{
           echo "<script>swal('领取失败','发生未知错误，请联系管理员！','error');</script>";
        } 
        exit;
    }else{
        echo "<script>swal('领取失败','$wpcdk 当前UID已领取新手福利，请勿重复领取！','error');</script>";
        exit;
    }
}


if(isset($_POST["dhcdk"]))
{
    include "./user/cus_check.php";
    $UID1 = $_POST['UID1'];
    $cmd1 = $_SESSION["gmdz"];
    $wpcdk = $_SESSION["wpcdk"];
    $sql = "select * from cdk_wp where cdk LIKE '$wpcdk'";
    $result = mysqli_query($root,$sql);
    $Am = mysqli_fetch_array($result);
    $sysl = (int)$Am['sl']; 
    $sqlcdk = "select * from cdk_jr where cdk LIKE '$wpcdk'";
    $resultcdk = mysqli_query($root,$sqlcdk);
    $Amcdk = mysqli_fetch_array($resultcdk);
    if($wpcdk=='111'){
        $item="107001:999,107003:999,107014:999,107017:999,104111:999,104121:999,104131:999,104141:999,104151:999,104161:999,104171:999,105003:999,108006:999,108078:999,104013:999,99021:999,99022:999,99023:999,99024:999,99025:999,99026:999,99027:999,99028:999,99029:99999030:999,99031:999,99032:999,99033:999,99034:999,99055:999,99056:999,99057:999,99058:999,113001:999,113002:999,113003:999,113004:999,113005:999,113006:999,113007:999,113008:999,113009:999,113010:999,113011:999,113012:999,113013:999,113014:999,113015:999,113016:999,113017:999,113018:999,113019:999,113020:999,113021:999,113022:999,113023:999,113024:999,113025:999,113026:999,113027:999,113028:999,113029:999,113030:999,113031:999,113032:999,113033:999,113034:999,113035:999,113036:999,113037:999,113038:999,114039:999,114040:999,114001:999,114002:999,114003:999,114004:999,114005:999,114006:999,114007:999,114008:999,114009:999,114010:999,114011:999,114012:999,114013:999,114014:999,114015:999,114016:999,114017:999,114018:999,114019:999,114020:999,114021:999,114022:999,114023:999,114024:999,114025:999,114026:999,114027:999,114028:999,114029:999,114030:999,114031:999,114032:999,114033:999,114034:999,114035:999,114036:999,114037:999,114038:999,114039:999,114040:999,114041:999,114042:999,114043:999,114044:999,114045:999,114046:999,114047:999,114048:999,104301:999,104302:999,104303:999,104304:999,104305:999,104306:999,104307:999,104308:999,104309:999,104310:999,104311:999,104312:999,104313:999,104314:999,104315:999,104316:999,104317:999,104318:999,104319:999,104320:999,104321:999,104322:999,104323:999,104324:999,104325:999,104326:999,104327:999,104328:999,104329:999,104330:999,104331:999,104332:999,104333:999,104334:999,104335:999,104336:999,104337:999,101201:999,101202:999,101203:999,101204:999,101205:999,101206:999,101207:999,101208:999,101209:999,112062:999,112063:999,112064:999,112065:999,112066:999,112067:999,112068:999,112069:999,112070:999,112071:999,112072:999,112073:999,101225:999,101214:999,101215:999,104132:999,104133:999,104134:999,101217:999,112059:999,112016:999,112022:999,112025:999,112028:999,112031:999,112043:999,112049:999,112052:999,112058:999,112019:999,112004:999,112007:999,112010:999,112013:999,112034:999,112037:999,112040:999,112046:999,112055:999,112061:999,112048:999,112051:999,112057:999,104201:999,112003:999,112006:999,112009:999,112012:999,112033:999,112036:999,112039:999,112045:999,112054:999,112014:999,112060:999,112020:999,112023:999,112026:999,112029:999,112041:999,99920:999,112047:999,112056:999,112017:999,112002:999,112005:999,112008:999,112011:999,112032:999,112035:999,112038:999,112044:999,112053:999,112059:999,112015:999,112021:999,112024:999,112027:999,112030:999,112042:999,112018:999,113040:999,112050:999,107010:999,307:999,99085:999,315:999,316:999,317:999,220007:999,100058:999,100027:999,100025:999,100024:999,100023:999,100022:999,100028:999,100029:999,100030:999,100031:999,100032:999,100033:999,100034:999,100052:999,100055:999,101213:999,101222:999,100091:999,100021:999,100026:999,100056:999,101220:999,101222:999,101222:999,113041:999,100080:100,100017:100,113039:500,101618:500,101644:500,107016:999,104003:999,113042:500,113043:500,100057:999,100083:888,100082:999,101003:999,113044:999";
        $S=explode(",",$item);
        for ($i = 0; $i < count($S); $i++) {
            $b=explode(":",$S[$i]);
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+".$b[0]."+".$b[1];
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
                break;
                exit;
            }
        }
            
        if ($json['msg']=='succ') {
            include "./user/cus_check.php";
            echo "<script>swal('兑换成功','卡密兑换成功！','success');</script>";
            exit;
        } 
    }elseif($wpcdk=='222'){
        $item="104013:999,104003:999,105003:999";
        $S=explode(",",$item);
        for ($i = 0; $i < count($S); $i++) {
            $b=explode(":",$S[$i]);
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+".$b[0]."+".$b[1];
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
                break;
                exit;
            }
        }
            
        if ($json['msg']=='succ') {
            include "./user/cus_check.php";
            echo "<script>swal('兑换成功','卡密兑换成功！','success');</script>";
            exit;
        } 
    }elseif($wpcdk=='333'){
        $item="108032:100,108032:100";
        $S=explode(",",$item);
        for ($i = 0; $i < count($S); $i++) {
            $b=explode(":",$S[$i]);
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+".$b[0]."+".$b[1];
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
                break;
                exit;
            }
        }
            
        if ($json['msg']=='succ') {
            include "./user/cus_check.php";
            echo "<script>swal('兑换成功','卡密兑换成功！','success');</script>";
            exit;
        } 
    }elseif($wpcdk=='444'){
        $item="101301:666,101302:666,101303:666,101304:666,101305:666,101307:666,101308:666,101309:666,101310:666,101311:666,101312:666,101313:666,101314:666,101315:666,101316:666,101317:666,101401:666,101402:666,101403:666,101404:666";
        $S=explode(",",$item);
        for ($i = 0; $i < count($S); $i++) {
            $b=explode(":",$S[$i]);
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+".$b[0]."+".$b[1];
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
                break;
                exit;
            }
        }
            
        if ($json['msg']=='succ') {
            include "./user/cus_check.php";
            echo "<script>swal('兑换成功','卡密兑换成功！','success');</script>";
            exit;
        } 
    }elseif($wpcdk=='555'){
        $item="204:888,107013:888";
        $S=explode(",",$item);
        for ($i = 0; $i < count($S); $i++) {
            $b=explode(":",$S[$i]);
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+".$b[0]."+".$b[1];
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
                break;
                exit;
            }
        }
            
        if ($json['msg']=='succ') {
            include "./user/cus_check.php";
            echo "<script>swal('兑换成功','卡密兑换成功！','success');</script>";
            exit;
        } 
    }elseif($wpcdk=='666'){
        $item="107009:999,100085:999";
        $S=explode(",",$item);
        for ($i = 0; $i < count($S); $i++) {
            $b=explode(":",$S[$i]);
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+".$b[0]."+".$b[1];
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
                break;
                exit;
            }
        }
            
        if ($json['msg']=='succ') {
            include "./user/cus_check.php";
            echo "<script>swal('兑换成功','卡密兑换成功！','success');</script>";
            exit;
        } 
    }elseif($wpcdk=='777'){
        $item="301:888,302:888,303:888,304:888,305:888,306:888,307:888";
        $S=explode(",",$item);
        for ($i = 0; $i < count($S); $i++) {
            $b=explode(":",$S[$i]);
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+".$b[0]."+".$b[1];
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
                break;
                exit;
            }
        }
            
        if ($json['msg']=='succ') {
            include "./user/cus_check.php";
            echo "<script>swal('兑换成功','卡密兑换成功！','success');</script>";
            exit;
        } 
    }elseif($wpcdk=='888'){
        $item="314:99999,315:99999,316:99999,317:99999";
        $S=explode(",",$item);
        for ($i = 0; $i < count($S); $i++) {
            $b=explode(":",$S[$i]);
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+".$b[0]."+".$b[1];
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
                break;
                exit;
            }
        }
            
        if ($json['msg']=='succ') {
            include "./user/cus_check.php";
            echo "<script>swal('兑换成功','卡密兑换成功！','success');</script>";
            exit;
        } 
    }elseif($wpcdk=='999'){
        $item="220074:1,340000:1,340001:1,340002:1,340003:1,340004:1,340005:1,220074:1340010:1,340011:1,340010:1,";
        $S=explode(",",$item);
        for ($i = 0; $i < count($S); $i++) {
            $b=explode(":",$S[$i]);
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            $cmd = "&msg=item+add+".$b[0]."+".$b[1];
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $re = file_get_contents($cmd);
            $json = json_decode($re, true);
            if ($json['msg']=='recv from nodeserver timeout') {
                echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
                break;
                exit;
            }
        }
        if ($json['msg']=='succ') {
            include "./user/cus_check.php";
            echo "<script>swal('兑换成功','卡密兑换成功！','success');</script>";
            exit;
        } 
    }elseif($Amcdk['jssj'] != ''){
        $item = $Amcdk['lb'];
        $lbks = $Amcdk['kssj'];
        $lbjs = $Amcdk['jssj'];
        $S=explode(",",$item);
        $startDate = date('Y-m-d', strtotime($lbks));
        $endDate = date('Y-m-d', strtotime($lbjs));
        $today = date('Y-m-d');
        if ($today >= $startDate && $today <= $endDate) {
            $sql = "select * from cdk_lb where uid LIKE '$UID1' AND lb LIKE '$wpcdk'";
            for ($i = 0; $i < count($S); $i++) {
                $b=explode(":",$S[$i]);
                $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
                $cmd = "&msg=item+add+".$b[0]."+".$b[1];
                $cmd = $gmdz.$UID1.$cmd.$cmd2;
                include "./user/cus_check.php";
                $result1 = mysqli_query($root,$sql);
                $Am1 = mysqli_fetch_array($result1);
                if ($Am1['id'] != '') {
                    echo "<script>swal('兑换失败','当前账号以领取过了当前礼包！','error');</script>";
                    break;
                    exit;
                }else{
                    $re = file_get_contents($cmd);
                    $json = json_decode($re, true);
                }
                if ($json['msg']=='recv from nodeserver timeout') {
                    echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
                    break;
                    exit;
                }
            }
            
            if ($json['msg']=='succ') {
                include "./user/cus_check.php";
                $sj = time(); 
                $sql = "insert into cdk_lb (uid,sj,lb) VALUE ('$UID1','$sj','$wpcdk')";
                $result = mysqli_query($root,$sql);
                echo "<script>swal('兑换成功','".$Amcdk['name']."礼包领取成功！','success');</script>";
                exit;
            } 
        }else{
            echo "<script>swal('兑换失败','当前日期不可领取".$Amcdk['name']."礼包！','error');</script>";
        }
    }else{
        if($Am['zt']==""){
            echo "<script>swal('兑换失败','$wpcdk 卡密错误,无法完成兑换','error');</script>";
            exit;
        }elseif($Am['zt']=="1"){
            echo "<script>swal('兑换失败','$wpcdk 卡密已被使用，无法完成兑换','error');</script>";
            exit;
        }
    }
    
    
    $wpid=$Am['wp'];
    $wpsl=$Am['sl'];
    $yjbt=$Am['bt'];
    $yjnr=$Am['nr'];
    $yjfssj=time();
    $yjdqsj=strtotime('+7 days');
    if($wpid == 'xyk'){
        echo "<script>swal('开通失败','小月卡开通失败，请先注册账号后在开通！','success');</script>";
        exit ;
    }
    if($wpid == 'dyk'){
        echo "<script>swal('开通失败','大月卡开通失败，请先注册账号后在开通！','success');</script>";
        exit ;
    }
    
    if($wpid == 'qbjs'){
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=item+add+avatar+all";
        $cmd = $gmdz.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $json = json_decode($re, true);
        if ($json['msg']=='recv from nodeserver timeout') {
            echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
        }else{
            include "./user/cus_check.php";
            $sql = "update cdk_wp set zt = 1 where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            $sql = "update cdk_wp set uid = '$UID1' where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            echo "<script>swal('兑换成功','全部角色已直接到账游戏！','success');</script>";
        } 
        exit ;
    }
    
    if($wpid == 'qbmmjs'){
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $cmd = "&msg=item+add+avatar+all";
        $cmd = $gmdz.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $json = json_decode($re, true);
        if ($json['msg']=='recv from nodeserver timeout') {
            echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
        }else{
            $re = file_get_contents($cmd);
            $re = file_get_contents($cmd);
            $re = file_get_contents($cmd);
            $re = file_get_contents($cmd);
            $re = file_get_contents($cmd);
            $re = file_get_contents($cmd);
            include "./user/cus_check.php";
            $sql = "update cdk_wp set zt = 1 where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            $sql = "update cdk_wp set uid = '$UID1' where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            echo "<script>swal('兑换成功','全部满命角色已直接到账游戏！','success');</script>";
        } 
        exit ;
    }
    
    if($wpsl == 'zhcdk'){
        $itemsArray = explode("|", $wpid); // 使用"|"符号分割字符串，生成物品数组
        foreach ($itemsArray as $item) {
            $itemData = explode("+", $item); // 使用"+"符号分割每个物品的ID和数量
            $wpid=$itemData[2];
            $wpsl=$itemData[3];
            $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
            if($wpid=='1075') {
                $cmd = "&msg=avatar+add+10000075";
            }elseif($wpid=='1078') {
                $cmd = "&msg=avatar+add+10000078";
            }else{
                $cmd = "&msg=item+add+".$wpid."+".$wpsl;
            }
            $cmd = $gmdz.$UID1.$cmd.$cmd2;
            $sql = "insert into app_zx (uid,cmd,sj,zt) VALUE ('$UID1','$cmd','$sj','0')";
            $result = mysqli_query($root,$sql);
            $re = file_get_contents($cmd);
        }
        include "./user/cus_check.php";
        $sql = "update cdk_wp set zt = 1 where cdk = '$wpcdk'";
        $result = mysqli_query($root,$sql);
        $sql = "update cdk_wp set uid = '$UID1' where cdk = '$wpcdk'";
        $result = mysqli_query($root,$sql);
        echo "<script>swal('兑换成功','物品已直接到账游戏！','success');</script>";
        exit;
    }
    
    
    if($wpsl > 0){
        //物品数量大于1000使用指令发
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        if($wpid=='1075') {
            $cmd = "&msg=avatar+add+10000075";
        }elseif($wpid=='1078') {
            $cmd = "&msg=avatar+add+10000078";
        }elseif($wpid=='11512') {
            $cmd = "&msg=equip+add+11512+1+6";
        }else{
            $cmd = "&msg=item+add+".$wpid."+".$wpsl;
        }
        $cmd = $gmdz.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $json = json_decode($re, true);
        if ($json['msg']=='recv from nodeserver timeout') {
            echo "<script>swal('兑换失败','请保持游戏在线后在兑换！','error');</script>";
            exit ;
        }elseif($json['msg']=='succ'){
            include "./user/cus_check.php";
            $sql = "update cdk_wp set zt = 1 where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            $sql = "update cdk_wp set uid = '$UID1' where cdk = '$wpcdk'";
            $result = mysqli_query($root,$sql);
            echo "<script>swal('兑换成功','$yjnr 物品已直接到账游戏！','success');</script>";
            //echo "$cmd";
        }else{
           echo "<script>swal('兑换失败','发生未知错误，请联系管理员！','error');</script>";
        } 
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
