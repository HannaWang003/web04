<?php
$row = $Order->find(['no' => $_GET['no']]);
?>
<h2 class="ct">訂單編號<span style="color:red"><?= $row['no'] ?></span>的詳細資料</h2>
<?php
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<table class="all">
    <tr>
        <th class="tt">會員帳號</th>
        <td class="pp" colspan="5"><?= $row['acc'] ?></td>
    </tr>
    <tr>
        <th class="tt" width="40%">姓名</th>
        <td class="pp" colspan="5"><?= $row['name'] ?></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp" colspan="5"><?= $row['email'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp" colspan="5"><?= $row['addr'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp" colspan="5"><?= $row['tel'] ?></td>
    </tr>
    <tr>
        <th class="tt">商品名稱</th>
        <th class="tt">編號</th>
        <th class="tt">數量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
    </tr>
    <?php
    $goods = unserialize($row['cart']);
    foreach ($goods as $good => $qt) {
        $g = $Goods->find($good);    ?>
        <tr>
            <td class="pp ct"><?= $g['name'] ?></td>
            <td class="pp ct"><?= $g['no'] ?></td>
            <td class="pp ct"><?= $qt ?></td>
            <td class="pp ct"><?= $g['price'] ?></td>
            <td class="pp ct"><?= $qt * $g['price'] ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td class="tt ct" colspan="5">總價:<?= $row['total'] ?></td>
    </tr>
</table>
<div class="ct">
    <input type="button" value="返回" onclick="history.go(-1)">
</div>