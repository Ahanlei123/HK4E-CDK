<?php
// 连接数据库
include "cus_check.php";
// 获取输入框数据并查询数据库
$name = mysqli_real_escape_string($conn, $_POST['cx']);
$sql = "SELECT * FROM cdk_wp WHERE uid LIKE '%" . $name . "%' AND zt LIKE '1'";
$result = mysqli_query($conn, $sql);
// 显示查询结果
if (mysqli_num_rows($result) > 0) {
    echo '<table class="table table-striped">';
    echo "<thead><tr><th>使用人</th><th>使用卡密</th><th>卡密内容</th></tr></thead>";
    while($row = mysqli_fetch_assoc($result)) {
        if ($row["sl"] == 'zhcdk') {
            $row["sl"]="组合卡密";
            $json = $row["wp"];
        }else {
            $row["sl"]=$row["sl"]."个";
            $url = 'http://121.62.18.138:4456/api.php?key=8251633168&wpid='.$row["wp"].'&zl=8';
            $json = file_get_contents($url);
        }
        
        echo "<tbody><tr><td>".$row["uid"]."</td><td>".$row["cdk"]."</td><td>".$json."(".$row["sl"].")</td></tr></tbody>";
    }
    echo "</table>";
} else {
    echo "<h2>没有查询到任何结果</h2>";
}

// 关闭数据库连接
mysqli_close($conn);

?>