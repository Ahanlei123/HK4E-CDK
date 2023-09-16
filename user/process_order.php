<?php
// 获取订单号参数
$order_id = $_POST['order_id'];
// 执行数据库更新操作
include "./cus_check.php";
$sql = "select * from cz_ddsj where dd = '$order_id'";
$result = mysqli_query($root,$sql); 
$num = mysqli_num_rows($result);
$Am = mysqli_fetch_array($result);
$zt=$Am['zt'];
$username=$Am['username'];
$gmbb=$Am['gmdz'];
$uid=$Am['uid'];
$zxml=$Am['cmd'];

if ($zt=="1") {
    echo "1";
} elseif ($zt=="0") {
    
    include "./cus_check.php";
    if($gmbb==''){
        $gmbb="正常";
        //$_SESSION["gmdz"] = 'http://110.42.9.80:65412/api?uid=';
    }elseif($gmbb=='1'){
        $gmbb="3.4剧情服";
        $gmdz1="http://121.62.18.138:20011/api?uid=";
        $yjdz="http://121.62.18.138:20011/api?";
    }elseif($gmbb=='2'){
        $gmbb="3.4剧情服";
        $gmdz1="http://121.62.18.138:20011/api?uid=";
        $yjdz="http://121.62.18.138:20011/api?";
    }elseif($gmbb=='3'){
        $gmbb="3.4剧情服(拓展)";
        $gmdz1="http://202.189.8.53:20011/api?uid=";
        $yjdz="http://202.189.8.53:20011/api?";
    }elseif($gmbb=='9'){
        $gmbb="破解充值";
        $gmdz1="http://122.228.85.111:20011/api?uid=";
        $yjdz="http://122.228.85.111:20011/api?";
    }elseif($gmbb=='8'){
        $gmbb="逍遥原神";
        $gmdz1="http://ys.syxywl.cn:53497/api?uid=";
        $yjdz="http://ys.syxywl.cn:53497/api?";
    }elseif($gmbb=='6'){
        $gmbb="破解充值";
        $gmdz1="http://122.228.85.111:1452/api?uid=";
        $yjdz="http://122.228.85.111:1452/api?";
    }
    $data1 = substr($zxml, strpos($zxml, 'add+') + 4); // 获取第一个加号后面的数据
    $data2 = substr($data1, 0, strpos($data1, '+6')); // 获取第二个加号前面的数据
    $yjfssj=time();
    $yjdqsj=strtotime('+7 days');
    $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('变态圣遗物到账啦！').'&content='.urlencode('尊敬的用户:'.$username.'\n感谢你在GM平台购买变态圣遗物成功！').'&sender='.urlencode('原神GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$data2.':1&cmd=1005&ticket='.$yjfssj;
    $zxurl = $yjdz.$cmd2;
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $userreg = strtotime($Am["userreg"]);
    $userzt = $Am['zt'];
    
    //开通权限
    if($zxml == 'ktqx'){
        include "./cus_check.php";
        $sql2 = "update cz_ddsj set bf = 1 where dd = '$order_id'";
        $result2 = mysqli_query($root,$sql2);
        $sql2 = "update cz_ddsj set zt = 1 where dd = '$order_id'";
        $result2 = mysqli_query($root,$sql2);
        $sql2 = "update user_information set zt = 1 where username = '$username'";
        $result2 = mysqli_query($root,$sql2);
        echo "3";
        exit;
    }
    
    if($zxml == 'ktyj'){
        include "./cus_check.php";
        
        if($userreg < time()){
            include "/cus_check.php";
            $new_timestamp = strtotime('+270 days');
            $sql= "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
            $result = mysqli_query($root,$sql);
        }else{
            include "/cus_check.php";
            $new_timestamp = strtotime('+270 days', $userreg);
            $sql = "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
            $result = mysqli_query($root,$sql);
        }
        
        $new_timestamp=3000000000;
        $sql2= "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
        $result2 = mysqli_query($root,$sql2);
        $sql2 = "update cz_ddsj set bf = 1 where dd = '$order_id'";
        $result2 = mysqli_query($root,$sql2);
        $sql2 = "update cz_ddsj set zt = 1 where dd = '$order_id'";
        $result2 = mysqli_query($root,$sql2);
        $sql2 = "update user_information set daili = '0' where username = '$username'";
        $result2 = mysqli_query($root,$sql2);
        echo "3";
        exit;
    }
    
    if($zxml == 'mfsyw'){
        $sql = "update user_information set daili = '0' where username = '$username'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set zt = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        header("Location: gf11.php?result=1"); 
        exit;
    }
    
    //
    
    if($zxml == 'ptxf'){
        $xfjl = "&msg=mcoin+2000";
        $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
        $zxurl=$gmdz1.$uid.$xfjl.$cmd2;
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='succ') {
            if($userreg < time()){
                //如果小于当前时间戳取当前时间+7天
                include "./cus_check.php";
                $new_timestamp = strtotime('+7 days');
                $sql = "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set zt = 1 where dd = '$order_id'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                echo "3";
                exit;
            }else{
                //如果大于数据库时间戳取当前时间+7天
                include "./cus_check.php";
                $new_timestamp = strtotime('+7 days', $userreg);
                $sql = "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set zt = 1 where dd = '$order_id'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                echo "3";
                exit;
            }
        }else{
            echo "4";
            exit;
        }
    }
    
    //
    
    if($zxml == 'gjxf'){
        $numbers = array(23336, 23300, 23340, 23317, 23338, 23318, 23316);
        // 使用rand()函数生成一个随机索引
        $randomIndex = rand(0, count($numbers) - 1);
        // 取出数字数组中对应随机索引的值
        $randomNumber = $numbers[$randomIndex];
        $yjfssj=time();
        $yjdqsj=strtotime('+7 days');
        $yhdqsj = date('Y-m-d H:i:s', $userreg);
        $cmd2 = 'importance=&config_id=&uid='.$uid.'&title='.urlencode('用户续费成功！').'&content='.urlencode('感谢你在GM平台赞助支持，当前用户:'.$username.'\n用户续费30天成功！\nQQ交流群:513364857\n欢迎各位大佬加群交流').'&sender='.urlencode('3.4剧情服GM平台').'&expire_time='.$yjdqsj.'&is_collectible=False&item_limit_type=2&tag=&source_type=&item_list='.$randomNumber.':1&cmd=1005&ticket='.$yjfssj;
        $zxurl = $yjdz.$cmd2;
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='succ') {
            if($userreg < time()){
                //如果小于当前时间戳取当前时间+30天
                include "./cus_check.php";
                $new_timestamp = strtotime('+30 days');
                $sql= "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set zt = 1 where dd = '$order_id'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                echo "3";
                exit;
            }else{
                //如果大于数据库时间戳取当前时间+30天
                include "./cus_check.php";
                $new_timestamp = strtotime('+30 days', $userreg);
                $sql= "UPDATE user_information SET userreg='".$new_timestamp."' WHERE username='".$username."'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set zt = 1 where dd = '$order_id'";
                $result = mysqli_query($root,$sql);
                $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
                $result = mysqli_query($root,$sql);
                echo "3"; 
                exit;
            }
        }else{
            echo "4";
            exit;
        }
    }
    
    
    if($userzt == '1'){
        
        $re = file_get_contents($zxurl);
        $json = json_decode($re, true);
        if ($json['msg']=='mail has been sent, do not re_send mail') {
            echo "4";
        }elseif($json['msg']=='succ'){
            include "./cus_check.php";
            $sql = "update cz_ddsj set zt = 1 where dd = '$order_id'";
            $result = mysqli_query($root,$sql);
            $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
            $result = mysqli_query($root,$sql);
            echo "3";
        }else{
            echo "4";
        }
        
    }else{
        include "./cus_check.php";
        $sql = "update cz_ddsj set zt = 1 where dd = '$order_id'";
        $result = mysqli_query($root,$sql);
        $sql = "update cz_ddsj set bf = 1 where dd = '$out_trade_no'";
        $result = mysqli_query($root,$sql);
        echo "2";
    }
}else{
    echo "0";
}
?>