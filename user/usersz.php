<?php  include ("./conn.php");?>
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
<body class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>账号设置 <small>当前账号UID:<?php echo $UID1?></small></h5>
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
                                        <option>原神1区(数据互通)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">世界等级</label>
                                <div class="col-sm-10">
                                    <input hidden type="text" id="username" name="username"  value="<?php echo $UID1?>" placeholder="请输入账号" maxlength="30">
                                    <input type="text" id="sjdj" name="sjdj" value="<?php echo $sjdj?>" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" name="szsjdj" id="szsjdj" value="getrand" type="submit">设置世界等级</button>
                                    <button class="btn btn-primary" name="qkbb" id="qkbb" value="getrand" type="submit">清空游戏背包</button>
                                    <button class="btn btn-primary" name="jsdt" id="jsdt" value="getrand" type="submit">解锁游戏地图</button>
                                    <button class="btn btn-primary" name="jssy" id="jssy" value="getrand" type="submit">解锁深渊12层</button>
                                    <button class="btn btn-primary" name="jsjx" id="jsjx" value="getrand" type="submit">解锁纪行50级</button>
                                </div>
                            </div>
                        </form>
                        <script src="./sweetalert.min.js"></script>
                            <?php
                            echo"<script>swal('本页面已失效','请直接查看游戏内新手邮件 获取功能','warning');</script>";
            if($_POST['username']==''){
                if($_POST['giveid']!=''){
                echo"<script>swal('解锁失败没有查询到相关账号数据$user','','warning');</script>";
                }
            }else{
            if(isset($_POST["szsjdj"])){
                $user=$UID1;
                $xyszdj=$_POST["sjdj"];
                if($user==""){
                    echo"<script>swal('设置失败没有查询到相关账号数据$user','','warning');</script>";
                }else{
                    $qz = '"type":"CMD","data":"';
                    $hz = '"}';
                    $sj = time();
                    $cmd = $qz."prop @$UID1 wl $xyszdj".$hz;
                    $js = '设置世界等级:'.$xyszdj.'级';
                    $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
                    $result = mysqli_query($root,$sql);
                    echo"<script>swal('以设置世界等级 $xyszdj 级','','success');</script>";
                }
            }
            if(isset($_POST["qkbb"])){
                $user=$UID;
                if($user==""){
                    echo"<script>swal('清空失败没有查询到相关账号数据$user','','warning');</script>";
                }else{
                    $qz = '"type":"CMD","data":"';
                    $hz = '"}';
                    $sj = time();
                    $cmd = $qz."clear @$UID1 lv90 r5 5*".$hz;
                    $js = '清空背包';
                    $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
                    $result = mysqli_query($root,$sql);
                    echo"<script>swal('背包已清空','','success');</script>";
                }
            }
            if(isset($_POST["jsdt"])){
                $user=$UID;
                if($user==""){
                    echo"<script>swal('解锁失败没有查询到相关账号数据$user','','warning');</script>";
                }else{
                    $qz = '"type":"CMD","data":"';
                    $hz = '"}';
                    $sj = time();
                    $cmd = $qz."prop @$UID1 unlockmap 1".$hz;
                    $js = '解锁地图';
                    $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
                    $result = mysqli_query($root,$sql);
                    echo"<script>swal('地图已解锁','','success');</script>";
                }
            }
            if(isset($_POST["jssy"])){
                $user=$UID;
                if($user==""){
                    echo"<script>swal('解锁失败没有查询到相关账号数据$user','','warning');</script>";
                }else{
                    $qz = '"type":"CMD","data":"';
                    $hz = '"}';
                    $sj = time();
                    $cmd = $qz."prop @$UID1 ut 12".$hz;
                    $js = '解锁深渊12层';
                    $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
                    $result = mysqli_query($root,$sql);
                    echo"<script>swal('解锁深渊12层成功','','success');</script>";
                }
            }
            if(isset($_POST["jsjx"])){
                $user=$UID;
                if($user==""){
                    echo"<script>swal('解锁失败没有查询到相关账号数据$user','','warning');</script>";
                }else{
                    $qz = '"type":"CMD","data":"';
                    $hz = '"}';
                    $sj = time();
                    $cmd = $qz."prop @$UID1 bp 50".$hz;
                    $js = '解锁纪行50级';
                    $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
                    $result = mysqli_query($root,$sql);
                    echo"<script>swal('解锁纪行50级成功','','success');</script>";
                }
            }
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
