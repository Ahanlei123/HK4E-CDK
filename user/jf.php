<?php  
    include "cus_check.php";
    session_start();
    $sql = "select * from user_information where username = '".$_SESSION['name']."'";
    $jfjf = $_SESSION['name']; 
    $jfzs = '30'; 
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $userjf = $Am['jf'];
    if($userjf == "" ){
        $sql = "update user_information set jf = '$jfzs' where username = '$jfjf'";
        $result = mysqli_query($root,$sql);
    }
?>