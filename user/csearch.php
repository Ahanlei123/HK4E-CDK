<?php
header("Access-Control-Allow-Origin:*");//解决跨域请求问题
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:x-requested-with, content-type');  
header("content-Type: text/html; charset=utf-8");//字符编码设置  

$name = $_GET['name'];
$servername = "数据库地址";
$username = "member";
$password = "数据库密码";
$dbname = "member";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

if(!isset($name) || $name == ""){
    $name = "qwer";
}
 
$sql = "SELECT * from game_rw where name like '%".$name."%'";
$result = $conn->query($sql);
$arr = array();  
while($row = $result->fetch_assoc()) {  
    $count=count($row);//不能在循环语句中，由于每次删除row数组长度都减小  
    for($i=0;$i<$count;$i++){  
        unset($row[$i]);//删除冗余数据  
    }  
    array_push($arr,$row);  
} 
echo json_encode($arr,JSON_UNESCAPED_UNICODE);//json编码  
$conn->close();

?>