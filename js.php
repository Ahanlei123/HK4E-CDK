<?php

// 从文件中读取数据到PHP变量
$json_string = file_get_contents('data.js');
// 把JSON字符串转成PHP数组
$data = json_decode($json_string, true);

// 显示出来看看

var_dump($data);
echo '<br><br>';

print_r($data);

echo '<br><br>';

echo '编号：'.$data[0][0].'姓名：'.$data[0][1].'网址：'.$data[0][2];

echo '<br>';

echo '编号：'.$data[0][0].'姓名：'.$data[0][1].'网址：'.$data[0][2];

?>