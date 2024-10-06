<?php
include_once "db.php";
$row = $DB->find($_POST);
$row['cart'] = unserialize($row['cart']);
?>
<h1 class="ct">訂單編號<?= $row['no'] ?></h1>
<table class="all">
    <tr>
        <th class="tt">會員帳號</th>
        <td class="pp" colspan="4"><?= $row['acc'] ?></td>
    </tr>
    <tr>
        <th class="tt">姓名</th>
        <td class="pp" colspan="4"><?= $row['name'] ?></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp" colspan="4"><?= $row['email'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp" colspan="4"><?= $row['addr'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp" colspan="4"><?= $row['tel'] ?></td>
    </tr>
    <tr>
        <th class="tt">商品名稱</th>
        <th class="tt">編號</th>
        <th class="tt">數量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
    </tr>
    <?php
    foreach ($row['cart'] as $id => $qt) {
        $g = $Goods->find($id);
    ?>
        <tr>
            <td class="pp"><?= $g['name'] ?></td>
            <td class="pp"><?= $g['price'] ?></td>
            <td class="pp"><?= $qt ?></td>
            <td class="pp"><?= $g['price'] ?></td>
            <td class="pp"><?= $g['price'] * $qt ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <th class="tt" colspan="5">總價 : <?= $row['total'] ?></th>
    </tr>
</table>
<div class="ct"><button onclick="location.reload()">返回</button></div>