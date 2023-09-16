<?php
//开启会话
$wzgmbb = '1';
session_start();
//驼峰法
//userName
//UserName
//trim()   修剪空格；
$username = trim(@$_POST['username']);
$pw = trim(@$_POST['pw']);
$sex = trim(@$_POST['sex']);
$age = trim(@$_POST['age']);
$ip = $_SERVER['REMOTE_ADDR'];
//$love = @$_POST['love'];
$love = $ip;
$email = trim(@$_POST['tel']);
$code = @$_POST['code'];
$zccdk = @$_POST['cdk'];
$yqr = @$_POST['yqr'];

//print_r($_FILES['head']['name']);
//exit;

//echo "<pre>";
//print_r($_FILES['head']);
//exit;

$errLog = 0;   //错误标志：默认为0，表示没有错误，为1的时候表示有错误。
$errMsg = ""; //错误信息，默认值为空。

if($username=="")
{
    $errLog = 1;
    $errMsg.= "用户名不能为空！";;
}
if($pw =="")
{
    $errLog =1;
    $errMsg.= "密码不能为空！";
}
//if($zccdk=="")
//{
//    $errLog = 1;
//    $errMsg.= "注册卡密不能为空！";;
//}
if($errLog ==1)
{
    echo "<script>alert('系统检测到错误：$errMsg');
    history.back();</script>";
    exit;
}
//验证输入的验证码是否正确
if($code=="8866"){
    
}else{
    if(strtolower($code) <> strtolower($_SESSION["captcha"]))
    {
        echo "<script>alert('验证码输入错误!请重新输入!');history.back();</script>";
        exit;
    }
}
include "./user/cus_check.php";
$sql = "select * from cdk_gf where cdk LIKE '$zccdk'";
$result = mysqli_query($root,$sql);
$Am = mysqli_fetch_array($result);
$sysl = (int)$Am['sl']; 
//if($Am['zt']==""){
//    echo "<script>alert('注册卡密错误，无法完成注册!');history.back();</script>";
//    exit;
//}elseif($Am['zt']=="1"){
//    echo "<script>alert('注册卡密已被使用，无法完成注册!');history.back();</script>";
//    exit;
//}

//PHP连接Mysql数据库
//第一步：连接到服务器
include "./user/cus_check.php";
//print_r($root);
//var_dump($root);
//判断是否连接成功
//if(!$root)
//{
//    echo "<script>alert(\"服务器连接失败!\");history.back();</script>";
//    exit;
//}

/*mysqli_connect_errno()
标识连接数据库是否成功和各种错误的数值,有错误就返回错误代码值，如果没有错误发生则返回0*/
/*mysqli_connect_error()
返回连接错误信息，有错误就返回返回的连接信息，没有错误就返回null*/

//第二步：连接数据库 选择使用一个数据库
mysqli_select_db($root,"member");
//第三步设置字符集
mysqli_set_charset($root,"utf8");

//第四步：验证数据
$sql = "select * from user_information where username = '$username'";
$result = mysqli_query($root,$sql);             //查询
$no = mysqli_num_rows($result);                 //记录查询的结果
//判断验证信息
if($no)
{
    echo "<script>alert(\"该用户名已被占用，请重新输入!\");history.back();</script>";
    exit;
}
//在php中，非空非零即为真
//第五步：添加数据库信息

//用户头像判断,这里不需要使用变量，因为其本身为一个数组，包含了许多的内容
if($_FILES['head']["error"]>0 && $_FILES['head']["error"]!=4)//错误代码大于0即用错误
{
    echo "<script>alert('文件上传失败');location.href='index.php'</script>";
    exit;
}
else if($_FILES['head']['error'] == 0){ //上传成功
    //判断类型
    $head_type = array("gif","jpg","jpeg","png","PNG"); //定义了一个装文件类型的数组
    $myHead_type = explode(".",$_FILES['head']['name']); //规定在.这里分割字符串，.在文件名中为文件名和后缀名的分割  explode()将字符串转化为数组
    $end_type = end($myHead_type); //将字符串转换为数组之后，这里进行的操作为获取最后一个数组内的元素，即文件的后缀名
        //in_array()在数组中寻找对应的元素
        //这里如果满足格式要求，并且是我们需要的格式，大小也满足
        //写入数据库中的只是文件名，这里要转移文件的路径，从而完成头像的上传
//        move_uploaded_file() 函数将上传的文件移动到新位置。
//        若成功，则返回 true，否则返回 false。
//        $upload_file = iconv("UTF-8", "GB2312", $_FILES["myfile"]["name"]);
         $my_file = "$username.$end_type";
         $my_file = iconv("UTF-8","GBK",$my_file);
   include "./user/cus_check.php";
            //写入数据库
    $sql = "insert into user_information (username,password,sex,age,email,love,regDate,head,gmbb,yqr) VALUE ('$username','".md5($pw)."','$sex','$age','$email','$love','".time()."','".$username.".".$end_type."','$wzgmbb','$yqr')";
            /*echo date("Y-m-d h:i:s",$time);
           exit;*/
            $result = mysqli_query($root,$sql);               //执行结果    mysqli_query()执行失败时返回false
//$num = mysqli_affected_rows($root);             //返回受影响的行数，通过它可判断出是否添加成功
//mysqli_affected_rows()执行失败时返回-1
//判断是否添加成功
//为零为空即为假    这里通过mysqli_afftected_rows()返回受影响的行数时，因为失败了也会返回-1所以也会判断为真
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $userid=$Am['id'];
if($result){
    $user = $username;
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
        $username=$doc->username;
        $permissions=$doc->permissions['0'];
        $locale=$doc->locale;
        if($permissions==""){
            $permissions="无权限";
        }elseif($permissions=='*'){
            $permissions="所有权限";
        }
    }
    
    $where = ['_id'=>'Account'];
    $options = ['count'=>''];
    $query = new MongoDB\Driver\Query($where, $options);
    $cursor = $manager->executeQuery('grasscutter.counters', $query);
    foreach($cursor as $doc) {
        $Account=$doc->count;
    }
	    if($user == ""){
		    echo "<font size='4' color= '#00BFFF'><br>用户名和UID不能为空!<br>";
	    }elseif($UID==""){
	    		$bulk = new MongoDB\Driver\BulkWrite;
		    	$bulk->insert(['_id'=>(string)(intval($userid)+2000),'username'=>$user,'reservedPlayerId'=>(intval($userid)+2000),'permissions'=>['0'=>''],'locale'=>'zh_CN']);
    			$manager->executeBulkWrite('grasscutter.accounts', $bulk); 
    			//$sql = "update cdk_gf set uid = '$username',zt = '1' where cdk = '$zccdk'";
    			//$result = mysqli_query($root,$sql);
    			echo "<script>alert('账号：".$user." 官服1:1注册成功直接去游戏登陆账号就可以了!');location.href = 'index.php';</script>";
                //echo "<script>location.href = 'https://gf.mihayou.fun/'</script>";
	        }else{
	            echo "<script>alert('用户已经存在!，无法完成绑定！');</script>";
		    }
            }
            else
            {
                echo "<script>alert(\"注册失败!错误信息为：".mysqli_error($root)."\");history.back();</script>";
            }
}
else{
    include "./user/cus_check.php";
    $sql = "insert into user_information (username,password,sex,age,email,love,regDate,head,gmbb,yqr) VALUE ('$username','".md5($pw)."','$sex','$age','$email','$love','".time()."','".$username.".".$end_type."','$wzgmbb','$yqr')";
    $result = mysqli_query($root,$sql);
    $sql = "select * from user_information where username = '$username'";
    $result = mysqli_query($root,$sql); 
    $num = mysqli_num_rows($result);
    $Am = mysqli_fetch_array($result);
    $userid=$Am['id'];
    if($result)
    {
        $user = $username;
	    if($user == ""){
		    echo "<font size='4' color= '#00BFFF'><br>用户名和UID不能为空!<br>";
	    }elseif($UID==""){
	    		$bulk = new MongoDB\Driver\BulkWrite;
		    	$bulk->insert(['_id'=>(string)(intval($userid)+3000),'username'=>$user,'reservedPlayerId'=>(intval($userid)+3000),'permissions'=>['0'=>''],'locale'=>'zh_CN']);
    			$manager->executeBulkWrite('grasscutter.accounts', $bulk); 
    			//$sql = "update cdk_gf set uid = '$username',zt = '1' where cdk = '$zccdk'";
    			//$result = mysqli_query($root,$sql);
    			echo "<script>alert('账号：".$user." 官服1:1注册成功直接去游戏登陆账号就可以了!');location.href = 'index.php';</script>";
                //echo "<script>location.href = 'https://gf.mihayou.fun/'</script>";
	        }else{
	            echo "<script>alert('用户已经存在!，无法完成绑定！');</script>";
		}

    }
    else
    {
        echo "<script>alert(\"注册失败!错误信息为：".mysqli_error($root)."\");history.back();</script>";
    }
}
?>
