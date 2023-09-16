<?php  session_start()?>
 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">

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
include "cus_check.php";
$sql = "select * from user_information WHERE `admin` != 1";
//建立查找所有用户信息
$result = mysqli_query($root,$sql);
date_default_timezone_set('PRC');

//连接分页函数
include "page.php";
//查询当前行数
$count_rows = mysqli_num_rows($result);
$perPage = 15;    //每页行数
pageft($count_rows, $perPage, $count_rows);  //引用分页函数
$sql .= " limit $firstcount, $displaypg";   //追加查询信息
$result = mysqli_query($root, $sql);          //再次执行查询

$i =1; //序号
//传递参数
$page = isset($_GET['page'])?$_GET['page']:1;
$i = ($page -1) * $perPage + 1;
?>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>用户管理</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="table_basic.html#">选项1</a>
                                </li>
                                <li><a href="table_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>账号</th>
                                        <th>手机</th>
                                        <th>QQ</th>
                                        <th>UID</th>
                                        <th>游戏名称</th>
                                        <th>世界等级</th>
                                        <th>冒险等级</th>
                                        <th>用户权限</th>
                                        <th>网络地址</th>
                                        <th>注册时间</th>
                                        <th>管理操作</th>
                                    </tr>
                                </thead>
                                <?php while($Am = mysqli_fetch_array($result)){
                                $manager = new MongoDB\Driver\Manager('mongodb://root:vSfNv8mqcspnERzT@数据库地址:27017');
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $i?></td>
                                        <td><?php echo $Am['username']; ?></td>
                                        <td><?php echo $Am['email']; ?></td>
                                        <td><?php echo $Am['sex']; ?></td>
                                        <?php  
                                            $user = $Am['username'];
                                            $where = ['username'=>$user];
                                            $options = ['username'=>'','reservedPlayerId'=>'','permissions'=>'','locale'=>'',];
                                            $query = new MongoDB\Driver\Query($where, $options);
                                            $cursor = $manager->executeQuery('grasscutter.accounts', $query);
                                            foreach($cursor as $doc){
                                                 $UID=$doc->_id;
                                                 $permissions=$doc->permissions['0'];
                                                 if($permissions==""){
                                                    $permissions="无权限";
                                                 }elseif($permissions=='*'){
                                                    $permissions="所有权限";
                                                 }elseif($permissions=='mojo.console'){
                                                    $permissions="高级权限";
                                                 }elseif($permissions==$_SESSION['name']){
                                                    $permissions="已换绑";
                                                 }
                                                 break;
                                            }
                                            if($UID==""){
                                                $UID="未注册";
                                            }elseif($UID!=''){
                                                $where = ['accountId'=>$UID];
                                                $options = ['accountId'=>'','nickname'=>'','signature'=>'',];
                                                
                                                $query = new MongoDB\Driver\Query($where, $options);
                                                $cursor = $manager->executeQuery('grasscutter.players', $query);
                                                foreach($cursor as $doc){
                                                    $game=$doc->nickname;
                                                    $ownerid=$doc->_id;
                                                    
                                                    $sign=$doc->signature;
                                                    $playerProfile=$doc->playerProfile;
                                                    $sjdj=$doc->playerProfile->worldLevel."级";
                                                    $mxdj=$doc->playerProfile->playerLevel."级";
                                                    break;
                                                }
                                            }
                                        ?>
                                        <td><?php 
                                        if($ownerid == ""){
                                            $ownerid="未注册";
                                        }
                                        echo $ownerid; 
                                        ?></td>
                                        <td><?php echo $game; ?></td>
                                        <td><?php echo $sjdj; ?></td>
                                        <td><?php echo $mxdj; ?></td>
                                        <td><?php echo $Am['admin']?"管理员":$permissions; ?></td>
                                        <td><?php 
    if($Am['love'] == ""){
    echo '未提交IP';
}else{
    $ch = curl_init();
    $url = 'https://whois.pconline.com.cn/ipJson.jsp?ip=' . $Am['love'];
    //用curl发送接收数据
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //请求为https
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $location = curl_exec($ch);
    curl_close($ch);
    //转码
    $location = mb_convert_encoding($location, 'utf-8', 'GB2312');
    //var_dump($location);
    //截取{}中的字符串
    $location = substr($location, strlen('({') + strpos($location, '({'), (strlen($location) - strpos($location, '})')) * (-1));
    //将截取的字符串$location中的‘，’替换成‘&’   将字符串中的‘：‘替换成‘=’
    $location = str_replace('"', "", str_replace(":", "=", str_replace(",", "&", $location)));
    //php内置函数，将处理成类似于url参数的格式的字符串  转换成数组
    parse_str($location, $ip_location);
    echo $ip_location['addr'];
}
    
                                           ?></td>
                                           <?php $ownerid=""; $UID=""; $game=""; $sign=""; $sjdj=""; $mxdj=""; $permissions=""; $ip_location['addr']=""; ?>
                                        <td><?php echo date('Y-m-d H:i:s', $Am['regDate']); ?></td>
                                        <td>
                                            <a ><button type="button" class="btn btn-primary btn-xs">修改</button></a>
                                        </td>
                                        <?php $i++;?>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
 <td align="right"><?php echo $pagenav;?></td>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script src="js/demo/peity-demo.min.js"></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>