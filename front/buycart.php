<?php
if (isset($_POST['id'], $_POST['qt'])) {
    $_SESSION['cart'][$_POST['id']] = $_POST['qt'];
}
if (!isset($_SESSION['mem'])) {
    to("?do=mem");
}
?>
<h2 class="ct"><?= $_SESSION['mem'] ?>的購物車</h2>
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
                <td class="pp"><?= $g['price'] * $qt ?></td>
                <td class="pp"><img src="./icon/0415.jpg" onclick="del(this,<?= $id ?>)"></td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <th class="pp" colspan="7">
                <h3 style="color:#eee;">尚末加入商品</h3 style="color:#eee;">
            </th>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><img src="./icon/0411.jpg" onclick="location.href='index.php'">
    <?= (empty($_SESSION['cart'])) ? "" : "<img src='./icon/0412.jpg' onclick='location.href=`?do=checkout`'>" ?>

</div>
<script>
    function del(dom, id) {
        $.get('./api/del_cart.php', {
            id
        }, () => {
            $(dom).parents('tr').remove();
        })
    }
</script>