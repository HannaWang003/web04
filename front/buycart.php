<?php
if (!isset($_SESSION['mem'])) {
    to("?do=mem");
}
?>
<h2 class="ct">
    <?= $_SESSION['mem'] ?>的購物車
</h2>
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
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item => $num) {
            $row = $Goods->find($item);
    ?>
            <tr>
                <td class="pp"><?= $row['no'] ?></td>
                <td class="pp"><?= $row['name'] ?></td>
                <td class="pp"><?= $num ?></td>
                <td class="pp"><?= $row['stock'] ?></td>
                <td class="pp"><?= $row['price'] ?></td>
                <td class="pp"><?= $row['prict'] * $num ?></td>
                <td class="pp"><button onclick="location.href='./api/del_cart.php?id=<?= $row['id'] ?>'"></button></td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <td class="pp ct" colspan="7">
                <h3>(空)</h3>
            </td>
        </tr>
        <tr>
            <td class="ct" colspan="7"><button onclick="location.href='index.php'">繼續選購商品</button></td>
        </tr>
    <?php
    }
    ?>
</table>