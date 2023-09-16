<?php  session_start();?>
<!DOCTYPE html>
<html>

<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:16:41 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>原神单机版GM管理后台 - 主页</title>
    <meta name="keywords" content="原神单机版GM管理后台">
    <meta name="description" content="原神单机版GM管理后台">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="./css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="./css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="./css/animate.min.css" rel="stylesheet">
    <link href="./css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
    <?php
    if(!isset($_SESSION['name']) or !$_SESSION['name'])
    {
        echo "<script>alert('本页面只有登录之后才能访问！');location.href='../index.php';</script>";
        exit;
    }
    include "cus_check.php";   //导入用户信息
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $userzt=$Am['zt'];
    $gmbb=$Am['gmbb'];
    $userid=$Am['id'];
    $gf11=$Am['gf11uid'];
    if($gf11==""){
        $gf11="未绑定";
    }
    if($userzt==""){
        $userzt="正常";
    }elseif($userzt=='3'){
        $userzt="封号";
        echo "<script>alert('该用户以被封号!');history.back();</script>";
        exit;
    }
    if(!isset($_SESSION['admin']) or !$_SESSION['admin'])
    {
        if($gmbb==""){
            $gmbb="正常";
        }elseif($gmbb=='1'){
            $gmbb="官服1:1";
            echo "<script>alert('此账号为官服1:1账号，请直接在游戏内点击 云•原神 使用高级权限');</script>";
            
        }
    }
    
    if(!$num)
    {
        echo "<script>alert('该用户不存在!');history.back();</script>";
        exit;
    }
    else{
    $infor_Array = mysqli_fetch_array($result,1);
    $user=$_SESSION['name'];
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
        $bduid=$doc->reservedPlayerId;
        $username=$doc->username;
        $permissions=$doc->permissions['0'];
        $locale=$doc->locale;
        if($bduid=="0"){
            if($ownerid==""){
                $ownerid1="未进游戏";
            }
        }
        if($permissions==""){
            $permissions="无权限";
            if($Am['admin']=="1"){
                $permissions="系统管理员";
            }
        }elseif($permissions=='*'){
            $permissions="所有权限";
        }elseif($permissions=='mojo.console'){
            $permissions="高级权限";
        }elseif($permissions==$_SESSION['name']){
            $permissions="已换绑";
        }else{
            $permissions="未知";
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
        if($bduid=="0"){
            if($ownerid==""){
                $ownerid1="未进游戏";
            }else{
                $bulk = new MongoDB\Driver\BulkWrite;
                $filter = ['username'=>$user];
                $newObj = ['$set'=>['_id'=>$UID,'reservedPlayerId'=>$ownerid]];
                $bulk->update($filter, $newObj);
                $manager->executeBulkWrite('grasscutter.accounts',$bulk);
                $ownerid1=$ownerid;
            }
        }else{
            $ownerid1=$ownerid;
        }
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
        if($permissions==""){
            $where = ['_id'=>'Account'];
    $options = ['count'=>''];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.counters', $query);
    foreach($cursor as $doc) {
        $Account=$doc->count;
    }
            $bulk = new MongoDB\Driver\BulkWrite;
	            $bulk->update(['_id'=>'Account'],['count'=>intval($Account)+1]);
	            $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
	            $manager->executeBulkWrite('grasscutter.counters', $bulk,$writeConcern); 
	    		$bulk = new MongoDB\Driver\BulkWrite;
		    	$bulk->insert(['_id'=>(string)(intval($userid)),'username'=>$user,'reservedPlayerId'=>(intval($userid)),'permissions'=>['0'=>''],'locale'=>'zh_CN']);
    			$manager->executeBulkWrite('grasscutter.accounts', $bulk); 
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
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle"  width="60" height="60" src="../tx.png" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo $username?></strong></span>
                                <span class="text-muted text-xs block"><?php echo $permissions?><b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="#">UID：<?php echo $gf11 ?></a>
                                </li>
                                <li><a class="J_menuItem" href="#">用户权限：<?php echo $permissions?></a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="loginOut.php">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">GM
                        </div>
                    </li>
                    <li>
                        <a class="J_menuItem" href="./index2.php?v=4.0#"><i class="fa fa-home"></i> <span class="nav-label">主页</span></a>
                    </li>
                    <!--<li>
                        <a href="#">
                            <i class="fa fa-cubes"></i>
                            <span class="nav-label">功能</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="./jcgn.php" data-index="0">基础功能(领取礼包)</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="https://pay1.mihayou.fun?code=YT0xJmI9OQ%3D%3D">官服1:1(一模一样)</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="https://pay1.mihayou.fun/">卡密购买(卡密购买)</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="./cdk.php">卡密兑换(物品兑换)</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="./gjqx.php">高级权限(开通权限)</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="./zdyuid.php">自定义UID(装X专用)</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-video-camera"></i>
                            <span class="nav-label">教程</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="https://mp4.yssf66.top/" data-index="0">视频教程</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="https://pan.mihayou.fun/">下载网盘</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="https://docs.qq.com/doc/DZnZyaXdzaXNZakdL">安卓教程</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="https://docs.qq.com/doc/DU2JOUHR0cktEalBP">替换失败</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="https://mp4.yssf66.top/watch/%E6%9D%83%E9%99%90%E4%BD%BF%E7%94%A8%E6%95%99%E7%A8%8B-mp4_ySbL5Vq5F5a93aq.html" data-index="0">权限教程</a>
                            </li>
                             <li>
                                <a class="J_menuItem" href="https://docs.qq.com/doc/DU0JDZ3NtRXdQbG5W">电脑3.2教程</a>
                            </li>
                        </ul>
                    </li>-->
                    <?php
                    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
                    $result = mysqli_query($root,$sql);
                    $Am = mysqli_fetch_array($result);
                    if($Am['admin']=="1")
                    {?>
                    <li>
                        <a href="#">
                            <i class="fa fa-database"></i>
                            <span class="nav-label">管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <!--<li>
                                <a class="J_menuItem" href="./user.php">用户中心</a>
                            </li>-->
                            <li>
                                <a class="J_menuItem" href="./user1.php">用户中心</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="./qxqx.php">用户管理</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="./xt.php" >服务管理</a>
                            </li>
                            
                            <!--<li>
                                <a class="J_menuItem" href="https://console.smsbao.com/#/index">短信平台</a>
                            </li>-->
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-credit-card"></i>
                            <span class="nav-label">卡密</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <!--<li>
                                <a class="J_menuItem" href="./cdkqx.php">权限生成</a>
                            </li>-->
                            <!--<li>
                                <a class="J_menuItem" href="./cdkgf.php">后台生成</a>
                            </li>-->
                            <li>
                                <a class="J_menuItem" href="./usercx.php">卡密查询</a>
                            </li>
                            <li hidden>
                                <a class="J_menuItem" href="./ptcdk.php" >物品生成</a>
                            </li>
                            <li hidden>
                                <a class="J_menuItem" href="./zhcdk.php" >组合生成</a>
                            </li>
                            <li hidden>
                                <a class="J_menuItem" href="./jrcdk.php" >时效生成</a>
                            </li>
                            <li hidden>
                                <a class="J_menuItem" href="./ios.php" >苹果卡密</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="./cdklb.php">物品卡密列表</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="./cdkjrlb.php">时效卡密列表</a>
                            </li>
                            <!--<li>
                                <a class="J_menuItem" href="./cdkgflb.php">后台卡密列表</a>
                            </li>
                            <!--<li hidden>
                                <a class="J_menuItem" href="./cdklb.php">普通卡密</a>
                            </li>-->
                            <!--<li hidden>
                                <a class="J_menuItem" href="./cdkuid.php">UID卡密</a>
                            </li>-->
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-cart-plus"></i>
                            <span class="nav-label">专属</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="./jrcz.php" >充值系统</a>
                            </li>
                           <li>
                                <a class="J_menuItem" href="./gamesz.php">卡池管理</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="./hdsz.php">活动管理</a>
                            </li>
                            
                            
                            <!--<li>
                                <a class="J_menuItem" href="./xysh.php" >确认收货</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="https://mai.91kami.com/?tradeNo=221001154215274&outTradeNo=221001154215701&payType=AliPayPage&payTime=2022%2F10%2F1+15%3A42%3A32&totalAmount=10.00&sign=4e621cb8f68fdcc04e919e097c102d5e#/open/aldsOuterApiList" >通知接口</a>
                            </li>
                            
                            <li>
                                <a class="J_menuItem" href="./websz.php">网站设置</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="./qdqsz.php">软件设置</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="../jm.php">用户加密</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="https://pay.mihayou.fun/xbx6688">发卡后台</a>
                            </li>-->
                        </ul>
                    </li>
                    
<?php } ?>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> 
                            </a>
                            
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>
                            </a>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-tasks"></i> 主题
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a href="./index2.php?v=4.0#" class="active J_menuTab" data-id="./index2.php?v=4.0#">主页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                </button>
                <div class="btn-group roll-nav roll-right">
                    <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div>
                <a href="./loginOut.php" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="index2.php?v=4.0#" frameborder="0" data-id="index2.php" seamless></iframe>
            </div>
            <div class="footer">
                <div class="pull-right">&copy; 2022-2023 <a href="" target="_blank">原神单机版GM管理后台</a>
                </div>
            </div>
        </div>
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active">
                        <a data-toggle="tab" href="#tab-1">
                            <i class="fa fa-gear"></i> 主题
                        </a>
                    </li>
                    <li class=""><a data-toggle="tab" href="#tab-2">
                        通知
                    </a>
                    </li>
                    <li><a data-toggle="tab" href="#tab-3">
                        项目进度
                    </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 主题设置</h3>
                            <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                        </div>
                        <div class="skin-setttings">
                            <div class="title">主题设置</div>
                            <div class="setings-item">
                                <span>收起左侧菜单</span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                        <label class="onoffswitch-label" for="collapsemenu">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>固定顶部</span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                        <label class="onoffswitch-label" for="fixednavbar">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                        <label class="onoffswitch-label" for="boxedlayout">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="title">皮肤选择</div>
                            <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                            </div>
                            <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                            </div>
                            <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 最新通知</h3>
                            <small><i class="fa fa-tim"></i> 您当前有10条通知</small>
                        </div>
                        <div>

                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a1.jpg">
                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        主服务器：##<br>
                                        电脑端口：443<br>
                                        苹果端口：8899<br>
                                        苹果证书：https://ys666.xjqxz.top/mojoplus/ios.cer<br>
                                        苹果需要使用小火箭连接 请自行下载
                                        <br>
                                        <small class="text-muted">今天 4:21</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a2.jpg">
                                    </div>
                                    <div class="media-body">
                                        视频教程：https://mp4.yssf66.top/
                                        <br>
                                        <small class="text-muted">昨天 2:45</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        卡池是万能卡池什么都有什么都可以抽 <br>
                                        别以为就只有海报上那两个

                                        <br>
                                        <small class="text-muted">昨天 1:10</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
                                    </div>

                                    <div class="media-body">
                                        常用材料可以去蒙德城莎拉哪里购买
                                        <br>
                                        <small class="text-muted">昨天 8:37</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a8.jpg">
                                    </div>
                                    <div class="media-body">

                                        由于版本更新大范围 出现白屏情况 现在已重制数据库 8月24日之前的 开通了权限的私聊我发付款截图 还有你的新uid我重新给你开通权限 不会回复 自己发了多等一会自己上去看就可以了。
                                        <br>
                                        <small class="text-muted">今天 4:21</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a7.jpg">
                                    </div>
                                    <div class="media-body">
                                        系统以更新GM网站管理平台
                                        <br>
                                        <small class="text-muted">昨天 2:45</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a3.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        安卓版下载地址：
                                        <br>
                                        <small class="text-muted">昨天 1:10</small>
                                    </div>
                                </a>
                            </div>
                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="img/a4.jpg">
                                    </div>
                                    <div class="media-body">
                                        电脑版下载地址：
                                        <br>
                                        <small class="text-muted">星期一 8:37</small>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-cube"></i> 最新任务</h3>
                            <small><i class="fa fa-tim"></i> 当前有14个任务，10个已完成</small>
                        </div>

                        <ul class="sidebar-list">
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9小时以后</div>
                                    <h4>修复任务</h4> 修复任务剧情；

                                    <div class="small">已完成： 90%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 90%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">项目截止： 4:00 - 2022.10.07</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9小时以后</div>
                                    <h4>服务器1稳定优化 </h4> 重装服务器系统，保持持续稳定优化

                                    <div class="small">已完成： 100%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 100%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9小时以后</div>
                                    <h4>GM网站平台搭建</h4> GM网站平台搭建无需机器人，处理GM各种数据

                                    <div class="small">已完成： 85%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 85%;" class="progress-bar progress-bar-info"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">9小时以后</div>
                                    <h4>机器人制造 </h4> 编写Q群机器人，实现各种功能优化

                                    <div class="small">已完成： 95%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 95%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
                            

                        </ul>

                    </div>
                </div>

            </div>
        </div>


    </div>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/layer/layer.min.js"></script>
    <script src="js/hplus.min.js?v=4.1.0"></script>
    <script type="text/javascript" src="js/contabs.min.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:17:11 GMT -->
</html>
