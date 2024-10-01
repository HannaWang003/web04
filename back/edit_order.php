<?php
$row = $Order->find($_GET['id']);
$cart = unserialize($row['cart']);
?>
<h2 class="ct">訂單編號<?= $row['no'] ?>的詳細資料</h2>
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
    foreach ($cart as $id => $qt) {
        $g = $Goods->find($id);
    ?>
        <tr>
            <th class="pp"><?= $g['text'] ?></th>
            <th class="pp"><?= $g['no'] ?></th>
            <th class="pp"><?= $qt ?></th>
            <th class="pp"><?= $g['price'] ?></th>
            <th class="pp"><?= $g['price'] * $qt ?></th>
        </tr>
    <?php
    }
    ?>
    <tr>
        <th class="tt ct" colspan="5"><b>總價: <span><?= $row['total'] ?></span></b></th>
    </tr>
</table>
<div class="ct"><button onclick="history.go(-1)">返回</button></div>