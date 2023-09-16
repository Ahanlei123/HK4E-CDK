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
        <?php
        include "cus_check.php";
        $sql = "select * from cdk_qx where uid LIKE '$UID'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        $hbsl=$Am['sl'];
        if($Am['uid']==$UID){//老权限卡密修复
            echo "<font size='5' color= '#00BFFF'><br>您已开通高级权限！修复白屏和卡死，请务必保持游戏下线</font>";
            $ZQUID=$Am['uid'];
            $ZQZH=$_SESSION['name'];
        }else{
        $ZQZH=$_SESSION['name'];
        $sql = "select * from cdk_qx where uid LIKE '$ZQZH'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        if($Am['uid']==$_SESSION['name']){//新权限卡密修复
            $hbsl=$Am['sl'];
            if($Am['uid']==$ZQZH){
                echo "<font size='5' color= '#00BFFF'><br>您已开通高级权限！修复白屏和卡死，请务必保持游戏下线</font>";
                //$ZQUID=$UID;
                $manager = new MongoDB\Driver\Manager('mongodb://root:vSfNv8mqcspnERzT@数据库地址:27017');
                $where = ['username'=>$ZQZH];
                $options = ['username'=>'','reservedPlayerId'=>'','permissions'=>'','locale'=>'',];
                $query = new MongoDB\Driver\Query($where, $options);
                $cursor = $manager->executeQuery('grasscutter.accounts', $query);
                foreach($cursor as $doc){
                $ZQUID=$doc->_id;
                }
                $ZQZH=$_SESSION['name'];
            }
        }
        }
        ?>
	        <input hidden type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	        <br>
	        <input type="text" name="getcdk" id="getcdk" class="form-control" value="<?php if($Am['cdk']==""){ } else{ echo $Am['cdk']; } ?>" placeholder="请输入购买的高级权限的CDK"> <span class="help-block m-b-none">请输入购买的CDK</span>
	        
	        <button type="submit" name="usecdk" id="usecdk" class="btn btn-primary" value="getrand"> <?php if($Am['uid']==$UID){ echo"权限换绑"; } else{ echo"兑换卡密"; } ?></button>
	        </a>
	        <button type="submit" name="ktqx" id="ktqx" class="btn btn-primary"  value="getrand"> 购买卡密</button>
	        </a>
	        <button type="submit" name="home" id="home" class="btn btn-primary"  value="getrand"> 使用教程</button>
	        </a>
	        <button type="submit" name="xf" id="xf" class="btn btn-primary"  value="getrand"> 修复白屏(会重置游戏)</button>
	        </a>
	        <br>
	        <font size='3' color= '#00BFFF'><br>官服1:1注册卡密获取：hhttps://pay1.mihayou.fun?code=YT0xJmI9OQ%3D%3D</font>
	        <font size='3' color= '#00BFFF'><br>高级权限卡密获取：http://pay1.mihayou.fun?code=YT0xJmI9MQ%3D%3D</font>
</font>
<script src="./sweetalert.min.js"></script>
<?php
if(isset($_POST["home"])){
header("Location: https://mp4.yssf66.top/watch/%E6%9D%83%E9%99%90%E4%BD%BF%E7%94%A8%E6%95%99%E7%A8%8B-mp4_ySbL5Vq5F5a93aq.html"); 
}
if(isset($_POST["ktqx"])){
header("Location: https://pay1.mihayou.fun?code=YT0xJmI9MQ%3D%3D"); 
}
if($user=($_POST["username"])){
    $setUID=$_POST["set_UID"];
    $usecdk=($_POST["getcdk"]);
    $admin=($_POST["admincdk"]);
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
        }elseif($permissions=='mojo.console'){
            $permissions="高级权限";
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
    
        include "cus_check.php";
        $sql = "select * from cdk_qx where uid LIKE '$uid'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        
    if(isset($_POST["usecdk"])){
        $sql = "select * from cdk_qx where cdk LIKE '$usecdk'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        $sysl = (int)$Am['sl']; 
        if($Am['zt']=="1"){
            $hbuid = $Am['uid'];
	        if($ownerid == ""){
            echo"<script>swal('请先登录游戏并创建好角色！','','warning');</script>";
            }elseif($Am['uid']===$_SESSION['name']){
                $user = $_SESSION['name'];
	            $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'补发高级权限成功','content'=>'感谢您的赞助，目前系统已为你开通高级权限！请勿刷取你没见过的物品或角色，可能会导致白屏！','sender'=>'Lawnmower'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval($cdk_give),'itemCount'=>intval($cdk_number),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
                $manager->executeBulkWrite('grasscutter.mail', $bulk); 
                $bulk = new MongoDB\Driver\BulkWrite;
                $filter = ['username'=>$user];
                $admin=array("mojo.console","server.spawn","player.*");//配置权限
                $newObj = ['$set'=>['username'=>$username,'permissions'=>$admin]];
                $bulk->update($filter, $newObj);
                $manager->executeBulkWrite('grasscutter.accounts',$bulk);
                echo"<script>swal('补发权限成功！请到务必重新登录游戏励！','','success');</script>";
            }else{
                if($sysl > 0){
                //$sysl = $sysl -1;
                //$sql = "update cdk_qx set uid = '$UID',sl = '$sysl' where cdk = '$usecdk'";
	            //$result = mysqli_query($root,$sql);
	            //$bulk = new MongoDB\Driver\BulkWrite;
                //$bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'开通高级权限成功','content'=>'感谢您的赞助，目前系统已为你开通高级权限！请勿刷取你没见过的物品或角色，可能会导致白屏！','sender'=>'Lawnmower'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval($cdk_give),'itemCount'=>intval($cdk_number),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
                //$manager->executeBulkWrite('grasscutter.mail', $bulk); 
                //$bulk = new MongoDB\Driver\BulkWrite;
                //$filter = ['username'=>$user];
                //$admin=array("mojo.console","server.spawn","player.*");//配置权限
                //$newObj = ['$set'=>['_id'=>$UID,'username'=>$username,'permissions'=>$admin]];
                //$bulk->update($filter, $newObj);
                //$manager->executeBulkWrite('grasscutter.accounts',$bulk);
                
                //开始换绑
                //$bulk = new MongoDB\Driver\BulkWrite;
                //$filter = ['username'=>$ZQZH];
                //$admin=array($ZQZH);
                //$newObj = ['$set'=>['_id'=>$ZQUID,'username'=>$ZQZH,'permissions'=>$admin]];
                //$bulk->update($filter, $newObj);
                //$manager->executeBulkWrite('grasscutter.accounts',$bulk);
                //echo"<script>swal('换绑成功！请到务必重新登录游戏励！','','success');</script>";
                echo"<script>swal('CDK以被他人使用，如你是购买的卡密，请联系管理员查询！','','warning');</script>";
                }else{
                //echo"<script>swal('换绑次数不足，无法换绑！','','warning');</script>";
                //echo"<script>swal('管理员已关闭换绑功能，无法换绑，如白屏请直接修复！','','warning');</script>";
                echo"<script>swal('CDK以被他人使用，如你是购买的卡密，请联系管理员查询！','','warning');</script>";
                }
            }
        }elseif($Am['zt']==""){
            echo"<script>swal('CDK错误，请重新输入！','','warning');</script>";
        }elseif($ownerid==""){
            echo"<script>swal('请先登录游戏并创建好角色！','','warning');</script>";
        }else{
            //$bulk = new MongoDB\Driver\BulkWrite;
		    //$filter = ['_id'=>$cdk_id];
            //$newObj = ['$set'=>['_id'=>$cdk_id,'id'=>$cdkid,'start'=>'已使用','give'=>$cdk_give,'number'=>$cdk_number,'use_user'=>$user,'use_UID'=>$UID]];
            //$bulk->update($filter, $newObj);
	        //$manager->executeBulkWrite('grasscutter.cdk',$bulk);
	        //UPDATE `cdk_wp` SET `uid` = '10005', `zt` = '1' WHERE ` `.`id` = 8;
	        $ktzh= $_SESSION['name'];
	        $sql = "update cdk_qx set uid = '$ktzh',zt = '1' where cdk = '$usecdk'";
	        $result = mysqli_query($root,$sql);
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'开通高级权限成功','content'=>'感谢您的赞助，目前系统已为你开通高级权限！请勿刷取你没见过的物品或角色，可能会导致白屏！','sender'=>'Lawnmower'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval($cdk_give),'itemCount'=>intval($cdk_number),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
            $manager->executeBulkWrite('grasscutter.mail', $bulk); 
            $bulk = new MongoDB\Driver\BulkWrite;
            $filter = ['username'=>$user];
            $admin=array("mojo.console","server.spawn","player.*");
            $newObj = ['$set'=>['username'=>$username,'permissions'=>$admin]];
            $bulk->update($filter, $newObj);
            $manager->executeBulkWrite('grasscutter.accounts',$bulk);
            echo"<script>swal('权限开通成功!，重启游戏后,请观看视频教程里的，权限使用教程!请到务必重新登录游戏励！','','success');</script>";
        }
    }
    if(isset($_POST["bf"])){
        $sql = "select * from cdk_qx where cdk LIKE '$usecdk'";
        $result = mysqli_query($root,$sql);
        $Am = mysqli_fetch_array($result);
        $sysl = (int)$Am['sl']; 
        if($Am['zt']=="1"){
                $UID = $Am['uid'];
                $user = $_SESSION['name'];
	            $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'补发高级权限成功','content'=>'感谢您的赞助，目前系统已为你补发高级权限！请勿刷取你没见过的物品或角色，可能会导致白屏！','sender'=>'Lawnmower'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval($cdk_give),'itemCount'=>intval($cdk_number),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
                $manager->executeBulkWrite('grasscutter.mail', $bulk); 
                $bulk = new MongoDB\Driver\BulkWrite;
                $filter = ['username'=>$user];
                $admin=array("mojo.console","server.spawn","player.*");//配置权限
                $newObj = ['$set'=>['_id'=>$UID,'username'=>$username,'permissions'=>$admin]];
                $bulk->update($filter, $newObj);
                $manager->executeBulkWrite('grasscutter.accounts',$bulk);
                echo"<script>swal('补发权限成功！','','success');</script>";
        }else{
            echo"<script>swal('CDK错误，请重新输入！','','warning');</script>";
        }
}
    if(isset($_POST["xf"])){
            $sql = "select * from cdk_qx where cdk LIKE '$usecdk'";
            $result = mysqli_query($root,$sql);
            $Am = mysqli_fetch_array($result);
            $sysl = (int)$Am['sl']; 
            if($Am['zt']=="1"){
                //$UID = $Am['uid'];
                $user = $_SESSION['name'];
                $bulk = new MongoDB\Driver\BulkWrite;
                $filter = ['_id' => $ownerid];
                $option = ['limit' => 0];
                $bulk->delete($filter, $option);
                $manager->executeBulkWrite('grasscutter.players',$bulk);
                $bulk = new MongoDB\Driver\BulkWrite;
                $ZQZH = $_POST["username"];
                $filter = ['username'=>$ZQZH];
                $newObj = ['$set'=>['_id'=>$ZQUID,'reservedPlayerId'=>"0"]];
                if($ZQUID==""){
                    echo"<script>swal('未查询到相关UID','','warning');</script>";
                }else{
                    $bulk->update($filter, $newObj);
                    $manager->executeBulkWrite('grasscutter.accounts',$bulk);
                    echo"<script>swal('修复成功,如未成功，请下游戏后在点修复，然后在等待5分钟后上游戏！','','success');</script>";
                }
                
        }else{
            echo"<script>swal('CDK错误，请重新输入！','','warning');</script>";
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
