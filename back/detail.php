<?php
$ord = $Order->find($_GET['id']);
$ord['cart'] = unserialize($ord['cart']);
?>
<h2 class="ct">訂單<span style="color:red"><?= $ord['no'] ?></span>的詳細資料</h2>
<table class="all">
    <tr>
        <th class="tt" style="width:40%;">會員帳號</th>
        <td class="pp"><?= $ord['acc'] ?></td>
    </tr>
    <tr>
        <th class="tt" style="width:40%;">姓名</th>
        <td class="pp"><?= $ord['name'] ?></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp"><?= $ord['email'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp"><?= $ord['addr'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp"><?= $ord['tel'] ?></td>
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
    foreach ($ord['cart'] as $id => $qt) {
        $g = $Goods->find($id);
    ?>
        <tr>
            <td class="pp"><?= $g['name'] ?></td>
            <td class="pp"><?= $g['no'] ?></td>
            <td class="pp"><?= $qt ?></td>
            <td class="pp"><?= $g['price'] ?></td>
            <td class="pp"><?= $qt * $g['price'] ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="5" class="tt ct">總價:<?= $ord['total'] ?></td>
    </tr>
</table>
<div class="ct"><input type="button" onclick="history.go(-1)" value="返回">
</div>