<?php
if (isset($_GET['id'], $_GET['qt'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
    to("?do=buycart");
}
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
        // 商品列表
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $qt) {
            $g = $Goods->find($id);
            $sum = $qt * $g['price'];
            $total += $sum;
        ?>
            <tr>
                <td class="pp"><?= $g['no'] ?></td>
                <td class="pp"><?= $g['name'] ?></td>
                <td class="pp"><?= $qt ?></td>
                <td class="pp"><?= $g['stock'] ?></td>
                <td class="pp"><?= $g['price'] ?></td>
                <td class="pp"><?= $sum ?></td>
                <td class="pp"><img src="./icon/0415.jpg" onclick="del('cart',<?= $g['id'] ?>)"></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td class="tt ct" colspan="7">總價：<?= $total ?></td>
        </tr>
    </table>
    <div class="ct"><a href="index.php"><img src="./icon/0411.jpg" alt=""></a> <a href="?do=checkout"><img src="./icon/0412.jpg" alt=""></a>
    </div>
<?php
}

?>
<script>
    function del(table, id) {
        $.post('./api/del.php', {
            table,
            id
        }, () => {
            location.reload();
        })
    }
</script>