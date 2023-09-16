<?php
//用户信息验证
$root = mysqli_connect("","member","数据库密码");
//连接服务器
mysqli_select_db($root,"member");
//连接数据库
mysqli_set_charset($root,"utf8");
//设置字符集

$syw =  mysqli_connect("数据库地址","member","hdshJfMJxA7imSfi");
//连接服务器
mysqli_select_db($syw,"member");
//连接数据库
mysqli_set_charset($syw,"utf8");
//设置字符集

$sdk1 = mysqli_connect("数据库地址","gmkc","数据库密码");
//$sdk = mysqli_connect("数据库地址","hk4e_sdk","NtB6xK76RFzWJtpJ");
//连接服务器
mysqli_select_db($sdk1,"hk4e_sdk");
//连接数据库
mysqli_set_charset($sdk1,"utf8");
//设置字符集

$sdk = mysqli_connect("数据库地址","gmkc","fZmNZBLPszak5Ssa");
//$sdk = mysqli_connect("数据库地址","hk4e_sdk","NtB6xK76RFzWJtpJ");
//连接服务器
mysqli_select_db($sdk,"hk4e_sdk");
//连接数据库
mysqli_set_charset($sdk,"utf8");
//设置字符集


$conngame = mysqli_connect("数据库地址","gmkc","数据库密码");
//连接服务器
mysqli_select_db($conngame,"db_hk4e_config_gio");
//连接数据库
mysqli_set_charset($conngame,"utf8");
//设置字符集



$conn = mysqli_connect("数据库地址","member","数据库密码","member");

$mysql_conn = mysqli_connect("数据库地址","gmkc","数据库密码");
//连接服务器
mysqli_select_db($mysql_conn,"db_hk4e_user_gio");
//连接数据库
mysqli_set_charset($mysql_conn,"utf8");
//设置字符集

?>