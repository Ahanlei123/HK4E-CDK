<?php
// 定义奖品列表，每个奖品的概率为百分之（0.1 * 概率值）

$username = $_GET['user'];
include "./user/cus_check.php";
$sql = "select * from user_information where username = '".$username."'";
$result = mysqli_query($root,$sql); 
$num = mysqli_num_rows($result);
$Am = mysqli_fetch_array($result);
$cjcs=$Am['cjcs'];
$uid=$Am['gf11uid'];
$gmbb=$Am['gmbb'];
if($gmbb==''){
    $gmbb="正常";
}elseif($gmbb=='100'){
    $gmbb="渠道服A";
    $gmdz1="http://111.173.104.118:20011/api?uid=";
    $yjdz="http://111.173.104.118:20011/api?";
}
if($cjcs==""){
    $cjcs='0';
    echo "9";
}elseif($cjcs<='0'){
    echo "9";
}else{
    
$prizes = array(
  "1" => 10, // 概率为 1%
  "2" => 40, // 概率为 4%
  "3" => 50, // 概率为 5%
  "4" => 200, // 概率为 20%
  "5" => 300, // 概率为 20%
  "6" => 400 // 概率为 40%
);
// 按照概率生成随机数
$probability = array();
foreach ($prizes as $prize => $probabilityValue) {
  for ($i = 0; $i < $probabilityValue; $i++) {
    $probability[] = $prize;
  }
}
shuffle($probability);
$randomPrize = array_shift($probability);

// 保存中奖信息
// $userId 表示中奖用户的 ID，$prize 表示所中奖品名称
function savePrize($userId, $prize) {
  // 实现存储逻辑
}

// 调用保存中奖信息的函数
$userID = $uid; // 假设当前用户 ID 为 123
savePrize($userID, $randomPrize);
$cjcs=$cjcs-1;
$sql = "update user_information set cjcs = '$cjcs' where username = '".$username."'";
$result = mysqli_query($root,$sql);
$sj = time(); 
// 显示中奖信息
if($randomPrize=="1"){
    $xfjl = "&msg=item+add+201+88888";
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $zxurl= $gmdz1.$uid.$xfjl.$cmd2;
    $re = file_get_contents($zxurl);
    $sql = "insert into cj_log (user,wpid,name,sj) VALUE ('$username','原石','88888','$sj')";
    $result = mysqli_query($root,$sql);
    echo "1";
}elseif($randomPrize=="2"){
    $xfjl = "&msg=item+add+201+50000";
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $zxurl= $gmdz1.$uid.$xfjl.$cmd2;
    $re = file_get_contents($zxurl);
    $sql = "insert into cj_log (user,wpid,name,sj) VALUE ('$username','原石','50000','$sj')";
    $result = mysqli_query($root,$sql);
    echo "2";
}elseif($randomPrize=="3"){
    $xfjl = "&msg=item+add+201+20000";
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $zxurl= $gmdz1.$uid.$xfjl.$cmd2;
    $re = file_get_contents($zxurl);
    $sql = "insert into cj_log (user,wpid,name,sj) VALUE ('$username','原石','20000','$sj')";
    $result = mysqli_query($root,$sql);
    echo "3";
}elseif($randomPrize=="4"){
    $xfjl = "&msg=item+add+201+2888";
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $zxurl= $gmdz1.$uid.$xfjl.$cmd2;
    $re = file_get_contents($zxurl);
    $sql = "insert into cj_log (user,wpid,name,sj) VALUE ('$username','原石','2888','$sj')";
    $result = mysqli_query($root,$sql);
   echo "4";
}elseif($randomPrize=="5"){
    $xfjl = "&msg=item+add+201+1888";
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $zxurl= $gmdz1.$uid.$xfjl.$cmd2;
    $re = file_get_contents($zxurl);
    $sql = "insert into cj_log (user,wpid,name,sj) VALUE ('$username','原石','1888','$sj')";
    $result = mysqli_query($root,$sql);
   echo "5";
}elseif($randomPrize=="6"){
    $xfjl = "&msg=item+add+201+888";
    $cmd2 = '&cmd=1116&region=dev_gio&ticket=YSGM%1&sign=1111';
    $zxurl= $gmdz1.$uid.$xfjl.$cmd2;
    $re = file_get_contents($zxurl);
    $sql = "insert into cj_log (user,wpid,name,sj) VALUE ('$username','原石','888','$sj')";
    $result = mysqli_query($root,$sql);
    echo "6";
}
}
?>