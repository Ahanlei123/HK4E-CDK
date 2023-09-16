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
    echo "<script>alert('本页面只有管理员登录之后才能访问！');location.href='index.php';</script>";
    exit;
}
include "cus_check.php";
$sql = "select * from user_information WHERE `admin` != 1";
//建立查找所有用户信息
$result = mysqli_query($root,$sql);
date_default_timezone_set('PRC');

$sql = "select * from web_sz where id LIKE '1'";
$result = mysqli_query($root,$sql);
$Am = mysqli_fetch_array($result);
$sysl = (int)$Am['sl']; 

?>
<body class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>网站设置 <small>网站全局设置</small></h5>
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
                                <label class="col-sm-2 control-label">短信平台</label>

                                <div class="col-sm-10">
                                    <select class="form-control m-b" id='qu' name="account">
                                        <option>短信宝</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">短信账号</label>

                                <div class="col-sm-10">
                                    <input type="text" id="username" name="username" value="<?php echo $Am['dxzh']?>"  class="form-control">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">短信密码</label>

                                <div class="col-sm-10">
                                    <input type="text" id="dxmm" name="dxmm" value="<?php echo $Am['dxmm']?>"  class="form-control">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">短信内容</label>
                                <div class="col-sm-10">
                                    <input type="text" id="dxnr" name="dxnr" value="<?php echo $Am['dxnr']?>"  class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">数据库地址</label>
                                <div class="col-sm-10">
                                    <input type="text" id="sjkdz" name="sjkdz" value="<?php echo $Am['sjkdz']?>"  class="form-control">
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" name="usecdk" id="usecdk" value="getrand" type="submit">保存</button>
                                    <button class="btn btn-white" type="submit">取消</button>
                                </div>
                            </div>
                        </form>
                        <script src="./sweetalert.min.js"></script>
<?php
            if($_POST['username']==''){
                if($_POST['giveid']!=''){
                    echo"<script>swal('保存失败','请填写正确的CDK','warning');</script>";
                }
            }else{
                $dxzh=$_POST['username'];
                $dxmm=$_POST['dxmm'];
                $dxnr=$_POST['dxnr'];
                $sjkdz=$_POST['sjkdz'];
                include "cus_check.php";
                $sql = "update web_sz set dxzh = '$dxzh',dxmm = '$dxmm' ,dxnr = '$dxnr',sjkdz = '$sjkdz' where id = '1'";
	            $result = mysqli_query($root,$sql);
                echo"<script>swal('保存成功','','success');location.href='websz.php';</script>";
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
