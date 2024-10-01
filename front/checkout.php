<h2 class="ct">填寫資料</h2>
<?php $mem = $Mem->find(['acc' => $_SESSION['mem']]) ?>
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
        $sum += $qt * $g['price'];
    ?>
        <tr>
            <td class="pp ct"><?= $g['text'] ?></td>
            <td class="pp ct"><?= $g['no'] ?></td>
            <td class="pp ct"><?= $qt ?></td>
            <td class="pp ct"><?= $g['price'] ?></td>
            <td class="pp ct"><?= $g['price'] * $qt ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td class="tt ct" colspan="5"><b>總價:<?= $sum ?></b></td>
    </tr>
</table>
<div class="ct" style="margin:10px">
    <button onclick="checkout()">確定送出</button><button onclick="history.go(-1)">返回修改訂單</button>
</div>
<script>
    function checkout() {
        let data = {
            name: $('#name').val(),
            email: $('#email').val(),
            addr: $('#addr').val(),
            tel: $('#tel').val(),
            total: "<?= $sum ?>"
        }
        $.post('./api/checkout.php?do=order', data, () => {
            alert("訂購成功\n感謝您的選購")
            location.href = "index.php";
        })
    }
</script>