<?php
	include "cus_check.php";
	$select1 = $_POST['select1'];
	$select2 = $_POST['select2'];
	$select3 = $_POST['select3'];
	$select4 = $_POST['select4'];
	$select5 = $_POST['select5'];
	$select6 = $_POST['select6'];
	$kc1id='813';
	$kc2id='823';
	$kc3id='833';
	$kc4id='843';
	$kc5id='853';
	$kc6id='903';
	// 卡池1更换
	$sql = "SELECT * FROM game_kc WHERE name = '$select1' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gacha_prefab_path=$row["gacha_prefab_path"];
        $gacha_preview_prefab_path=$row["gacha_preview_prefab_path"];
        $title_textmap=$row["title_textmap"];
        $display_up4_item_list=$row["up2"];
        $gacha_up_config='{}';
    } else {
        echo "没有符合条件的数据";
        echo '<script>alert("保存失败！");window.location.href="gamesz.php";</script>';
    }
	$sql = "UPDATE t_gacha_schedule_config SET gacha_prefab_path='$gacha_prefab_path', gacha_preview_prefab_path='$gacha_preview_prefab_path', title_textmap='$title_textmap', display_up4_item_list='$display_up4_item_list', gacha_up_config='$gacha_up_config' WHERE schedule_id='813'";
	//mysqli_query($conngame, $sql);
	// 卡池2更换
	include "cus_check.php";
	$sql = "SELECT * FROM game_kc WHERE name = '$select2' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gacha_prefab_path=$row["gacha_prefab_path"];
        $gacha_preview_prefab_path=$row["gacha_preview_prefab_path"];
        $title_textmap=$row["title_textmap"];
        $display_up4_item_list=$row["up2"];
        $gacha_up_config='{"gacha_up_list":[{"item_parent_type":1,"prob":500,"item_list":['.$row["up1"].']},{"item_parent_type":2,"prob":500,"item_list":['.$row["up2"].']}]}';
    } else {
        echo "没有符合条件的数据";
        echo '<script>alert("保存失败！");window.location.href="gamesz.php";</script>';
    }
	$sql = "UPDATE t_gacha_schedule_config SET gacha_prefab_path='$gacha_prefab_path', gacha_preview_prefab_path='$gacha_preview_prefab_path', title_textmap='$title_textmap', display_up4_item_list='$display_up4_item_list', gacha_up_config='$gacha_up_config' WHERE schedule_id='823'";
	//mysqli_query($conngame, $sql);
	
	
	// 卡池3更换
	include "cus_check.php";
	$sql = "SELECT * FROM game_kc WHERE name = '$select3' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gacha_prefab_path=$row["gacha_prefab_path"];
        $gacha_preview_prefab_path=$row["gacha_preview_prefab_path"];
        $title_textmap=$row["title_textmap"];
        $display_up4_item_list=$row["up2"];
        $gacha_up_config='{"gacha_up_list":[{"item_parent_type":1,"prob":500,"item_list":['.$row["up1"].']},{"item_parent_type":2,"prob":500,"item_list":['.$row["up2"].']}]}';
    } else {
        echo "没有符合条件的数据";
        echo '<script>alert("保存失败！");window.location.href="gamesz.php";</script>';
    }
	$sql = "UPDATE t_gacha_schedule_config SET gacha_prefab_path='$gacha_prefab_path', gacha_preview_prefab_path='$gacha_preview_prefab_path', title_textmap='$title_textmap', display_up4_item_list='$display_up4_item_list', gacha_up_config='$gacha_up_config' WHERE schedule_id='833'";
	mysqli_query($conngame, $sql);
	
	
	// 卡池4更换
	include "cus_check.php";
	$sql = "SELECT * FROM game_kc WHERE name = '$select4' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gacha_prefab_path=$row["gacha_prefab_path"];
        $gacha_preview_prefab_path=$row["gacha_preview_prefab_path"];
        $title_textmap=$row["title_textmap"];
        $display_up4_item_list=$row["up2"];
        $gacha_up_config='{"gacha_up_list":[{"item_parent_type":1,"prob":500,"item_list":['.$row["up1"].']},{"item_parent_type":2,"prob":500,"item_list":['.$row["up2"].']}]}';
    } else {
        echo "没有符合条件的数据";
        echo '<script>alert("保存失败！");window.location.href="gamesz.php";</script>';
    }
	$sql = "UPDATE t_gacha_schedule_config SET gacha_prefab_path='$gacha_prefab_path', gacha_preview_prefab_path='$gacha_preview_prefab_path', title_textmap='$title_textmap', display_up4_item_list='$display_up4_item_list', gacha_up_config='$gacha_up_config' WHERE schedule_id='843'";
	mysqli_query($conngame, $sql);
	
	
	// 卡池5更换
	include "cus_check.php";
	$sql = "SELECT * FROM game_kc WHERE name = '$select5' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gacha_prefab_path=$row["gacha_prefab_path"];
        $gacha_preview_prefab_path=$row["gacha_preview_prefab_path"];
        $title_textmap=$row["title_textmap"];
        $display_up4_item_list=$row["up2"];
        $gacha_up_config='{"gacha_up_list":[{"item_parent_type":1,"prob":500,"item_list":['.$row["up1"].']},{"item_parent_type":2,"prob":500,"item_list":['.$row["up2"].']}]}';
    } else {
        echo "没有符合条件的数据";
        echo '<script>alert("保存失败！");window.location.href="gamesz.php";</script>';
    }
	$sql = "UPDATE t_gacha_schedule_config SET gacha_prefab_path='$gacha_prefab_path', gacha_preview_prefab_path='$gacha_preview_prefab_path', title_textmap='$title_textmap', display_up4_item_list='$display_up4_item_list', gacha_up_config='$gacha_up_config' WHERE schedule_id='853'";
	mysqli_query($conngame, $sql);
	
	
	// 卡池6更换
	include "cus_check.php";
	$sql = "SELECT * FROM game_kc WHERE name = '$select6' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gacha_prefab_path=$row["gacha_prefab_path"];
        $gacha_preview_prefab_path=$row["gacha_preview_prefab_path"];
        $title_textmap=$row["title_textmap"];
        $display_up4_item_list=$row["up2"];
        $gacha_up_config='{"gacha_up_list":[{"item_parent_type":1,"prob":500,"item_list":['.$row["up1"].']},{"item_parent_type":2,"prob":500,"item_list":['.$row["up2"].']}]}';
    } else {
        echo "没有符合条件的数据";
        echo '<script>alert("保存失败！");window.location.href="gamesz.php";</script>';
    }
	$sql = "UPDATE t_gacha_schedule_config SET gacha_prefab_path='$gacha_prefab_path', gacha_preview_prefab_path='$gacha_preview_prefab_path', title_textmap='$title_textmap', display_up4_item_list='$display_up4_item_list', gacha_up_config='$gacha_up_config' WHERE schedule_id='903'";
	mysqli_query($conngame, $sql);
	

	echo '<script>alert("更换卡池成功");window.location.href="gamesz.php";</script>';
	
?>
