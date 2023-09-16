<?php include "./jc.php"; 
?>
<!DOCTYPE html>
<html>
    
<!-- Mirrored from www.zi-han.net/theme/hplus/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.33,minimum-scale=1.0,maximum-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <title>会员注册-3.4剧情服</title>
        <meta http-equiv="Content-Language" content="zh-CN">
        <link rel="stylesheet" rev="stylesheet" href="css/fonts/iconfont.css" type="text/css" media="all">
        <link rel="stylesheet" rev="stylesheet" href="css/txcstx.css" type="text/css" media="all">
        <style> body{color:#;}a{color:#;}a:hover{color:#;}.bg-black{background-color:#;}.tx-login-bg{background:url(img/bg.jpg) no-repeat 0 0;}</style>
</head>
<body class="tx-login-bg">
    <div class="tx-login-box">
        <div>
            <div class="login-avatar bg-black"><i class="iconfont icon-friendadd"></i></div>
            <ul class="tx-form-li row">
            <form class="m-t" action="registerReg1.php" method="post" enctype="multipart/form-data">
                <li class="col-24 col-m-24"><p><input type="text" name="username" id="username" class="tx-input"><i>账号(*)</i></p></li>
                <li class="col-24 col-m-24"><p><input type="text" name="sex" id="sex" class="tx-input"><i>QQ(*)</i></p></li>
                <li class="col-24 col-m-24"><p><input type="password" name="pw" id="pw" class="tx-input"><i>密码(*)</i></p></li>
                <li class="col-24 col-m-24"><p><input type="password" name="pw_sure" id="pw_sure" class="tx-input"><i>确认密码(*)</i></p></li>
                <?php
                session_start();
                $code = $_SESSION["captcha"]; 
                ?>
                <!--<li class="col-24 col-m-24"><p><input type="text" name="cdk" id="cdk" class="tx-input"><i>注册卡密(*)</i></p></li>-->
                <li class="col-24 col-m-24"><p><input type="text" name="tel" id="tel" class="tx-input"><i>注册手机(*)</i></p></li>
                <?php
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    echo '<li class="col-24 col-m-24"><p><input type="text" name="yqr" id="yqr" class="tx-input" value="'.$id.'"><i>邀请人</i></p></li>';
                }
                ?>
                <li class="col-16 col-m-14"><p><input type="text" name="code" id="code" class="tx-input"><i>短信验证码(*)</i></p><li class="col-8 col-m-5"><p class="tx-input-full"><input type="button" id="btn" value="获取" class="tx-btn tx-btn-big bg-black"></p></li></li>
                <li class="col-24 col-m-24"><p class="tx-input-full"><input type="submit" value="注册" onclick="return jqueryCheck();" class="tx-btn tx-btn-big bg-black"></p></li>
                <li class="col-12 col-m-12"><p class="f-12 f-gray">已有账户？<a href="index.php">去登陆</a></p></li>
                <li class="col-12 col-m-12"><p class="ta-r"><a href="resetpwd.html" class="f-12 f-gray">忘记密码</a></p></li>
                </p>
            </form>
            </ul>
        </div>
    </div>
    <script src="jquery-1.9.1.min.js"></script>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    <script src="./sweetalert.min.js"></script>
    <script type="text/javascript">
    $('#btn').click(function(){
      var tel = $.trim($('#tel').val());
      //$.post('./user/SendTemplateSMS.php', {'tel':tel},function(res){
        $.post('./user/SendTemplateSMS1.php', {'tel':tel},function(res){
        if (res == "ok") {
          swal('短信发送成功！','','success');
        }else{
            if (res == "cdkon") {
                swal('注册卡密错误或者已被使用，无法获取短信！','','warning');
            } else {
                swal('短信发送失败，请在 '+res+' 秒后重试，如多次失败请联系管理员！','','warning');
            }
        }
      });
    });
  </script>
     <script>
        //使用js验证
        function check() {
            var name, pw;
            name = document.getElementById("username").value.trim();
            pw = document.getElementById("pw").value.trim();
            if (name == "") {
                alert("：请输入你的用户名！");
                return false;
            }
            if (pw == "") {
                alert("请输入你的密码！");
                return false;
            }
        }
        //异步查询
        $(function () {
            $("#username").blur(function () {   //焦点离开时
                $.ajax({                          //异步获取数据
                    url:"./user/check_username.php",   //地址
                    data:{    //对象
                        username:$("#username").val()
                    },
                    type:"POST",
                    dataType:"JSON",
                    timeout:2000,
                    success:function (msg){
                        $(".hide").hide();
                        if(msg.error ==1)
                        {
                            swal('此用户名已被占用，请重新输入','','warning');
                        }
                        else{
                            //对于用户名的格式判断
                            if($("#username").val() == "")
                            {
                                $("#usernameTips").html("<span style='color:red'>用户名不能为空</span>");
                                $("#username").focus();
                            }
                            else{
                                $("#usernameTips").html("<span style='color:green'>此用户名可以使用</span>");
                            }
                        }
                    },
                    beforeSend:function () {
                        $(".hide").show();
                    },
                    error:function (d1,d2,d3) {
                        $(".hide").hide();
                        //alert('用户名是否被占用出错！');
                    }
                });
                // console.log(t);   可能是同时执行的
            })
        });

        //使用jq验证
        function jqueryCheck() {
            var errMsg = "", errLog = 0, name, code, pw,pw_sure;
            pw = $("#pw").val().trim();
            pw_sure = $("#pw_sure").val().trim();
            name = $("#username").val().trim();
            code = $("#code").val().trim();
            if (name == "") {
                errLog = 1;
                errMsg += "请输入你的用户名！\n";
            }
            if (pw == "") {
                errLog = 1;
                errMsg += "请输入你的密码！\n";
            }
            if (pw_sure == ""){
                errLog = 1;
                errMsg += "请确认你的密码！\n";
            }
            if (pw_sure != pw){
                errLog = 1;
                errMsg += "请保持你两次输入的密码一致！\n";
            }
            if (code == "") {
                errLog = 1;
                errMsg += "请输入验证码!\n";
            }
            if (errLog == 1) {
                alert(errMsg);
                return false;
            }
        }
    </script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->
</html>
