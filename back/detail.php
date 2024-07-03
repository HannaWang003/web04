<?php
$row = $Order->find($_GET['id']);
?>
<h2 class="ct">訂單編號<span style="color:red"><?= $row['no'] ?></span>的詳細資料</h2>
<table class="all">
    <tr>
        <th class="tt">姓名</th>
        <td class="pp"><?= $row['name'] ?></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp"><?= $row['email'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp"><?= $row['addr'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp"><?= $row['tel'] ?></td>
    </tr>
</table>
<table class="all">
    <tr>
        <th class="tt">商品名稱</th>
        <th class="tt">編號</th>
        <th class="tt">數量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
    </tr>
    <?php
    $total = 0;
    $cart = unserialize($row['cart']);
    foreach ($cart as $id => $qt) {
        $g = $Goods->find($id);
    ?>
        <tr>
            <td class="pp"><?= $g['name'] ?></td>
            <td class="pp"><?= $g['no'] ?></td>
            <td class="pp"><?= $qt ?></td>
            <td class="pp"><?= $g['price'] ?></td>
            <td class="pp"><?= $g['price'] * $qt ?></td>
        </tr>
    <?php
        $total += ($g['price'] * $qt);
    }
    ?>
    <tr>
        <td class="tt ct" colspan="5">總價: <?= $total ?></td>
    </tr>
</table>
<div class="ct"><button onclick="history.go(-1)">返回</button></div>