<?php  session_start();
?>
<!DOCTYPE html>
<html>
<!-- Mirrored from www.zi-han.net/theme/hplus/index_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:46 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>原神GM</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
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
$current_date = date("Y-m-d");
include "cus_check.php";
// 查询语句
$sql = "SELECT SUM(money) AS total_money FROM cz_ddsj WHERE zt=1 AND DATE_FORMAT(STR_TO_DATE(ddsj, '%Y-%m-%d %H:%i:%s'), '%Y-%m-%d')='$current_date'";
// 执行查询
$result = mysqli_query($root, $sql);
// 检查查询结果是否为空
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        $czje=$row["total_money"];
    }
} else {
    $czje="0";
}
include "cus_check.php";
//建立查找所有用户信息
$sql = "select * from user_information WHERE `gmbb` = ''";
$result = mysqli_query($root,$sql);
$asl = mysqli_num_rows($result);
$sql = "select * from user_information WHERE `gmbb` = '1'";
$result = mysqli_query($root,$sql);
$bsl = mysqli_num_rows($result);
$sql = "select * from user_information WHERE `gmbb` = '2'";
$result = mysqli_query($root,$sql);
$csl = mysqli_num_rows($result);
$sql = "select * from user_information WHERE `gmbb` = '3'";
$result = mysqli_query($root,$sql);
$dsl = mysqli_num_rows($result);
$sql = "select * from user_information WHERE `gmbb` = '4'";
$result = mysqli_query($root,$sql);
$esl = mysqli_num_rows($result);
$sql = "select * from user_information WHERE `gmbb` = '5'";
$result = mysqli_query($root,$sql);
$fsl = mysqli_num_rows($result);
error_reporting(E_ERROR | E_PARSE);
//$url = 'https://124.223.19.213:24469/status/server';
$json = file_get_contents($url);
$data = json_decode($json);
$azx = $data->status->playerCount;

//$url = 'https://124.223.19.213:24469/status/server';
$json = file_get_contents($url);
$data = json_decode($json);
$abb = $data->status->version;

$url = 'http://121.62.18.138:20011/api?cmd=1101&region=dev_gio&ticket=YSGM%401668452844&sign=e2ea40aedf14ee534a3e4a14972961bb697a5d47f7d66a649851204143e558fd';
$json = file_get_contents($url);
$data = json_decode($json);
$bzx = $data->data->internal_data;

$url = 'http://121.62.18.138:20011/api?cmd=1101&region=dev_gio&ticket=YSGM%401668452844&sign=e2ea40aedf14ee534a3e4a14972961bb697a5d47f7d66a649851204143e558fd';
$json = file_get_contents($url);
$data = json_decode($json);
$czx = $data->data->internal_data;

$url = 'http://121.62.18.138:20011/api?cmd=1101&region=dev_gio&ticket=YSGM%401668452844&sign=e2ea40aedf14ee534a3e4a14972961bb697a5d47f7d66a649851204143e558fd';
$json = file_get_contents($url);
$data = json_decode($json);
$dzx = $data->data->internal_data;

$url = 'http://121.62.18.138:20011/api?cmd=1101&region=dev_gio&ticket=YSGM%401668452844&sign=e2ea40aedf14ee534a3e4a14972961bb697a5d47f7d66a649851204143e558fd';
$json = file_get_contents($url);
$data = json_decode($json);
$ezx = $data->data->internal_data;


$cxr = $_SESSION['name'];
$sql1 = "select * from cdk_gf WHERE sc = '$cxr'";
$result1 = mysqli_query($root,$sql1);
$kms=mysqli_num_rows($result1);
$jr = date("Y-m-d");
$jr = $jr." 00:00:00";
$jr = strtotime($jr);
$by = date("Y-m");
$by = $by."-0 00:00:00";
$by = strtotime($by);
$sql2 = "select * from cdk_qx WHERE sc = '$cxr' and sj >= '$jr'";
$result2 = mysqli_query($root,$sql2);
$zcxs=mysqli_num_rows($result2);
$sql1 = "select * from cdk_qx WHERE sc = '$cxr'";
$result1 = mysqli_query($root,$sql1);
$kms=mysqli_num_rows($result1);
$jr = date("Y-m-d");
$jr = $jr." 00:00:00";
$jr = strtotime($jr);
$by = date("Y-m");
$by = $by."-0 00:00:00";
$by = strtotime($by);
$sql2 = "select * from cdk_qx WHERE sc = '$cxr' and sj >= '$jr'";
$result2 = mysqli_query($root,$sql2);
$xs=mysqli_num_rows($result2);
$sql3 = "select * from cdk_gf WHERE zt = '1' and sc = '$cxr' and sj >= '$jr'";
$result3 = mysqli_query($root,$sql3);
$sy=mysqli_num_rows($result3);
$sql4 = "select * from cdk_gf WHERE zt = '1' and sc = '$cxr' and sj >= '$by'";
$result4 = mysqli_query($root,$sql4);
$bysy=mysqli_num_rows($result4);
$sql5 = "select * from cdk_gf WHERE zt = '1' and sc = '$cxr' and sj >= '$by'";
$result5 = mysqli_query($root,$sql5);
$byzc=mysqli_num_rows($result5);

// 1服未到期数量
$current_timestamp = time();
$sql10 = "SELECT COUNT(*) as count FROM user_information WHERE userreg > $current_timestamp AND gmbb = 1";
$result10 = $root->query($sql10);
$row = $result10->fetch_assoc();
$bwdq= $row["count"];
// 2服未到期数量
$current_timestamp = time();
$sql10 = "SELECT COUNT(*) as count FROM user_information WHERE userreg > $current_timestamp AND gmbb = 2";
$result10 = $root->query($sql10);
$row = $result10->fetch_assoc();
$cwdq= $row["count"];
// 1服未到期数量
$current_timestamp = time();
$sql10 = "SELECT COUNT(*) as count FROM user_information WHERE userreg > $current_timestamp AND gmbb = 3";
$result10 = $root->query($sql10);
$row = $result10->fetch_assoc();
$dwdq= $row["count"];
// 3服未到期数量
$current_timestamp = time();
$sql10 = "SELECT COUNT(*) as count FROM user_information WHERE userreg > $current_timestamp AND gmbb = 4";
$result10 = $root->query($sql10);
$row = $result10->fetch_assoc();
$ewdq= $row["count"];
?>
<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">今日</span>
                        <h5>今日充值</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $czje+0 ?></h1>
                        <div class="stat-percent font-bold text-info">充值系统 </i>
                        </div>
                        <small></small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">今日</span>
                        <h5>今日注册</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $zcxs ?></h1>
                        <div class="stat-percent font-bold text-info">官服注册 </i>
                        </div>
                        <small></small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">本月</span>
                        <h5>本月权限</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $bysy ?></h1>
                        <div class="stat-percent font-bold text-navy">高级权限 </i>
                        </div>
                        <small></small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger pull-right">本月</span>
                        <h5>本月注册</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $byzc ?></h1>
                        <div class="stat-percent font-bold text-navy">官服注册 </i>
                        </div>
                        <small></small>
                    </div>
                </div>
            </div>
        </div>
       <div class="row">
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">04月20日</span>
                        <h5>3.4剧情服指令-<?php echo $abb ?></h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $asl ?></h1>
                        <div class="stat-percent font-bold text-info">当前在线:<?php echo $azx ?> </i>
                        </div>
                        <small>总玩家</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">04月22日</span>
                        <h5>3.4剧情服</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $bwdq ?></h1>
                        <div class="stat-percent font-bold text-info">当前在线:<?php echo $bzx ?> </i>
                        </div>
                        <small>到期用户:<?php echo $bsl-$bwdq."|".$bsl?></small>
                    </div>
                </div>
            </div>
            
            
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">负载中</span>
                        <h5>3.4剧情服</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $cwdq ?></h1>
                        <div class="stat-percent font-bold text-info">当前在线:<?php echo $czx ?> </i>
                        </div>
                        <small>到期用户:<?php echo $csl - $cwdq."|".$csl?></small>
                    </div>
                </div>
            </div>
            
            
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">负载中</span>
                        <h5>3.4剧情服</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $dwdq ?></h1>
                        <div class="stat-percent font-bold text-info">当前在线:<?php echo $dzx ?> </i>
                        </div>
                        <small>到期用户:<?php echo $dsl-$dwdq."|".$dsl?></small>
                    </div>
                </div>
            </div>
            
            
            
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">未开放</span>
                        <h5>3.4剧情服</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $ewdq ?></h1>
                        <div class="stat-percent font-bold text-info">当前在线:<?php echo $ezx ?> </i>
                        </div>
                        <small>到期用户:<?php echo $esl-$ewdq."|".$esl?></small>
                    </div>
                </div>
            </div>
            
            
            
        </div>
        </div>
    </div>
    <script src="./sweetalert.min.js"></script>
    <?php
    $ggnr= '尊敬的管理员欢迎回来 \r\n 1服如果出现卡任务的情况，请让他打开高级权限 \r\n 找到任务管理输入目前卡的任务名字，如“非情愿”关键字，然后点击完成任务 \r\n 来解决卡任务问题，不用每个任务都点，只是部分任务出现这种情况 \r\n 感谢你的使用！';
//echo"<script>swal('公告(此页面只有管理员可见)','$ggnr','success');</script>";
?>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.min.js"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/demo/sparkline-demo.min.js"></script>

</body>
<!-- Mirrored from www.zi-han.net/theme/hplus/index_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:49 GMT -->
</html>