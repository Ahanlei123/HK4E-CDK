<?php

if(!function_exists("pageft")){

    function pageft($totle,$displaypg=20,$realtotal,$url=''){

        global $page,$firstcount,$pagenav,$_SERVER;

        $GLOBALS["displaypg"]=$displaypg;
        $page=isset($_GET['page'])?$_GET['page']:1;  //判断是否存在
 
        if(!$url){
            $url=$_SERVER["REQUEST_URI"];
            $thisurl = $_SERVER["REQUEST_URI"];
        }
        //echo "url:".$url."<br>";
        //URL分析：
        $parse_url=parse_url($url);
        //echo "parse_url:".$parse_url."<br>";

        $url_query=@$parse_url["query"]; //单独取出URL的查询字串
        //echo "url_query:".$url_query."<br>";

        if($url_query){

            $url_query = preg_replace("#(^|&)page=$page#","",$url_query);

            $url=str_replace($parse_url["query"],$url_query,$url);
            //echo "url:".$url."<br>";
            //在URL后加page查询信息，但待赋值：
            if($url_query) $url.="&page"; else $url.="page";
        } else {
            $url.="?page";
        }
        //echo "url:".$url."<br>";

        $lastpg=ceil($totle/$displaypg); //最后页，也是总页数
        $page=min($lastpg,$page);
        $prepg=$page-1; //上一页
        $nextpg=($page==$lastpg ? 0 : $page+1); //下一页
        $firstcount=($page-1)*$displaypg;

        //开始分页导航条代码：
        $pagenav="第 <B>".($totle?($firstcount+1):0)."</B>-<B>".min($firstcount+$displaypg,$totle)."</B> 条，共<B> $realtotal </B>条记录";

        //如果只有一页则跳出函数：
        if($lastpg<=1) return false;

        $pagenav.=" <a href=$url=1 mce_href=$url=1>首页</a> ";
        if($prepg) $pagenav.=" <a href=$url=$prepg mce_href=$url=$prepg>上页</a> "; else $pagenav.=" 上页 ";
        if($nextpg) $pagenav.=" <a href=$url=$nextpg mce_href=$url=$nextpg>下页</a> "; else $pagenav.=" 下页 ";
        $pagenav.=" <a href=$url=$lastpg mce_href=$url=$lastpg>尾页</a> ";

        //下拉跳转列表，循环列出所有页码：
        $pagenav.="  到第 <select name='topage' size='1'  style='font-size:12px' mce_style='font-size:12px' onchange='window.location=\"$url=\"+this.value'>\n";
        for($i=1;$i<=$lastpg;$i++){
            if($i==$page) $pagenav.="<option value='$i' selected>$i</option>\n";
            else $pagenav.="<option value='$i'>$i</option>\n";
        }
        $pagenav.="</select> 页，共 $lastpg 页";
    }

}

?>