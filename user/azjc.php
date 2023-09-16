<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/form_wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:28 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 表单向导</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
       
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>安装教程</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_wizard.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_wizard.html#">选项1</a>
                                </li>
                                <li><a href="form_wizard.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <h2>
                                安卓安装教程
                            </h2>
                        <p>
                            安卓安装教程
                        </p>

                        <form id="form" action="http://www.zi-han.net/theme/hplus/form_wizard.html#" class="wizard-big">
                            <h1>第一步</h1>
                            <fieldset>
                                <h2>下载客户端</h2>
                                <div class="row">
                                <p>下载地址：</p>
                                <p>下载地址：</p>
                                <p>这个不用教自己下载安装就可以了</p>
                                </div>
                            </fieldset>
                            <h1>第二步</h1>
                            <fieldset>
                                <h2>下载资源包</h2>
                                <div class="row">
                                    <p>打开游戏后弹窗选择-官方服务器</p>
                                    <p>注册登录官方服务器账号密码（如果实在不会可以登录这个）</p>
                                    <p>进去后选服务器，选择第三个然后下载</p>
                                    <p>如果下载慢，可以尝试换一个服务器</p>
                                    <p>下载完成后可以正常进入游戏了在退出游戏</p>
                                </div>
                            </fieldset>

                            <h1>第三步</h1>
                            <fieldset>
                                <h2>设置私服</h2>
                                <div class="row">
                                    <p>打开游戏后弹窗选择-设置</p>
                                    <p>勾选两个选项，全部勾选</p>
                                    <p>然后退出游戏</p>
                                </div>
                            </fieldset>

                            <h1>第四步</h1>
                            
                            <fieldset>
                                <h2>进入服务器</h2>
                                <p>打开游戏后弹窗选择-自定义服务器</p>
                                <p>然后登录此网站注册的账号</p>
                                <p>服务器自己选一个 数据有的是互通的，根据自己情况选</p>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/content.min.js?v=1.0.0"></script>
    <script src="js/plugins/staps/jquery.steps.min.js"></script>
    <script src="js/plugins/validate/jquery.validate.min.js"></script>
    <script src="js/plugins/validate/messages_zh.min.js"></script>
    <script>
        $(document).ready(function(){$("#wizard").steps();$("#form").steps({bodyTag:"fieldset",onStepChanging:function(event,currentIndex,newIndex){if(currentIndex>newIndex){return true}if(newIndex===3&&Number($("#age").val())<18){return false}var form=$(this);if(currentIndex<newIndex){$(".body:eq("+newIndex+") label.error",form).remove();$(".body:eq("+newIndex+") .error",form).removeClass("error")}form.validate().settings.ignore=":disabled,:hidden";return form.valid()},onStepChanged:function(event,currentIndex,priorIndex){if(currentIndex===2&&Number($("#age").val())>=18){$(this).steps("next")}if(currentIndex===2&&priorIndex===3){$(this).steps("previous")}},onFinishing:function(event,currentIndex){var form=$(this);form.validate().settings.ignore=":disabled";return form.valid()},onFinished:function(event,currentIndex){var form=$(this);form.submit()}}).validate({errorPlacement:function(error,element){element.before(error)},rules:{confirm:{equalTo:"#password"}}})});
    </script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/form_wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:29 GMT -->
</html>
