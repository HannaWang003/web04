<?php
include_once "./api/db.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/js.js"></script>
    <script src="./js/jquery-1.9.1.min.js"></script>
</head>

<body>
    <div id="main">
        <div id="top" style="display:flex;justify-content:space-between">
            <a href="?">
                <img src="./icon/0416.jpg" style="width:100%;">
            </a>
            <div style="padding:10px;width:50%">
                <a href="index.php">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?= (isset($_SESSION['mem'])) ? '<a href="./api/logout.php?do=mem">登出</a>' : '<a href="?do=mem">會員登入</a>' ?>
                |
                <?= (isset($_SESSION['admin'])) ? '<a href="back.php">返回管理</a>' : '<a href="?do=admin">管理登入</a>'; ?>

            </div>
        </div>
        <marquee behavior="" direction="">年終特賣會開跑了&nbsp;情人節特惠活動</marquee>
        <div id="left" class="ct">
            <div style="min-height:400px;;">
                <?php
                include "./front/menu.php";
                ?>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right">
            <?php
            $do = $_GET['do'] ?? "main";
            $file = "./front/$do.php";
            if (file_exists($file)) {
                include $file;
            } else {
                include "./front/main.php";
            }
            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(./icon/bot.png); color:#FFF;" class="ct">
            <?= $Bottom->find(1)['bottom'] ?></div>
    </div>

</body>

</html>