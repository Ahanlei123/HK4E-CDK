<?php  session_start()?>
 <!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">
    
</head>
<?php
//判断登录,此页面只有管理员登录才能登录
if(!isset($_SESSION['admin']) or !$_SESSION['admin'])
{
    echo "<script>alert('本页面只有管理员登录之后才能访问！');location.href='sign.php';</script>";
    exit;
}
include "cus_check.php";
$sql = "select * from cz_ddsj WHERE type = 'wxpay'";
//建立查找所有用户信息
$result = mysqli_query($root,$sql);
date_default_timezone_set('PRC');
//连接分页函数
include "page.php";
//查询当前行数
$count_rows = mysqli_num_rows($result);
$perPage = 300;    //每页行数
pageft($count_rows, $perPage, $count_rows);  //引用分页函数
$sql .= " limit $firstcount, $displaypg";   //追加查询信息
$result = mysqli_query($root, $sql);          //再次执行查询

$i =1; //序号
//传递参数
$page = isset($_GET['page'])?$_GET['page']:1;
$i = ($page -1) * $perPage + 1;


// 获取当前日期的 Y-m-d 格式


    if($_SESSION['name']=="8251633168"){
    }else{
    echo"<script>swal('大家好我是杨小川书城杨狗比，喜欢偷看小秘密！','','success');</script>";
    exit;
    }


?>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>充值管理<?php echo date("Y-m-d H:i:s");?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="cz.php">完成付款</a>
                                </li>
                                <li><a href="cz.php">等待付款</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>账号</th>
                                        <th>绑定</th>
                                        <th>商品</th>
                                        <th>金额</th>
                                        <th>游戏</th>
                                        <th>订单</th>
                                        <th>时间</th>
                                        <th>状态</th>
                                        <th>管理操作</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php while($Am = mysqli_fetch_array($result)){ ?>
                                    <tr>
                                        
                                        <td><?php echo $i?></td>
                                        <td><?php echo $Am['username']; ?></td>
                                        <td><?php echo $Am['uid']; ?></td>
                                        <td><?php echo $Am['name']; ?></td>
                                        <td><?php echo $Am['money']; ?></td>
                                        <td><?php 
                                        if($Am['gmdz'] == "1"){
                                            echo '3.4剧情服';
                                        }elseif($Am['gmdz'] == "2"){
                                            echo '3.4剧情服';
                                        } elseif($Am['gmdz'] == "3"){
                                            echo '3.4剧情服(拓展)';
                                        } elseif($Am['gmdz'] == "9"){
                                            echo '破解充值';
                                        } elseif($Am['gmdz'] == "8"){
                                            echo '逍遥原神';
                                        } elseif($Am['gmdz'] == "7"){
                                            echo '雪舞原神';
                                        } 
                                        ?></td>
                                        <td><?php echo $Am['dd']; ?></td>
                                        <td><?php echo $Am['ddsj']; ?></td>
                                        <td><?php 
                                        if($Am['zt'] == "1"){
                                            echo "<span style='color:green;'>以支付</span>";
                                        }else{
                                            echo "<span style='color:red;'>未支付</span>";
                                        } 
                                        ?></td>
                                        
                                        <td>
                                            <a id="btn-<?php echo $Am['dd']; ?>"><button type="button" class="btn btn-primary btn-xs">补单</button></a>
                                        </td>
                                        <?php $i++;?>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                        <td align="right"><?php echo $pagenav;?></td>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script src="js/demo/peity-demo.min.js"></script>
    <script src="./sweetalert.min.js"></script>
<script>
  $(document).ready(function() {
    $('a[id^="btn-"]').click(function() {
      var order_id = $(this).attr('id').substr(4); // 提取订单号
      $.post('process_order.php', { order_id: order_id }, function(response) {
        if (response == '1') {
          swal('补单失败', '当前订单已支付无需补单！', 'error');
        } else if (response == '0')  {
          swal('补单失败', '未查询到当前订单号！', 'error');
        } else if (response == '2')  {
          swal('补单成功', '普通用户补单成功！', 'success');
        } else if (response == '3')  {
          swal('补单成功', '超级用户补单成功！', 'success');
        } else if (response == '4')  {
          swal('补单失败', '请保持用户在线后再补单！', 'error');
        }
      });
    });
  });
</script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/table_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:20:01 GMT -->
</html>