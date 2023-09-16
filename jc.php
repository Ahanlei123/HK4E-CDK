<?php
$conf['电话jump']=1;
if(strpos($_SERVER['HTTP_USER_AGENT'], 'QQ/')!==false && $conf['电话jump']==1){$a='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
include 'qq.html';
exit;} 
/*
反腾讯网址平安检测系统
Description:屏障腾讯电脑管家网址平安检测
Version:2.6
*/
//IP屏障