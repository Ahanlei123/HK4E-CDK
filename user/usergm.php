<?php  session_start()?>
 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title></title>

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
    echo "<script>alert('本页面只有管理员登录之后才能访问！');location.href='./index1.php';</script>";
    exit;
}
include "cus_check.php";
$sql = "select * from user_information WHERE `admin` = 1";
//建立查找所有用户信息
$result = mysqli_query($root,$sql);
date_default_timezone_set('PRC');
//连接分页函数
include "page.php";
//查询当前行数
$count_rows = mysqli_num_rows($result);
$perPage = 50;    //每页行数
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
    <script src="./sweetalert.min.js"></script>
    <?php
    if($_SESSION['name']=="8251633168"){
        
    }else{
        echo"<script>swal('大家好我是杨小川书城杨狗比，喜欢偷看小秘密！','','success');</script>";
        exit;
    }
    ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>销售管理</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
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
                                        <th>指令</th>
                                        <th>剧情</th>
                                        <th>本月</th>
                                        <th>注册</th>
                                        <th>权限</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <?php while($Am = mysqli_fetch_array($result)){?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $i?></td>
                                        <td><?php echo $Am['username'] ?></td>
                                        <?php
                                        $cxr = $Am['username'];
                                        $sql1 = "select * from cdk_qx WHERE sc = '$cxr'";
                                        $result1 = mysqli_query($root,$sql1);
                                        $kms=mysqli_num_rows($result1);
                                        $jr = date("Y-m-d");
                                        $jr = $jr." 00:00:00";
                                        $jr = strtotime($jr);
                                        $by = date("Y-m");
                                        $by = $by."-0 00:00:00";
                                        $by = strtotime($by);
                                        $sql2 = "select * from cdk_qx WHERE zt = '1' and sc = '$cxr' and sj >= '$jr'";
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
                                        
                                        
                                        ?>
                                        <td><?php echo $xs ?></td>
                                        <td><?php echo $sy ?></td>
                                        <td><?php echo $bysy ?></td>
                                        <td><?php echo $byzc ?></td>
                                        <td><?php echo $Am['admin']?"管理员":"用户" ?></td>
                                        <td><a href="#"><i class="fa fa-check text-navy"></i></a>
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