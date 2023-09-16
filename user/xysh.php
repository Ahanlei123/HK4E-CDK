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
include "cus_check.php";//SELECT * FROM `xy_ddsj`
    if($_SESSION['name']=="8251633168"){
        $sql = "select * from xy_ddsj";
        $result = mysqli_query($root,$sql);
        date_default_timezone_set('PRC');
        include "page.php";
        $count_rows = mysqli_num_rows($result);
        $perPage = 20;    //每页行数
        pageft($count_rows, $perPage, $count_rows);  //引用分页函数
        $sql .= " limit $firstcount, $displaypg";   //追加查询信息
        $result = mysqli_query($root, $sql);          //再次执行查询
        $i =1; //序号
        $page = isset($_GET['page'])?$_GET['page']:1;
        $i = ($page -1) * $perPage + 1;
    }

?>

<body class="gray-bg">
    <script src="./sweetalert.min.js"></script>
    <?php
    if($_SESSION['name']=="8251633168"){
    }else{
    echo"<script>swal('大家好我是杨小川书城杨狗比，喜欢偷看小秘密！','','success');</script>";
    exit;
    }
    ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>咸鱼收货统计-查差评</h5>
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
                                        <th>商品名称</th>
                                        <th>订单编号</th>
                                        <th>订单手机</th>
                                        <th>订单金额</th>
                                        <th>订单时间</th>
                                        <th>使用UID</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <?php while($Am = mysqli_fetch_array($result)){?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $i?></td>
                                        <td><?php echo $Am['ddmc'] ?></td>
                                        <td><?php echo $Am['ddbh'] ?></td>
                                        <td><?php echo $Am['ddsj'] ?></td>
                                        <td><?php echo $Am['ddje'] ?></td>
                                        <?php
                                        $sycdk=$Am['ddkm'];
                                        include "cus_check.php";//SELECT * FROM `xy_ddsj`
                                        $sql1 = "select * from cdk_wp where cdk LIKE '$sycdk'";//SELECT * FROM `cdk_wp` WHERE `cdk` LIKE 'RR7A1X701J'
                                        $result1 = mysqli_query($root,$sql1);
                                        $Am1 = mysqli_fetch_array($result1);
                                        $syuid=$Am1['uid'];
                                        ?>
                                        <td><?php echo date('Y-m-d H:i:s', $Am['sj']); ?></td>
                                        <td><?php echo $syuid ?></td>
                                        <td><a href="table_basic.html#"><button type="button" class="btn btn-primary btn-xs">封号+轰炸</button></a>
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