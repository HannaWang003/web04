<?php
if (!isset($_SESSION['mem'])) {
    to("?do=mem");
}
?>
<h2 class="ct">
    <?= $_SESSION['mem'] ?>的購物車
</h2>
<style>
table {
    width: 80%;
    margin: auto;

    td {
        padding: 10px;
    }
}
</style>
<table style="margin:auto;">
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
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item => $num) {
            $row = $Goods->find($item);
    ?>
    <tr>
        <td class="pp"><?= $row['no'] ?></td>
        <td class="pp"><?= $row['name'] ?></td>
        <td class="pp"><?= $num ?></td>
        <td class="pp"><?= $row['stock'] ?></td>
        <td class="pp"><?= $row['price'] ?></td>
        <td class="pp"><?= $row['price'] * $num ?></td>
        <td class="pp">
            <img src="./icon/0415.jpg" onclick="location.href='./api/del_cart.php?id=<?= $row['id'] ?>'">
        </td>
    </tr>
    <?php
        }
        ?>
    <tr>
        <td colspan="7" class="ct"><a href="index.php"><img src="./icon/0411.jpg" alt=""></a> <a
                href="?do=checkout"><img src="./icon/0412.jpg" alt=""></a></td>
    </tr>
    <?php
    } else {
    ?>
    <tr>
        <td class="pp ct" colspan="7">
            <h3>(空)</h3>
        </td>
    </tr>
    <tr>
        <td class="ct" colspan="7"><a href="index.php"><img src="./icon/0411.jpg" alt=""></a></td>
    </tr>
    <?php
    }
    ?>
</table>