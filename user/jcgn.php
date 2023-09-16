<?php  include ("./conn.php");?>
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
<body class="gray-bg">
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>基础功能</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="tabs_panels.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="tabs_panels.html#">选项1</a>
                                </li>
                                <li><a href="tabs_panels.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <p>原神GM版 基础功能目前以支持：（请直接查看游戏内新手邮件）</p>
                        <ul>
                            <li>当前栏目项目已完全转移至游戏内控制台，请查看游戏内邮件</li>
                            <li>如未找到游戏内普通用户控制台邮件，请补发邮件</li>
                            
                        </ul>
                        <p>视频教程：<a href="https://mp4.yssf66.top" target="_blank">https://mp4.yssf66.top/</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
                
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>补发邮件：<a href="" target="_blank">补发游戏普通用户控制台邮件</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="bfyj" id="bfyj" class="btn btn-primary"  value="getrand"> 补发邮件</button>
	                    <br></a>
                        </font>
                    </div>
                </div>
                
                <div hidden class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>签到奖励：<a href="" target="_blank">原石50000个</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="sign" id="sgin" class="btn btn-primary"  value="getrand"> 每日签到</button>
	                    <br></a>
                        </font>
                    </div>
                </div>
                
                <div hidden class="ibox float-e-margins">
                    <div class="ibox-content">
                       <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>新人福利：<a href="" target="_blank">原石10000个 创世结晶1000个</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="xsfl" id="sgin" class="btn btn-primary" value="getrand"> 新人福利</button>
	                    <br></a>
                        </font>
                    </div>
                </div>
                
                <div hidden class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>领取角色：<a href="" target="_blank">胡桃 钟离 可莉 雷电将军</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="lqjs" id="lqjs" class="btn btn-primary"  value="getrand"> 领取角色</button>
	                    <br></a>
                        </font>
                    </div>
                </div>
                
                <div hidden class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>领取圣遗物：<a href="" target="_blank">迷误者之灯 翠蔓的智者 月桂的宝冠 迷宫的游人 贤智的定期</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="lqsyw" id="lqsyw" class="btn btn-primary"  value="getrand"> 领取圣遗物</button>
	                    <br></a>
                        </font>
                    </div>
                </div>
                
                
                <div hidden class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>国庆礼包：<a href="" target="_blank">原石888888 创世结晶88888 阅历288888</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="gqlb" id="gqlb" class="btn btn-primary"  value="getrand"> 领取礼包</button>
	                    <br></a>
                        </font>
                    </div>
                </div>
                
                
                <div hidden class="ibox float-e-margins">
                    <div class="ibox-content">
                        <p class="m-t">当前绑定UID：<a href="#" target="_blank"><?php echo $UID1?></a>
                        </p>
                        <p>3.1更新礼包：<a href="" target="_blank">原石588888 创世结晶188888 阅历288888</a>
                        </p>
                        <form action="" method="post">
	                    <input hidden  type="text" id="username" name="username"  value="<?php echo $username?>" placeholder="请输入账号" maxlength="30">
	                    <button type="submit" name="gxlb" id="gxlb" class="btn btn-primary"  value="getrand"> 领取礼包</button>
	                    <br></a>
                        </font>
                    </div>
                </div>
                                
<script src="./sweetalert.min.js"></script>
<?php
//echo"<script>swal('本页面已失效','请直接查看游戏内新手邮件 获取功能','warning');</script>";
if(isset($_POST["bfyj"]))
{
    $main=new config6();
    call_user_func([$main,"bfyj"]);
}

class config6
{
    public function bfyj()
    {
    include 'lbconfig.php';
	$now=date('Y-m-d');
    if($ownerid==""){
		echo"<script>swal('当前用户未登录过游戏，请登录后再试！','','warning');</script>";
    }elseif($date<$now){
		$bulk = new MongoDB\Driver\BulkWrite;
		$content = '如需开通高级权限可联系群主 或者前往自动发卡地址 赞助15元 获取卡密，然后登录GM普通兑换卡密 \n高级权限支持刷各种满级满命角色 变态圣遗物\n开通高级权限:\n<type="browser" text="自动发卡" href="http://pay.yssf66.top?code=YT0xJmI9MQ%3D%3D"/>\n解锁地图:(各种礼包领取 免费角色 免费圣遗物)\n<type="webview" text="解锁地图" href="https://gm.yssf66.top/test.php"/>';
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'普通用户网站控制台','content'=>$content,'sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('201'),'itemCount'=>intval('5'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
            $manager->executeBulkWrite('grasscutter.mail', $bulk); 
             echo"<script>swal('补发成功！请到重新登陆游戏，在邮箱查看控制台邮件！请到务必重新登录游戏励！','','success');</script>";
		if($date==""){
            $bulk = new MongoDB\Driver\BulkWrite;
	        $bulk->insert(['date'=>$now,'accountId'=>$UID]);
		    $manager->executeBulkWrite('grasscutter.sign', $bulk);
		}else{
    		$bulk = new MongoDB\Driver\BulkWrite;
	    	$bulk->update(['accountId'=>$UID],
    		['$set'=>['year'=>intval(date('Y')),'month'=>intval(date('m')),'day'=>intval(date('d')),'accountId'=>intval($signUID)]]);
		    $manager->executeBulkWrite('grasscutter.sign',$bulk);
		    }
	    }else{
	        echo"<script>swal('您进日已补发过了，请勿重复补发！','','warning');</script>";
	        }
        }
    }
    
if(isset($_POST["sign"]))
{
    $main=new config1();
    call_user_func([$main,"sign"]);
}


class config1
{
    public function sign()
    {
    include 'lbconfig.php';
	$now=date('Y-m-d');
    if($ownerid==""){
		echo"<script>swal('当前用户未登录过游戏，请登录后再试！','','warning');</script>";
    }elseif($date<$now){
		$bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'每日签到','content'=>'签到奖励','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('201'),'itemCount'=>intval('50000'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
            $manager->executeBulkWrite('grasscutter.mail', $bulk); 
             echo"<script>swal('签到成功！请到重新登陆游戏，在邮箱领取奖励！请到务必重新登录游戏励！','','success');</script>";
		if($date==""){
            $bulk = new MongoDB\Driver\BulkWrite;
	        $bulk->insert(['date'=>$now,'accountId'=>$UID]);
		    $manager->executeBulkWrite('grasscutter.sign', $bulk);
		}else{
    		$bulk = new MongoDB\Driver\BulkWrite;
	    	$bulk->update(['accountId'=>$UID],
    		['$set'=>['year'=>intval(date('Y')),'month'=>intval(date('m')),'day'=>intval(date('d')),'accountId'=>intval($signUID)]]);
		    $manager->executeBulkWrite('grasscutter.sign',$bulk);
		    }
	    }else{
	        echo"<script>swal('您进日已签过到了，请勿重复签到！','','warning');</script>";
	        }
        }
    }

if(isset($_POST["xsfl"]))
{
    $main=new config();
    call_user_func([$main,"xsfl"]);
}

class config
{
    public function xsfl()
    {
    include 'lbconfig.php';
	$now=date('领取成功');
    if($ownerid==""){
		echo"<script>swal('当前用户未登录过游戏，请登录后再试！','','warning');</script>";
    }elseif($date1<$now){
		$bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利1','content'=>'新手福利邮件1-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('203'),'itemCount'=>intval('18888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利2','content'=>'新手福利邮件2-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('201'),'itemCount'=>intval('188888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利3','content'=>'新手福利邮件3-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('102'),'itemCount'=>intval('288888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利4','content'=>'新手福利邮件4-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('202'),'itemCount'=>intval('2888888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利5','content'=>'新手福利邮件5-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('301'),'itemCount'=>intval('888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利6','content'=>'新手福利邮件6-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('302'),'itemCount'=>intval('888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利7','content'=>'新手福利邮件7-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('303'),'itemCount'=>intval('888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利8','content'=>'新手福利邮件8-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('304'),'itemCount'=>intval('888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利9','content'=>'新手福利邮件9-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('305'),'itemCount'=>intval('888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利10','content'=>'新手福利邮件10-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('306'),'itemCount'=>intval('888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'新手福利11','content'=>'新手福利邮件11-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('307'),'itemCount'=>intval('888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
            $manager->executeBulkWrite('grasscutter.mail', $bulk); 
            echo"<script>swal('礼包领取成功!请到重新登陆游戏，在邮箱领取奖励!请到务必重新登录游戏励！','','success');</script>";
		if($date==""){
            $bulk = new MongoDB\Driver\BulkWrite;
	        $bulk->insert(['date'=>$now,'accountId'=>$UID,'use_user'=>$user]);
		    $manager->executeBulkWrite('grasscutter.xsfl', $bulk);
		}else{
    		$bulk = new MongoDB\Driver\BulkWrite;
	    	$bulk->update(['accountId'=>$UID],
    		['$set'=>['year'=>intval(date('领取成功')),'accountId'=>intval($xsflUID),'use_user'=>intval($user)]]);
		    $manager->executeBulkWrite('grasscutter.xsfl',$bulk);
		    }
	    }else{
	        echo"<script>swal('您已经领取过了当前礼包！','','warning');</script>";
	        }
        }
    }
    
    
    
    
    
//3.1更新礼包
    if(isset($_POST["gxlb"]))
{
    $main=new config2();
    call_user_func([$main,"gxlb"]);
}

class config2
{
    public function gxlb()
    {
    include 'lbconfig.php';
	$now=date('领取成功');
    if($ownerid==""){
		echo"<script>swal('当前用户未登录过游戏，请登录后再试！','','warning');</script>";
    }elseif($date3<$now){
		$bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'3.1更新礼包1','content'=>'3.1更新礼包1-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('203'),'itemCount'=>intval('188888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'3.1更新礼包2','content'=>'3.1更新礼包2-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('201'),'itemCount'=>intval('588888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'3.1更新礼包3','content'=>'3.1更新礼包3-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM管理平台'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('102'),'itemCount'=>intval('288888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
            $manager->executeBulkWrite('grasscutter.mail', $bulk); 
            echo"<script>swal('礼包领取成功!请到重新登陆游戏，在邮箱领取奖励!请到务必重新登录游戏励！','','success');</script>";
		if($date==""){
            $bulk = new MongoDB\Driver\BulkWrite;
	        $bulk->insert(['date'=>$now,'accountId'=>$UID,'use_user'=>$user]);
		    $manager->executeBulkWrite('grasscutter.gxlb', $bulk);
		}else{
    		$bulk = new MongoDB\Driver\BulkWrite;
	    	$bulk->update(['accountId'=>$UID],
    		['$set'=>['year'=>intval(date('领取成功')),'accountId'=>intval($gxlbUID),'use_user'=>intval($user)]]);
		    $manager->executeBulkWrite('grasscutter.gxlb',$bulk);
		    }
	    }else{
	        echo"<script>swal('您已经领取过了当前礼包！','','warning');</script>";
	        }
        }
    }
    
//国庆礼包
    if(isset($_POST["gqlb"]))
{
    $main=new config3();
    call_user_func([$main,"gqlb"]);
}

class config3
{
    public function gqlb()
    {
    include 'lbconfig.php';
	$now=date('领取成功');
    if($ownerid==""){
		echo"<script>swal('当前用户未登录过游戏，请登录后再试！','','warning');</script>";
    }elseif($date2<$now){
		$bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'国庆礼包1','content'=>'国庆礼包1-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('203'),'itemCount'=>intval('88888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'国庆礼包2','content'=>'国庆礼包2-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('201'),'itemCount'=>intval('888888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
        $bulk->insert(['ownerUid'=>intval($ownerid),'mailContent'=>['_t'=>'MailContent','title'=>'国庆礼包3','content'=>'国庆礼包3-如需开通高级权限可赞助群主15元开通高级控制台权限，操作简单支持刷各种物品，支持各种变态圣遗物，售后群：781235395','sender'=>'GM'],'itemList'=>['0'=>['_t'=>'MailItem','itemId'=>intval('102'),'itemCount'=>intval('288888'),'itemLevel'=>0]],'sendTime'=>time(),'expireTime'=>time()+2592000,'importance'=>0,'isRead'=>false,'isAttachmentGot'=>false,'stateValue'=>1]);
            $manager->executeBulkWrite('grasscutter.mail', $bulk); 
            echo"<script>swal('礼包领取成功!请到重新登陆游戏，在邮箱领取奖励!请到务必重新登录游戏励！','','success');</script>";
		if($date==""){
            $bulk = new MongoDB\Driver\BulkWrite;
	        $bulk->insert(['date'=>$now,'accountId'=>$UID,'use_user'=>$user]);
		    $manager->executeBulkWrite('grasscutter.gqlb', $bulk);
		}else{
    		$bulk = new MongoDB\Driver\BulkWrite;
	    	$bulk->update(['accountId'=>$UID],
    		['$set'=>['year'=>intval(date('领取成功')),'accountId'=>intval($gqlbUID),'use_user'=>intval($user)]]);
		    $manager->executeBulkWrite('grasscutter.gqlb',$bulk);
		    }
	    }else{
	        echo"<script>swal('您已经领取过了当前礼包！','','warning');</script>";
	        }
        }
    }
    
    if(isset($_POST["lqjs"]))
{
    $main=new config4();
    call_user_func([$main,"lqjs"]);
}

class config4
{
    public function lqjs()
    {
    include 'lbconfig.php';
    include "cus_check.php";
    if($ownerid==""){
		echo"<script>swal('当前用户未登录过游戏，请登录后再试！','','warning');</script>";
    }else{
        $qz = '"type":"CMD","data":"';
        $hz = '"}';
        $sj = time();
        $cmd = $qz."give @$UID1 1029 lv90".$hz;
        $js = '领取角色-可莉';
        $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
        $result = mysqli_query($root,$sql);
        $cmd = $qz."give @$UID1 1052 lv90".$hz;
        $js = '领取角色-雷电将军';
        $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
        $result = mysqli_query($root,$sql);
        $cmd = $qz."give @$UID1 1046 lv90".$hz;
        $js = '领取角色-胡桃';
        $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
        $result = mysqli_query($root,$sql);
        $cmd = $qz."give @$UID1 1030 lv90".$hz;
        $js = '领取角色-钟离';
        $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
        $result = mysqli_query($root,$sql);
        echo"<script>swal('满级角色已领取，如已拥有将不会赠送！','','success');</script>";
	}
        }
    }
    if(isset($_POST["lqsyw"]))
{
    $main=new config5();
    call_user_func([$main,"lqsyw"]);
}

class config5
{
    public function lqsyw()
    {
    include 'lbconfig.php';
    if($ownerid==""){
		echo"<script>swal('当前用户未登录过游戏，请登录后再试！','','warning');</script>";
    }else{
        $qz = '"type":"CMD","data":"';
        $hz = '"}';
        $sj = time();
        $cmd = $qz."give @$UID1 90544 lv20 10001 501054,1 501064,1 501204,6 501224,1".$hz;
        $js = '领取圣遗物-套件1';
        $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
        $result = mysqli_query($root,$sql);
        $cmd = $qz."give @$UID1 90524 lv20 10003 501064,1 501244,1 501204,1 501224,6".$hz;
        $js = '领取圣遗物-套件2';
        $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
        $result = mysqli_query($root,$sql);
        $cmd = $qz."give @$UID1 90554 lv20 10004 501054,1 501244,1 501204,1 501224,6".$hz;
        $js = '领取圣遗物-套件3';
        $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
        $result = mysqli_query($root,$sql);
        $cmd = $qz."give @$UID1 90514 lv20 15011 501054,1 501064,1 501204,1 501224,6".$hz;
        $js = '领取圣遗物-套件4';
        $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
        $result = mysqli_query($root,$sql);
        $cmd = $qz."give @$UID1 90534 lv20 30950 501054,1 501064,1 501244,1 501204,6".$hz;
        $js = '领取圣遗物-套件5';
        $sql = "insert into app_zx (cmd,uid,sj,zt,js) VALUE ('$cmd','$UID1','$sj','0','$js')";
        $result = mysqli_query($root,$sql);
        echo"<script>swal('普通全套圣遗物已领取！','','success');</script>";
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
    <script type="text/javascript">
        $(function(){var i=-1;var toastCount=0;var $toastlast;var getMessage=function(){var msg="签到成功";return msg};$("#sign").click(function(){toastr.success("Without any options","Simple notification!")});$("#showtoast").click(function(){var shortCutFunction=$("#toastTypeGroup input:radio:checked").val();var msg=$("#message").val();var title=$("#title").val()||"";var $showDuration=$("#showDuration");var $hideDuration=$("#hideDuration");var $timeOut=$("#timeOut");var $extendedTimeOut=$("#extendedTimeOut");var $showEasing=$("#showEasing");var $hideEasing=$("#hideEasing");var $showMethod=$("#showMethod");var $hideMethod=$("#hideMethod");var toastIndex=toastCount++;toastr.options={closeButton:$("#closeButton").prop("checked"),debug:$("#debugInfo").prop("checked"),progressBar:$("#progressBar").prop("checked"),positionClass:$("#positionGroup input:radio:checked").val()||"toast-top-right",onclick:null};if($("#addBehaviorOnToastClick").prop("checked")){toastr.options.onclick=function(){alert("You can perform some custom action after a toast goes away")}}if($showDuration.val().length){toastr.options.showDuration=$showDuration.val()}if($hideDuration.val().length){toastr.options.hideDuration=$hideDuration.val()}if($timeOut.val().length){toastr.options.timeOut=$timeOut.val()}if($extendedTimeOut.val().length){toastr.options.extendedTimeOut=$extendedTimeOut.val()}if($showEasing.val().length){toastr.options.showEasing=$showEasing.val()}if($hideEasing.val().length){toastr.options.hideEasing=$hideEasing.val()}if($showMethod.val().length){toastr.options.showMethod=$showMethod.val()}if($hideMethod.val().length){toastr.options.hideMethod=$hideMethod.val()}if(!msg){msg=getMessage()}$("#toastrOptions").text("Command: toastr["+shortCutFunction+']("'+msg+(title?'", "'+title:"")+'")\n\ntoastr.options = '+JSON.stringify(toastr.options,null,2));var $toast=toastr[shortCutFunction](msg,title);$toastlast=$toast;if($toast.find("#okBtn").length){$toast.delegate("#okBtn","click",function(){alert("you clicked me. i was toast #"+toastIndex+". goodbye!");$toast.remove()})}if($toast.find("#surpriseBtn").length){$toast.delegate("#surpriseBtn","click",function(){alert("Surprise! you clicked me. i was toast #"+toastIndex+". You could perform an action here.")})}});function getLastToast(){return $toastlast}$("#clearlasttoast").click(function(){toastr.clear(getLastToast())});$("#cleartoasts").click(function(){toastr.clear()})});
    </script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/toastr_notifications.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:00 GMT -->
</html>
