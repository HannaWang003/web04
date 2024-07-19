<?php
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<h2 class="ct">填寫資訊</h2>
<table class="all">
    <tr>
        <th class="tt" style="width:40%;">登入帳號</th>
        <td class="pp"><?= $_SESSION['mem'] ?></td>
    </tr>
    <tr>
        <th class="tt" style="width:40%;">姓名</th>
        <td class="pp"><input type="text" name="name" id="name" value="<?= $mem['name'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp"><input type="text" name="email" id="email" value="<?= $mem['email'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?= $mem['addr'] ?>"></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?= $mem['tel'] ?>"></td>
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
    $sum = 0;
    foreach ($_SESSION['cart'] as $id => $qt) {
        $g = $Goods->find($id);
        $sum += $qt * $g['price'];
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
        <td colspan="5" class="tt ct">總價:<?= $sum ?></td>
    </tr>
</table>
<div class="ct"><button onclick="order()">確定送出</button><input type="button" onclick="history.go(-1)" value="返回修改訂單">
</div>
<script>
function order() {
    let data = {
        name: $('#name').val(),
        email: $('#email').val(),
        addr: $('#addr').val(),
        tel: $('#tel').val(),
        total: "<?=$sum?>"
    };
    $.post('./api/order.php', data, (res) => {
        alert(`訂單編號${res}\n訂購成功\n感謝您的訂購`);
        location.href = "index.php";
    })
}
</script>