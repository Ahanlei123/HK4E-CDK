<?php
    // 获取要下载的文件名，解密 URL 参数
    $filename = urldecode($_GET['file']);
    // 设置文件类型
    header('Content-type: application/zip');
    // 设置文件名并下载
    header('Content-Disposition: attachment; filename="'.basename($filename).'"');
    // 输出文件并下载
    readfile($filename);
?>