<?php
$username = $_POST['username'];
include_once "cus_check.php";
$sql = "select * from user_information where username = '$username'";
$result = mysqli_query($root,$sql);
$nm = mysqli_num_rows($result);
if($nm)
{
    $a['error'] = 1;
}
else{
    $a['error'] = 0;
}
echo json_encode($a);   //编码，将参数转换为json格式，即对象
?>

