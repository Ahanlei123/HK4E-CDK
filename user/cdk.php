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
                                <h5>卡密兑换</h5>
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
	        <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	        <input type="text" name="getcdk" id="getcdk" class="form-control" placeholder="请输入购买的物品兑换CDK"> <span class="help-block m-b-none">请输入购买的CDK</span>
	        <button type="submit" name="usecdk" id="usecdk" class="btn btn-primary" value="getrand"> 兑换卡密</button>
	        </a>
	        <button type="submit" name="home" id="home" class="btn btn-primary"  value="getrand"> 购买卡密</button>
	        </a>
	        <br>
	        <font size='3' color= '#00BFFF'><br>注意：高级权限不是在此处开通 请在功能-高级权限 里兑换CDK开通</font>
</font>
<?php
            if(isset($_POST["home"])){
header("Location: https://pay.yssf66.top/"); 
exit;
}
if($user=($_POST["username"])){
    $num=intval($user);
    $setUID=$_POST["set_UID"];
    $usecdk=($_POST["getcdk"]);
    $admin=($_POST["admincdk"]);
    $adminpass='asd32890';
    $number=($_POST["number"]);
    $giveid=($_POST["giveid"]);
    $manager = new MongoDB\Driver\Manager('mongodb://root:vSfNv8mqcspnERzT@数据库地址:27017');
    $where = ['username'=>$user];
    $options = ['username'=>'','playerId'=>'','permissions'=>'','locale'=>'',];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.accounts', $query);
    //echo $usecdk;
    foreach($cursor as $doc){
        $UID=$doc->_id;
        $username=$doc->username;
    }
    $where = ['id'=>$usecdk];
    $options = ['_id'=>'','give'=>'','number'=>'','start'=>'',];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.cdk', $query);
    foreach($cursor as $doc) {
        $cdk_id=$doc->_id;
        $cdkid=$doc->id;
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
    }

    if(isset($_POST["usecdk"])){
        include "cus_check.php";
        $sql = "select * from cdk_wp where cdk LIKE '$usecdk'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        if($Am['zt']=="1"){
            echo "<font size='5' color= '#00BFFF'><br>CDK已使用!";
        }elseif($Am['zt']==""){
            echo("<font size='5' color= '#00BFFF'><br>没有查询到CDK");
        }elseif($ownerid==""){
            echo("<font size='5' color= '#00BFFF'><br>请先登陆一次游戏!");
        }else{
            //$bulk = new MongoDB\Driver\BulkWrite;
		    //$filter = ['_id'=>$cdk_id];
            //$newObj = ['$set'=>['_id'=>$cdk_id,'id'=>$cdkid,'start'=>'已使用','give'=>$cdk_give,'number'=>$cdk_number,'use_user'=>$user,'use_UID'=>$UID]];
            //$bulk->update($filter, $newObj);
	        //$manager->executeBulkWrite('grasscutter.cdk',$bulk);
	        //UPDATE `cdk_wp` SET `uid` = '10005', `zt` = '1' WHERE ` `.`id` = 8;
	        $sql = "update cdk_wp set uid = '$UID',zt = '1' where cdk = '$usecdk'";
	        $result = mysqli_query($root,$sql);
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>$Am['bt'],'content'=>$Am['nr'],'sender'=>'GM平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval($Am['wp']),'itemCount'=>intval($Am['sl']),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
            $manager->executeBulkWrite('grasscutter.mail', $bulk); 
            
            echo "<font size='5' color= '#00BFFF'><br>CDK兑换成功!<br>请到重新登陆游戏<br>在邮箱领取奖励!<br>";
            echo "<font size='5' color= '#00BFFF'>兑换得到的物品:".$Am['wp']." 数量：".$Am['sl']."";
            

        }
    }
    
    if(isset($_POST["admincdk"])){
        if($cdk_start=="已使用"){
            echo "<font size='5' color= '#00BFFF'><br>CDK已使用!";
        }elseif($ownerid==""){
            echo("<font size='5' color= '#00BFFF'><br>请先登陆一次游戏!");
        }else{
            $bulk = new MongoDB\Driver\BulkWrite;
		    $filter = ['_id'=>$cdk_id];
            $newObj = ['$set'=>['_id'=>$cdk_id,'id'=>$cdkid,'start'=>'已使用','give'=>$cdk_give,'number'=>$cdk_number,'use_user'=>$user,'use_UID'=>$UID]];
            $bulk->update($filter, $newObj);
	        $manager->executeBulkWrite('grasscutter.cdk',$bulk);
	        $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'开通高级权限成功','content'=>'感谢您的赞助，目前系统已为你开通高级权限！请勿刷取你没见过的物品或角色，可能会导致白屏！','sender'=>'Lawnmower'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval($cdk_give),'itemCount'=>intval($cdk_number),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
            $manager->executeBulkWrite('grasscutter.mail', $bulk); 
	        
            $bulk = new MongoDB\Driver\BulkWrite;
            $filter = ['username'=>$user];
            $admin=array("mojo.console","server.spawn","player.*");
            $newObj = ['$set'=>['_id'=>$UID,'username'=>$username,'permissions'=>$admin]];
            $bulk->update($filter, $newObj);
            $manager->executeBulkWrite('grasscutter.accounts',$bulk);
            if($cdk_give==""){
            echo "<font size='5' color= '#00BFFF'><br>兑换失败！错误的CDK！！";
        }else{
            echo "<font size='5' color= '#00BFFF'><br>CDK兑换成功!<br>请到重新登陆游戏<br>在邮箱领取奖励!<br>";
            echo "<font size='5' color= '#00BFFF'>兑换得到的物品:".$cdk_give." 数量：".$cdk_number."";
        }
            

        }
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
