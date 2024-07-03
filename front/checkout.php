<?php
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<h2 class="ct">填寫資料</h2>
<table class="all">
    <tr>
        <th class="tt" style="width:40%">登入帳號</th>
        <td class="pp"><?= $_SESSION['mem'] ?></td>
    </tr>
    <tr>
        <th class="tt">姓名</th>
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
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $qt) {
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
<div class="ct"><button onclick="checkout()">確定送出</button><button onclick="location.href='?do=buycart'">返回修改訂單</button>
</div>
<script>
function checkout() {
    let user = {};
    user.name = $('#name').val();
    user.email = $('#email').val();
    user.tel = $('#tel').val();
    user.addr = $('#addr').val();
    user.total = "<?= $total ?>";
    $.post('./api/checkout.php', user, () => {
        alert("訂購完成\n感謝您的選購");
        location.href = "index.php";
    })
}
</script>