<?php  session_start();?>
<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/toastr_notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:59 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title></title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

</head>
    <?php

    
    if(!isset($_SESSION['name']) or !$_SESSION['name'])
    {
        echo "<script>alert('本页面只有登录之后才能访问！');location.href='index.php';</script>";
        exit;
    }
    include "cus_check.php";   //导入用户信息
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    
    //查什么
    $result = mysqli_query($root,$sql); //执行查找
    $num = mysqli_num_rows($result);    //判断查找结果
    if(!$num)
    {
        echo "<script>alert('该用户不存在!');history.back();</script>";
        exit;
    }
    else{
        $infor_Array = mysqli_fetch_array($result,1);
        //根据查找结果指向的位置，取得一行关联数组或者字数组
    $user=$_SESSION['name'];
    $setUID=$_POST["set_UID"];
    $usecdk=($_POST["getcdk"]);
    $admin=($_POST["admincdk"]);
    $adminpass='114514';
    $number=($_POST["number"]);
    
    $manager = new MongoDB\Driver\Manager('mongodb://root:vSfNv8mqcspnERzT@数据库地址:27017');
    $where = ['username'=>$user];
    $options = ['username'=>'','reservedPlayerId'=>'','permissions'=>'','locale'=>'',];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.accounts', $query);
    foreach($cursor as $doc){
        $UID=$doc->_id;
        $username=$doc->username;
        $permissions=$doc->permissions['0'];
        $locale=$doc->locale;
        if($permissions==""){
            $permissions="无权限";
        }elseif($permissions=='*'){
            $permissions="所有权限";
        }
    }
    $where = ['id'=>$usecdk];
    $options = ['_id'=>'','give'=>'','number'=>'','start'=>'',];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.cdk', $query);
    foreach($cursor as $doc) {
        $cdk_id=$doc->_id;
        $cdk_give=$doc->give;
        $cdk_number=$doc->number;
        $cdk_start=$doc->start;
    }
    $where = ['accountId'=>$UID];
    $options = ['_id'=>'','nickname'=>'','godmode'=>''];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.players', $query);
    foreach($cursor as $doc) {
        $ownerid=$doc->_id;
        $playername=$doc->nickname;
        $godmode=$doc->godmode;
        if($godmode==false){
            $godmode="关闭";
        }elseif($godmode==true){
            $godmode="开启";
        }else{
            $godmode="关闭";
        }
    }
    $where = ['_id'=>'Account'];
    $options = ['count'=>''];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.counters', $query);
        
        
        if($user==""){
	    	//echo "<font size='4' color= '#00BFFF'><br>用户名不能为空!<br>";
	    }elseif($UID==""){
	        //echo("<font size='4' color= '#00BFFF'><br>用户不存在!".$user);
	    }else{
           // echo("<font size='4' color= '#00BFFF'><br>用户UID:".$UID);
            //echo("<font size='4' color= '#00BFFF'><br>用户名".$username);
            //echo("<font size='4' color= '#00BFFF'><br>用户权限 ".$permissions);
            //echo("<font size='4' color= '#00BFFF'><br>用户语言".$locale);
            //echo("<font size='4' color= '#00BFFF'><br>上帝模式".$godmode);
	        }
    }

    
    ?>
<body class="gray-bg">
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>权限开通</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="./gjqx.php">权限开通</a>
                                        </li>
                                        <li><a href="./cdk.php">卡密兑换</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form action="" method="post">
        
	       
	       <input type="text" id="username" name="username" class="form-control" value="" placeholder="请输入UID"> <span class="help-block m-b-none">请输入需要查询的CDK</span>
	        <br>
	       
	        <button type="submit" name="usecdk" id="usecdk" class="btn btn-primary" value="getrand"> 查询账号</button>
	        </a>
	        <br>
</font>
<script src="./sweetalert.min.js"></script>
<?php
if(isset($_POST["home"])){
header("Location: https://mp4.yssf66.top/watch/%E6%9D%83%E9%99%90%E4%BD%BF%E7%94%A8%E6%95%99%E7%A8%8B-mp4_ySbL5Vq5F5a93aq.html"); 
}

if($user=($_POST["username"])){
    $setUID=$_POST["set_UID"];
    $usecdk=($_POST["getcdk"]);
    $admin=($_POST["admincdk"]);
    $adminpass='asd32890';
    $number=($_POST["number"]);
    $manager = new MongoDB\Driver\Manager('mongodb://root:vSfNv8mqcspnERzT@数据库地址:27017');
    $where = ['accountId'=>$user];
    $options = ['accountId'=>'','_id'=>'','nickname'=>'',];
    //$options = ['username'=>'','reservedPlayerId'=>'','permissions'=>'','locale'=>'',];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.players', $query);
    foreach($cursor as $doc){
        $UID=$doc->_id;
        $yxm=$doc->nickname;
    }
    
    //$where = ['_id'=>$UID];
    //$where=array("_id"=>new MongoId($_GET['id']));
    $params['id']=$UID;
    //$where['_id']=new MongoDB\BSON\ObjectId($params['id']);;
    //$where=array("_id"=>new MongoId($params['id']));
    //$where=array("_id"=>new MongoId($UID));
    //$where=array("_id"=>new $UID);
    $options = ['_id'=>'','username'=>'','permissions'=>'',];
    //$options = ['username'=>'','reservedPlayerId'=>'','permissions'=>'','locale'=>'',];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.accounts', $query);
    foreach($cursor as $doc){
        //$UID=$doc->_id;
        $yhm=$doc->username;
    }
    
    $where = ['accountId'=>$UID];
    $options = ['_id'=>'','nickname'=>'','godmode'=>''];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.players', $query);
    foreach($cursor as $doc) {
        $ownerid=$doc->_id;
        $playername=$doc->nickname;
        $godmode=$doc->godmode;
        if($godmode==false){
            $godmode="关闭";
        }elseif($godmode==true){
            $godmode="开启";
        }else{
            $godmode="关闭";
        }
    }
    
        include "cus_check.php";
        $sql = "select * from cdk_qx where uid LIKE '$uid'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        
    if(isset($_POST["usecdk"])){
        echo"<script>swal('批次：$UID  用户名：$yhm 游戏名：$yxm','','success');</script>";
        $sql = "select * from cdk_qx where cdk LIKE '$usecdk'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        $sysl = (int)$Am['sl']; 
        
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
    <script src="js/content.min.js?v=1.0.0"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/toastr_notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:00 GMT -->
</html>
