<?php
if (isset($_POST['id'], $_POST['qt'])) {
    $_SESSION['cart'][$_POST['id']] = $_POST['qt'];
}
// if (!isset($_SESSION['mem'])) {
//     to("index.php?do=mem");
// }
?>
<h2 class="ct"><?= $_SESSION['mem'] ?>的購物車</h2>
<table width="90%" style="margin:auto">
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
                <td class="pp"><img src="./icon/0415.jpg" onclick="delCart(<?= $id ?>)"></td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="7" class="pp">
                <h3 class="ct" style="color:antiquewhite">尚未加入商品</h3>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<h2 class="ct"><img src="./icon/0411.jpg" onclick="location.href='index.php'"> <img src="./icon/0412.jpg"
        onclick="location.href='?do=checkout'"></h2>
<script>
    function delCart(id) {
        $.post('./api/del_cart.php', {
            id
        }, function() {
            location.reload();
        })
    }
</script>