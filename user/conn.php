<?php
 session_start();
    if(!isset($_SESSION['name']) or !$_SESSION['name'])
    {
        echo "<script>alert('本页面只有登录之后才能访问！');location.href='../index.php';</script>";
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
    $number=($_POST["number"]);
    
    
    }

    
    ?>