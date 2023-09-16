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
                        <h5>注册卡密CDK生成 <small>注册卡密CDK生成</small></h5>
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
                                        <option>3.4剧情服</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div hidden class="form-group">
                                <label class="col-sm-2 control-label">CDK</label>

                                <div class="col-sm-10">
                                    <input type="text" id="username" name="username" class="form-control">
                                </div>
                            </div>
                            <div hidden class="form-group">
                                <label class="col-sm-2 control-label">物品</label>

                                <div class="col-sm-10">
                                    <input type="text" id="giveid" name="giveid" value="201" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">换绑数量</label>
                                <div class="col-sm-10">
                                    <input type="text" id="number" name="number" value="1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">生成数量</label>
                                <div class="col-sm-10">
                                    <input type="text" id="scsl" name="scsl" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" name="usecdk" id="usecdk" value="getrand" type="submit">生成</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
                        </form>
                        <script src="./sweetalert.min.js"></script>
                            <?php
                                if($_POST['number']==''){
                                    if($_POST['giveid']!=''){
                                        echo"<script>swal('生成失败','请填写正确的换绑数量','warning');</script>";
                                        exit;
                                    }
                                }else{
                                    $slsl = intval($_POST['scsl']); 
                                    $qbkm = '\r\n';
                                    include "cus_check.php";
                                    for($i=0; $i<$slsl; $i++){
                                        $data = $namespace;  
                                        $data .= $_SERVER ['REQUEST_TIME'];
                                        $data .= $_SERVER ['HTTP_USER_AGENT'];
                                        $data .= $_SERVER ['SERVER_ADDR'];
                                        $data .= $_SERVER ['SERVER_PORT']; 
                                        $data .= $_SERVER ['REMOTE_ADDR']; 
                                        $data .= $_SERVER ['REMOTE_PORT']; 
                                        $hash = strtoupper ( hash ( 'ripemd128', $uid . $guid . md5 ( $data ) ) );  
                                        $guid = substr ( $hash, 20, 12 ) ;  
                                        $cdk=$guid;
                                        $wp=$_POST['giveid'];
                                        $sl=$_POST['number'];
                                        $bt="注册官服1:1";
                                        $nr="感谢注册官服1:1账号注册成功！";
                                        $sc=$_SESSION['name'];
                                        $sql = "select * from cdk_gf where cdk LIKE '$cdk'";
                                        $result = mysqli_query($root,$sql);
                                        $no = mysqli_num_rows($result);   
                                        $sj = time(); 
                                        if($no){
                                            $i=$i-$i;
                                        }
                                        $sql = "insert into cdk_gf (cdk,wp,sl,bt,nr,uid,sc,sj,zt,bduid) VALUE ('$cdk','$wp','$sl','$bt','$nr','','$sc','$sj','0','')";
                                        $result = mysqli_query($root,$sql);
                                        $qbkm = $qbkm.$guid.'\r\n';
                                    }
                                    echo"<script>swal('生成成功，请手动复制以下卡密','$qbkm','success');</script>";
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
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:15 GMT -->
</html>
