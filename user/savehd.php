<?php
include "cus_check.php";
$select1 = $_POST['select1'];
$kssj = $_POST['kssj'];
$jssj = $_POST['jssj'];
if(isset($_POST["xzhd"]))
{
	// 新增活动
	$sql = "SELECT * FROM hd_id WHERE name = '$select1' LIMIT 1";
    $result = mysqli_query($syw, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $schedule_id=$row["hdid"];
    } else {
        echo '<script>alert("保存失败！没有符合条件的数据");window.location.href="hdsz.php";</script>';
    }
	$sql ="INSERT INTO `t_activity_schedule_config` (`schedule_id`, `begin_time`, `end_time`) VALUES ('$schedule_id', '$kssj', '$jssj')";
	mysqli_query($conngame, $sql);
	//echo $sql;
	echo '<script>alert("新增活动成功");window.location.href="hdsz.php";</script>';
}
if(isset($_POST["gxhd"]))
{
	// 更新活动
	$sql = "SELECT * FROM hd_id WHERE name = '$select1' LIMIT 1";
    $result = mysqli_query($syw, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $schedule_id=$row["hdid"];
    } else {
        echo '<script>alert("保存失败！没有符合条件的数据");window.location.href="hdsz.php";</script>';
    }
	$sql = "UPDATE `t_activity_schedule_config` SET `begin_time` = '$kssj',`end_time` = '$jssj' WHERE `t_activity_schedule_config`.`schedule_id` =$schedule_id";
	mysqli_query($conngame, $sql);
	echo '<script>alert("更新活动成功");window.location.href="hdsz.php";</script>';
}	
?>
