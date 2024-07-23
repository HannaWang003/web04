<?php
if (isset($_GET['id'], $_GET['qt'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if (!isset($_SESSION['mem'])) {
    to("?do=mem");
}
?>
<h2 class="ct"><?= $_SESSION['mem'] . "的購物車" ?></h2>
<?php
if (empty($_SESSION['cart'])) {
    echo "<h3 class='ct'>目前購物車內尚無商品</h3>";
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
        foreach ($_SESSION['cart'] as $id => $qt) {
            $row = $Goods->find($id);
            $sum = $qt * $row['price'];
        ?>
    <tr>
        <td class="pp"><?= $row['no'] ?></td>
        <td class="pp"><?= $row['name'] ?></td>
        <td class="pp"><?= $qt ?></td>
        <td class="pp"><?= $row['stock'] ?></td>
        <td class="pp"><?= $row['price'] ?></td>
        <td class="pp"><?= $sum ?></td>
        <td class="pp"><button onclick="del_cart(this,<?= $row['id'] ?>)"><img src="./icon/0415.jpg" alt=""></button>
        </td>
    </tr>
    <?php
        }
        ?>
</table>
<div class="ct"><a href="?do=main"><img src="./icon/0411.jpg" alt=""></a> <a href="?do=checkout"><img
            src="./icon/0412.jpg" alt=""></a></div>
<?php
    }
    ?>
<script>
function del_cart(dom, id) {
    $.get('./api/del_cart.php', {
        id
    }, () => {
        $(dom).parents('tr').remove();
    })
}
</script>