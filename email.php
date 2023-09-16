<?php
// 连接到数据库
$dbHost = '数据库地址';
$dbUser = 'gmkc';
$dbPass = '数据库密码';
$dbName = 'member';
$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($mysqli->connect_errno) {
    die("连接数据库失败: " . $mysqli->connect_error);
}

// 查询数据并获取相关内容
$query = "SELECT cmd, UID FROM your_table WHERE zt = 0";
$result = $mysqli->query($query);
if (!$result) {
    die("查询数据库失败: " . $mysqli->error);
}

// 遍历数据并发起请求
while ($row = $result->fetch_assoc()) {
    $cmd = $row['cmd'];
    $uid = $row['UID'];

    // 拆分 cmd 字段内容
    $cmdPairs = explode(',', $cmd);

    // 处理每个键值对并发起请求
    foreach ($cmdPairs as $pair) {
        list($key, $value) = explode(':', $pair);
        // 替换 UID 变量并生成请求地址
        $requestUrl = 'http://127.0.0.1/api.php?uid=' . $uid . '&giv=' . $key . ':' . $value;
        // 发起 GET 请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $requestUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        // 处理响应
        if ($response) {
            // 响应处理逻辑
            // ...
        }
    }
}

// 关闭数据库连接
$mysqli->close();
?>