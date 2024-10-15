<?php
include_once "./api/db.php";
?>
<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>┌精品電子商務網站」</title>
        <link href="./file/css.css" rel="stylesheet" type="text/css">
        <script src="./file/js.js"></script>
        <script src="./file/jquery-1.9.1.min.js"></script>
</head>

<body>
        <div id="main">
                <div id="top" style="display:flex;">
                        <a href="index.php">
                                <img src="./icon/0416.jpg" style="width:100%">
                        </a>
                        <div style="padding:10px;width:50%;">
                                <a href="index.php">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=look">購物流程</a> |
                                <a href="?do=buycart">購物車</a> |
                                <?= (isset($_SESSION['mem'])) ? "<a onclick='location.href=`./api/logout.php?do=mem`'>登出</a>" : "<a href='?do=mem'>會員登入</a>" ?>
                                |
                                <a href="<?= (isset($_SESSION['admin'])) ? "back.php" : "?do=admin" ?>">管理登入</a>
                        </div>
                </div>
                <div id="left" class="ct">
                        <div style="min-height:400px;">
                                <div class="ww"><a href="?type=0">全部商品</a></div>
                                <?php
                                $bigs = $Th->all(['big_id' => 0]);
                                foreach ($bigs as $big) {
                                        $tmp = $Goods->count(['big' => $big['id']]);
                                ?>
                                        <div class="ww">
                                                <a href="?type=<?= $big['id'] ?>"><?= $big['name'] ?>(<?= $tmp ?>)</a>
                                                <?php
                                                $mids = $Th->all(['big_id' => $big['id']]);
                                                foreach ($mids as $mid) {
                                                        $tmp = $Goods->count(['mid' => $mid['id']]);
                                                ?>
                                                        <div class="s"><a href="?type=<?= $mid['id'] ?>"
                                                                        style="background:lightgreen;"><?= $mid['name'] ?>(<?= $tmp ?>)</a></div>
                                                <?php
                                                }
                                                ?>
                                        </div>
                                <?php
                                }
                                ?>
                        </div>
                        <span>
                                <div>進站總人數</div>
                                <div style="color:#f00; font-size:28px;">
                                        00005 </div>
                        </span>
                </div>
                <div id="right" style="display:none">
                        <marquee behavior="" direction="">年終特賣會開跑了 &nbsp; 情人節特惠活動</marquee>
                        <?php
                        $do = ($_GET['do']) ?? "main";
                        $file = "./front/$do.php";
                        if (file_exists($file)) {
                                $DB = (${ucfirst($do)}) ?? "";
                                include $file;
                        } else {
                                include "./front/main.php";
                        }
                        ?>
                </div>
                <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
                        <?= $Bottom->find(1)['bottom'] ?></div>
        </div>
        <script>
                $(document).ready(() => {
                        $('marquee').show();
                        $('#right').fadeIn(1000);
                })
        </script>
</body>

</html>