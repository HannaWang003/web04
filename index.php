<?php
include_once "./api/db.php";
if (isset($_POST['id'], $_POST['qt'])) {
        foreach ($_POST['id'] as $idx => $id) {
                if ($_POST['qt'][$idx] <= 0) {
                        unset($_SESSION['cart'][$id]);
                } else {
                        $_SESSION['cart'][$id] = $_POST['qt'][$idx];
                }
        }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                <div id="top" style="display:flex;justify-content:space-between;">
                        <a href="index.php" style="width:55%;">
                                <img src="./icon/0416.jpg" style="width:100%;">
                        </a>
                        <div style="padding:10px;">
                                <a href="?">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=look">購物流程</a> |
                                <a href="?do=buycart">購物車</a> |
                                <?php
                                if (!isset($_SESSION['mem'])) {
                                ?>
                                        <a href="?do=mem">會員登入</a>
                                <?php
                                } else {
                                ?>
                                        <a href="./api/logout.php?do=mem">登出</a>
                                <?PHP
                                }
                                ?>
                                |
                                <a href="<?= (isset($_SESSION['admin'])) ? "back.php" : "?do=admin" ?>">管理登入</a>
                        </div>
                </div>
                <div id="left" class="ct">
                        <div style="height:450px;overflow:auto;scrollbar-width:none;">
                                <a href='index.php'>全部商品(<?= $Goods->count(['sh' => 1]) ?>)</a>
                                <?php
                                $bigs = $Th->all(['big_id' => 0]);
                                foreach ($bigs as $big) {
                                ?>
                                        <div class="big">
                                                <a href='?type=<?= $big['id'] ?>'><?= $big['name'] ?>(<?= $Goods->count(['sh' => 1, 'big' => $big['id']]) ?>)</a>
                                                <?php
                                                $mids = $Th->all(['big_id' => $big['id']]);
                                                foreach ($mids as $mid) {
                                                ?>
                                                        <a href="?type=<?= $mid['id'] ?>" class="mid" style="background:lightgreen;display:none"><?= $mid['name'] ?>(<?= $Goods->count(['sh' => 1, 'mid' => $mid['id']]) ?>)</a>
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
                <script>
                        $('.big').hover(function() {
                                $(this).find('.mid').slideDown(500);
                        }, () => {
                                $('.mid').slideUp()
                        })
                </script>
                <div id="right">
                        <marquee behavior="" direction="">年終特賣會開跑了 &nbsp; 情人節特惠活動</marquee>
                        <?php
                        $do = ($_GET['do']) ?? "main";
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