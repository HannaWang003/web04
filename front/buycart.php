<?php
if (isset($_GET['id']) && $_GET['qt']) {

    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if (!isset($_SESSION['mem'])) {
    to("?do=login");
}
echo "<h1 class='ct'>" . $_SESSION['mem'] . "的購物車</h1>";
if (!empty($_SESSION['cart'])) {
?>
    <table class="all">
        <tr>
            <th class="tt">編號</th>
            <th class="tt">商品名稱</th>
            <th class="tt">數量</th>
            <th class="tt">庫存量</th>
            <th class="tt">單價</th>
            <th class="tt">小計</th>
            <th class="tt">刪除</th>
        </tr>
        <?php
        foreach ($_SESSION['cart'] as $id => $qt) {
            $g = $Goods->find($id);
        ?>
            <tr>
                <td class="pp"><?= $g['no'] ?></td>
                <td class="pp"><?= $g['name'] ?></td>
                <td class="pp"><?= $qt ?></td>
                <td class="pp"><?= $g['stock'] ?></td>
                <td class="pp"><?= $g['price'] ?></td>
                <td class="pp"><?= $qt * $g['price'] ?></td>
                <td class="pp"><a onclick="del(<?= $id ?>)"><img src="./icon/0415.jpg" alt=""></a></td>
            </tr>

        <?php
        }
        ?>
    </table>
    <div class="ct">
        <a href="?do=main"><img src="./icon/0411.jpg" alt=""></a>
        <a href="?do=checkout"><img src="./icon/0412.jpg" alt=""></a>
    </div>
<?php
} else {
    echo "<h2 class='ct'>目前購物車尚無商品</h2>";
}
?>
<script>
    function del(item) {
        $.get('./api/del_cart.php', {
            item
        }, () => {
            location.href = "?do=buycart"
        })
    }
</script>