<?php
// 获取传递过来的 uid 和 cmd 参数值
$uid = $_SESSION["UID1"];
$cmd = $_GET['cmd'] ?? '';
if($cmd == 'mrlb'){
    
    // 组合目标网站 URL
    
    include "./user/cus_check.php";
        $sql = "select * from user_information where username = '".$_SESSION['name']."'";
        $result = mysqli_query($root,$sql); 
        $num = mysqli_num_rows($result);
        $Am = mysqli_fetch_array($result);
        $mrlb=$Am['mrlb'];
        $jr=date("Y-m-d");
        $user=$_SESSION['name'];
    if($mrlb == $jr){
        echo "<script>swal('今日已领取礼包，请勿重复领取！','','error');</script>";
    }else{
        include "./user/cus_check.php";
        $sql = "update user_information set mrlb = '$jr' where username = '$user'";
        $result = mysqli_query($root,$sql);
        $cmd = "&msg=item+add+201+1000";
        $url = "http://110.42.9.80:65412/api?uid=$uid&cmd=$cmd&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111";
        // 使用 cURL 向目标网站发送 GET 请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($response, true);
        if ($json['data'] === null) {
            echo json_encode(['success' => false, 'message' => $json['msg']]);
        } else {
            echo json_encode(['success' => true, 'message' => $json['msg']]);
        }
        $cmd = "&msg=item+add+203+200";
        $url = "http://110.42.9.80:65412/api?uid=$uid&cmd=$cmd&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111";
        // 使用 cURL 向目标网站发送 GET 请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($response, true);
        if ($json['data'] === null) {
            echo json_encode(['success' => false, 'message' => $json['msg']]);
        } else {
            echo json_encode(['success' => true, 'message' => $json['msg']]);
        }
        $cmd = "&msg=item+add+202+200000";
        $cmd = $cmd1.$UID1.$cmd.$cmd2;
        $re = file_get_contents($cmd);
        $url = "http://110.42.9.80:65412/api?uid=$uid&cmd=$cmd&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111";
        // 使用 cURL 向目标网站发送 GET 请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($response, true);
        if ($json['data'] === null) {
            echo json_encode(['success' => false, 'message' => $json['msg']]);
        } else {
            echo json_encode(['success' => true, 'message' => $json['msg']]);
        }
    }
}

