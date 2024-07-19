<?php
$o = $Order->find($_GET['id']);
$o['cart'] = unserialize($o['cart']);
?>
<h1 class="ct">訂單編號<?= $o['no'] ?>的詳細資料</h1>
<table class="all">
    <tr>
        <th class="tt">會員帳號</th>
        <td class="pp"><?= $o['acc'] ?>
        </td>
    </tr>
    <tr>
        <th class="tt" style="width:40%">姓名</th>
        <td class="pp"><?= $o['name'] ?></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp"><?= $o['email'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp"><?= $o['addr'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp"><?= $o['tel'] ?></td>
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
    // 商品列表
    $total = 0;
    foreach ($o['cart'] as $id => $qt) {
        $g = $Goods->find($id);
        $sum = $qt * $g['price'];
        $total += $sum;
    ?>
        <tr>
            <td class="pp"><?= $g['name'] ?></td>
            <td class="pp"><?= $g['no'] ?></td>
            <td class="pp"><?= $qt ?></td>
            <td class="pp"><?= $g['price'] ?></td>
            <td class="pp"><?= $sum ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td class="tt ct" colspan="7">總價：<?= $total ?></td>
    </tr>
</table>
<div class="ct"><button onclick="history.go(-1)">返回</button>
</div>