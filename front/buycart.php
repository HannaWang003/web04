<?php
if (!isset($_SESSION['mem'])) {
    to("?do=login");
}
?>
<h1 class="ct"><?= $_SESSION['mem'] ?>的購物車</h1>
<?php
if (empty($_SESSION['cart'])) {
    echo "<h2 class='ct'>購物車尚無商品</h1>";
} else {
?>
    <!-- 商品列表 -->
<?php
}

?>