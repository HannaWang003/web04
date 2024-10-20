<h2 class="ct">填寫資料</h2>
<style>
    #checkout {
        width: 90%;
        margin: auto;
        box-shadow: 0 0 10px #aaa;

        td,
        th {
            padding: 10px;
        }
    }
</style>
<?php
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<table id="checkout">
    <tr>
        <th class="tt">登入帳號</th>
        <td class="pp" colspan="4"><?= $_SESSION['mem'] ?></td>
    </tr>
    <tr>
        <th class="tt">姓名</th>
        <td class="pp" colspan="4"><input type="text" name="name" value="<?= $mem['name'] ?>" id="name"></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp" colspan="4"><input type="text" name="email" value="<?= $mem['email'] ?>" id="email"></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp" colspan="4"><input type="text" name="addr" value="<?= $mem['addr'] ?>" id="addr"></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp" colspan="4"><input type="text" name="tel" value="<?= $mem['tel'] ?>" id="tel"></td>
    </tr>
    <tr>
        <th class="tt" width="40%">商品名稱</th>
        <th class="tt" width="20%">編號</th>
        <th class="tt" width="10%">數量</th>
        <th class="tt" width="10%">單價</th>
        <th class="tt" width="20%">小計</th>
    </tr>
    <?php
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $qt) {
        $row = $Goods->find($id);
        $total += $qt * $row['price']
    ?>
        <tr>
            <td class="ct pp"><?= $row['name'] ?></td>
            <td class="ct pp"><?= $row['no'] ?></td>
            <td class="ct pp"><?= $qt ?></td>
            <td class="ct pp"><?= $row['price'] ?></td>
            <td class="ct pp"><?= $row['price'] * $qt ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <th class="tt" colspan="5">總價 : <?= $total ?></th>
    </tr>
</table>
<div class="ct"><input type="button" value="確定送出" onclick="checkout()"><input type="button" value="返回修改訂單" onclick="history.go(-1)"></div>
<script>
    function checkout() {
        let data = {
            name: $('#name').val(),
            email: $('#email').val(),
            addr: $('#addr').val(),
            tel: $('#tel').val(),
            total: <?= $total ?>
        }
        $.post('./api/checkout.php?do=order', data, () => {
            alert("訂購成功\n感謝您的選購")
            location.href = "index.php";
        })


    }
</script>