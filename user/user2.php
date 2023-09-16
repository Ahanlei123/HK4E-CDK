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
$sql = "select * from user_information WHERE `gmbb` = 2";
//建立查找所有用户信息
$result = mysqli_query($root,$sql);

date_default_timezone_set('PRC');

//连接分页函数
include "page.php";
//查询当前行数
$count_rows = mysqli_num_rows($result);
$perPage = 500;    //每页行数
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
                        <h5>2服用户管理</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="user1.php">1服</a>
                                </li>
                                <li><a href="user2.php">2服</a>
                                </li>
                                <li><a href="user3.php">3服</a>
                                </li>
                                <li><a href="user4.php">4服</a>
                                </li>
                                <li><a href="user5.php">5服</a>
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
                                        <th>使用卡密</th>
                                        <th>卡密生成</th>
                                        <th>绑定账号</th>
                                        <th>最后上线</th>
                                        <th>权限状态</th>
                                        <th>注册时间</th>
                                        <th>到期时间</th>
                                        <th>管理操作</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php while($Am = mysqli_fetch_array($result)){
                                        $zcuid=$Am['username'];
                                        $sql1 = "select * from cdk_gf WHERE `uid` = '$zcuid'";
                                        $result1 = mysqli_query($root,$sql1);
                                        $Am1 = mysqli_fetch_array($result1)
                                        
                                    ?>
                                    <tr>
                                        
                                        <td><?php echo $i?></td>
                                        <td><?php echo $Am['username']; ?></td>
                                        <td><?php echo $Am['email']; ?></td>
                                        <td><?php echo $Am['sex']; ?></td>
                                        <td><?php echo $Am1['cdk']; ?></td>
                                        <td><?php echo $Am1['sc']; ?></td>
                                        <td><?php 
                                        if($Am['gf11uid']==''){
                                            $Am['gf11uid']='未绑定';
                                        }
                                        echo $Am['gf11uid']; ?></td>
                                        <td><?php echo $Am['zhsx']; ?></td>
                                        <td><?php  
                                        if($Am['zt']==''){
                                            $Am['zt']='未开通';
                                        }elseif($Am['zt']=='1'){
                                            $Am['zt']='正常';
                                        }elseif($Am['zt']=='3'){
                                            $Am['zt']='封号';
                                        }
                                        echo $Am['zt']; ?></td>
                                        <td><?php echo date('Y-m-d H:i:s', $Am['regDate']); ?></td>
                                        <td><?php echo date('Y-m-d H:i:s', $Am['userreg']); ?></td>
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