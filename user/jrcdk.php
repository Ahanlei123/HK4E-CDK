<?php  session_start()?>
<!DOCTYPE html>
<html>
<!-- Mirrored from www.zi-han.net/theme/hplus/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:15 GMT -->
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
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>时效CDK生成 <small>时效CDK生成(注意:符号全部用小写的英文符号！)</small></h5>
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
                    <div class="ibox-content">
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">服务器</label>

                                <div class="col-sm-10">
                                    <select class="form-control m-b" id='qu' name="account">
                                        <option>3.4剧情服</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">物品ID(如:201:10000,202:1000)</label>
                                <div class="col-sm-10">
                                    <input type="text" id="giveid" name="giveid" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">开始时间(如:2023-06-21)</label>
                                <div class="col-sm-10">
                                    <input type="text" id="kssj" name="kssj" value="<?php echo date("Y-m-d"); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">结束时间(如:2023-06-26)</label>
                                <div class="col-sm-10">
                                    <input type="text" id="jssj" name="jssj" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">CDK卡密(如:515)</label>
                                <div class="col-sm-10">
                                    <input type="text" id="cdk" name="cdk" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">CDK名称(如:端午)</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" name="usecdk" id="usecdk" value="getrand" type="submit">新增卡密</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
                        </form>
                        <script src="./sweetalert.min.js"></script>
<?php
            if(isset($_POST['usecdk'])) { 
                $lb = $_POST['giveid']; //获取物品ID
                $kssj = $_POST['kssj']; //获取开始时间
                $jssj = $_POST['jssj']; //获取结束时间
                $cdk = $_POST['cdk']; //获取卡密
                $name = $_POST['name']; //获取名称
                include "cus_check.php";
                $sql = "insert into cdk_jr (cdk,kssj,jssj,lb,name) VALUE ('$cdk','$kssj','$jssj','$lb','$name')";
                $result = mysqli_query($root,$sql);
                echo"<script>swal('新增时效卡密成功！','','success');</script>";
            }
?>
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


<!-- Mirrored from www.zi-han.net/theme/hplus/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:15 GMT -->
</html>
