<?php
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<h2 class="ct">填寫資料</h2>
<table class="all">
    <tr>
        <th class="tt" width="30%">登入帳號</th>
        <td class="pp" colspan="4"><?= $_SESSION['mem'] ?></td>
    </tr>
    <tr>
        <th class="tt">姓名</th>
        <td class="pp" colspan="4"><input type="text" name="name" id="name" value="<?= $mem['name'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp" colspan="4"><input type="text" name="email" id="email" value="<?= $mem['email'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp" colspan="4"><input type="text" name="addr" id="addr" value="<?= $mem['addr'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp" colspan="4"><input type="text" name="tel" id="tel" value="<?= $mem['tel'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">商品名稱</th>
        <td class="tt">編號</td>
        <td class="tt">數量</td>
        <td class="tt">單價</td>
        <td class="tt">小計</td>
    </tr>
    <?php
    $sum = 0;
    foreach ($_SESSION['cart'] as $id => $qt) {
        $g = $Goods->find($id);
        $sum += $g['price'] * $qt;
    ?>
    <tr>
        <th class="pp"><?= $g['name'] ?></th>
        <td class="pp"><?= $g['no'] ?></td>
        <td class="pp"><?= $qt ?></td>
        <td class="pp"><?= $g['price'] ?></td>
        <td class="pp"><?= $qt * $g['price'] ?></td>
    </tr>

    <?php
    }
    ?>
    <tr>
        <th class="tt" colspan="5">總價 : <?= $sum ?></th>
    </tr>
</table>
<div class="ct"><input type="button" value="確定送出" onclick="checkout()"><input type="button" value="返回修改訂單"
        onclick="history.go(-1)"></div>
<script>
function checkout() {
    let data = {
        name: $('#name').val(),
        email: $('#email').val(),
        addr: $('#addr').val(),
        tel: $('#tel').val(),
        total: <?= $sum ?>
    }
    $.post('./api/checkout.php?do=order', data, (res) => {
        alert("訂購成功\n感謝您的訂購");
        location.href = '?do=buycart';
    })
}
</script>