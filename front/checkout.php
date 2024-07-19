<?php
if (!isset($_SESSION['mem'])) {
    to("?do=login");
}
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<h1 class="ct">填寫資料</h1>
<table class="all">
    <tr>
        <th class="tt">登入帳號</th>
        <td class="pp"><?= $_SESSION['mem'] ?>
        </td>
    </tr>
    <tr>
        <th class="tt" style="width:40%">姓名</th>
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
<?php
if (empty($_SESSION['cart'])) {
    echo "<h2 class='ct'>購物車尚無商品</h1>";
} else {
?>
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
        foreach ($_SESSION['cart'] as $id => $qt) {
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
    <div class="ct"><button onclick="checkout()">確認送出</button> <button onclick="history.go(-1)">返回修改訂單</button>
    </div>
<?php
}

?>
<script>
    function checkout() {
        let data = {
            name: $('#name').val(),
            tel: $('#tel').val(),
            email: $('#email').val(),
            addr: $('#addr').val(),
            total: <?= $total ?>
        }
        $.post('./api/checkout.php', data, (res) => {
            alert("訂購成功\n感謝您的訂購");
            location.href = "index.php";
        })
    }
</script>