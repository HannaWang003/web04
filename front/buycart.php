<?php
if (!isset($_SESSION['mem'])) {
    to("?do=mem");
}
?>
<h2 class="ct"><span><?= ($_SESSION['mem']) ?></span>的購物車</h2>
<table width="90%" style="margin:auto;">
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
            <td class="pp ct"><?= $g['no'] ?></td>
            <td class="pp ct"><?= $g['text'] ?></td>
            <td class="pp ct"><?= $qt ?></td>
            <td class="pp ct"><?= $g['stock'] ?></td>
            <td class="pp ct"><?= $g['price'] ?></td>
            <td class="pp ct"><?= $g['price'] * $qt ?></td>
            <td class="pp ct"><img src="./icon/0415.jpg" onclick="del(<?= $g['id'] ?>)"></td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct" style="margin:10px;"><a href="index.php"><img src="./icon/0411.jpg" alt=""></a>
    <?php
    if (!empty($_SESSION['cart'])) {
    ?>
        <a href="?do=checkout"><img src="./icon/0412.jpg" alt=""></a>
    <?php
    }
    ?>
</div>
<script>
    function del(id) {
        $.post('./api/edit_cart.php', {
            id
        }, () => {
            location.href = "?do=buycart"
        })
    }
</script>