<!DOCTYPE html>
<html>
<head>
    <title>MOD下载系统</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css?v=3.3.6">
    <link href="css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <script src="js/lightbox-plus-jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
</head>
<body class="gray-bg">
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <div class="container">
        <div class="page-header">
            <h1>MOD下载系统 <small>3.4剧情服</small></h1>
        </div>
        <!-- 分类标签 -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">全部</a></li>
            <li role="presentation"><a href="#cat1" aria-controls="cat1" role="tab" data-toggle="tab">可莉</a></li>
            <li role="presentation"><a href="#cat2" aria-controls="cat2" role="tab" data-toggle="tab">雷电将军</a></li>
        </ul>

        <!-- 图片预览 -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="all">
                <div class="row">
                    <?php
                        // 连接 MySQL 数据库
                        include "./user/cus_check.php";
                        if(!$conn) {
                            die("连接失败：" . mysqli_connect_error());
                        }
                        
                        // 查询数据库中的图片信息
                        $sql = "select * from mod_xz";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='col-md-3'><a href='" . $row['image_file'] . "' data-lightbox='image-gallery'><img src='" . $row['image_file'] . "' class='img-thumbnail' alt='" . $row['image_name'] . "'></a>
                                <a class='btn btn-primary' href='download.php?file=" . urlencode($row['image_xz']) . "'>下载MOD</a>
                                </div>";
                                // 根据需要将图片添加到不同分类的列表中
                                $i++;
                            }
                        } else {
                            echo "<p>暂无图片信息</p>";
                        }
                        // 关闭数据库连接 
                        mysqli_close($conn);
                    ?>
                </div>
            </div>

            <!-- 分类列表 -->
            <div role="tabpanel" class="tab-pane" id="cat1">
                <div class="row">
                    <?php
                        // 连接 MySQL 数据库
                        include "./user/cus_check.php";
                        if(!$conn) {
                            die("连接失败：" . mysqli_connect_error());
                        }
                        
                        // 查询数据库中的分类 1 图片信息
                        $sql = "SELECT * FROM mod_xz WHERE category='1'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='col-md-3'><a href='" . $row['image_file'] . "' data-lightbox='image-gallery'><img src='" . $row['image_file'] . "' class='img-thumbnail' alt='" . $row['image_name'] . "'></a>
                                <a class='btn btn-primary' href='download.php?file=" . urlencode($row['image_xz']) . "'>下载MOD</a>
                                </div>";
                                $i++;
                            }
                        } else {
                            echo "<p>暂无相关图片信息</p>";
                        }
                        // 关闭数据库连接 
                        mysqli_close($conn);
                    ?>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="cat2">
                <div class="row">
                    <?php
                        // 连接 MySQL 数据库
                        include "./user/cus_check.php";
                        if(!$conn) {
                            die("连接失败：" . mysqli_connect_error());
                        }
                        
                        // 查询数据库中的分类 2 图片信息
                        $sql = "SELECT * FROM mod_xz WHERE category='2'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='col-md-3'><a href='" . $row['image_file'] . "' data-lightbox='image-gallery'><img src='" . $row['image_file'] . "' class='img-thumbnail' alt='" . $row['image_name'] . "'></a>
                                <a class='btn btn-primary' href='download.php?file=" . urlencode($row['image_xz']) . "'>下载MOD</a>
                                </div>";
                                $i++;
                            }
                        } else {
                            echo "<p>暂无相关图片信息</p>";
                        }
                        // 关闭数据库连接 
                        mysqli_close($conn);
                    ?>
                    </div>
                </div>
            </div>
        </div>
         </div>
            </div>
        </div>
         </div>
            </div>
        </div>
    </div>
</body>
</html>