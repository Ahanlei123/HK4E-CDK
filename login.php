<script src="./sweetalert.min.js"></script>
<?php
//登录验证
session_start();
header('content-type:text/html;charset=utf-8');
$username = trim($_POST['username']);
$password = trim($_POST['password']);
//验证用户名和前端
if($username=="" or $password == "")
{
    header("Location: index.php?result=4"); 
    exit;
}
$password = md5($password);
include "./user/cus_check.php";
//$sql = "select * from user_information where username = '$username' and password = '".md5($password)."'";
$sql = "select * from user_information where username = '$username' and password = '$password'";
//vachar类型要用单引号
$result = mysqli_query($root,$sql);
$num = mysqli_num_rows($result);
if($num)
{
    //返回当前用户所有的信息
    $Am = mysqli_fetch_array($result);
    ////////////////////////////////////////在登录成功之后才会将登录日志写到数据库中
    /// 你的id和你的登录时间
    $sql = "insert into login_infor(userid,logindata) VALUE ('".$Am['id']."','".time()."')" ;
    $result = mysqli_query($root,$sql);
    if(!$result)
    {
        header("Location: index.php?result=4"); 
    }
    //判断是否为会员登录
    if($Am['admin'] == 1){
        $ip = $_SERVER['REMOTE_ADDR'];
        $nr =$username.'('.$ip.')';
        //echo "<iframe hidden name='toppage' width=100% height=100% marginwidth=0 marginheight=0 frameborder='no' border='0' src='https://sctapi.ftqq.com/SCT129913T8XaQpAhW5Q4y8vSG5TEwmMCa.send?title=管理员登录成功&desp=$nr&channel=18' ></iframe>";
        //echo "<script> alert('超级权限用户登录成功!');location.href = './gf11.php';</script>";
        $_SESSION['admin'] = 1;
        header("Location: index.php?result=7"); 
    }else{
    if($Am['zt'] == 1){
        $ip = $_SERVER['REMOTE_ADDR'];
        $nr =$username.'('.$ip.')';
        //echo "<iframe hidden name='toppage' width=100% height=100% marginwidth=0 marginheight=0 frameborder='no' border='0' src='https://sctapi.ftqq.com/SCT129913T8XaQpAhW5Q4y8vSG5TEwmMCa.send?title=管理员登录成功&desp=$nr&channel=18' ></iframe>";
        //echo "<script> alert('超级权限用户登录成功!');location.href = './gf11.php';</script>";
        $_SESSION['admin'] = 0;
        $_SESSION['tcts'] = 0;
        header("Location: index.php?result=1"); 
    }
    else{
        $_SESSION['admin'] = 0;
        $_SESSION['tcts'] = 0;
        //echo"<script> alert('登录成功!');location.href = './ptgf11.php';</script>";
        header("Location: index.php?result=2"); 
        //echo "<script>swal('登录成功！','','success');location.href = 'index.php';</script>";
    }}
    $_SESSION['name'] = $username;
}
else{
    header("Location: index.php?result=3"); 
    $_SESSION['name'] = "";
}
?>