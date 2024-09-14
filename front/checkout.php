<?php
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<h2 class="ct">填寫資料</h2>
<table class="all">
    <tr>
        <th class="tt">登入帳號</th>
        <td class="pp" colspan="5"><?= $_SESSION['mem'] ?></td>
    </tr>
    <tr>
        <th class="tt" width="40%">姓名</th>
        <td class="pp" colspan="5"><input type="text" name="name" id="name" value="<?= $mem['name'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp" colspan="5"><input type="text" name="email" id="email" value="<?= $mem['email'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp" colspan="5"><input type="text" name="addr" id="addr" value="<?= $mem['addr'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp" colspan="5"><input type="text" name="tel" id="tel" value="<?= $mem['tel'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">商品名稱</th>
        <th class="tt">編號</th>
        <th class="tt">數量</th>
        <th class="tt">單價</th>
        <th class="tt">小計</th>
    </tr>
    <?php
    $sum = 0;
    foreach ($_SESSION['cart'] as $good => $qt) {
        $g = $Goods->find($good);
        $sum = $sum + $g['price'] * $qt;
    ?>
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
        <td class="tt ct" colspan="5">總價:<?= $sum ?></td>
    </tr>
</table>