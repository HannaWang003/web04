<?php
if (isset($_POST['id'], $_POST['qt'])) {
    foreach ($_POST['id'] as $idx => $id) {
        $_SESSION['cart'][$id] = $_POST['qt'][$idx];
    }
}
$row = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<style>
    #checkout {
        width: 90%;
        margin: auto;
    }
</style>
<h2 class="ct">填寫資料</h2>
<form action="./api/checkout.php?do=order" method="post">
    <table id="checkout">
        <tr>
            <th class="tt" width="30%">登入帳號</th>
            <td class="pp" colspan="4"><?= $_SESSION['mem'] ?></td>
        </tr>
        <tr>
            <th class="tt">姓名</th>
            <td class="pp" colspan="4"><input type="text" name="name" id="name" value="<?= $row['name'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp" colspan="4"><input type="text" name="email" id="email" value="<?= $row['email'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">聯絡地址</th>
            <td class="pp" colspan="4"><input type="text" name="addr" id="addr" value="<?= $row['addr'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">聯絡電話</th>
            <td class="pp" colspan="4"><input type="text" name="tel" id="tel" value="<?= $row['tel'] ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="tt ct">編號</td>
            <td class="tt ct">數量</td>
            <td class="tt ct">單價</td>
            <td class="tt ct">小計</td>
        </tr>
        <?php
        $sum = 0;
        foreach ($_SESSION['cart'] as $id => $qt) {
            $g = $Goods->find($id);
            $sum += $g['price'] * $qt;
        ?>
            <tr>
                <td class="pp ct"><?= $g['name'] ?></td>
                <td class="pp ct"><?= $g['no'] ?></td>
                <td class="pp ct"><?= $qt ?></td>
                <td class="pp ct"><?= $g['price'] ?></td>
                <td class="pp ct"><?= $g['price'] * $qt ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <th class="tt" colspan="5">總價 : <?= $sum ?></th>
        </tr>
        <tr>
            <td class="ct" colspan="5"><input type="button" value="確定送出" onclick="checkout()"><input type="button"
                    value="返回修改訂單" onclick="history.go(-1)"></td>
        </tr>
    </table>
</form>
<script>
    function checkout() {
        let name = $('#name').val();
        let email = $('#email').val();
        let addr = $('#addr').val();
        let tel = $('#tel').val();
        let total = "<?= $sum ?>"
        $.post('./api/checkout.php?do=order', {
            name,
            email,
            addr,
            tel,
            total
        }, (res) => {
            alert("訂購成功\n感謝您的選購");
            location.href = "index.php";
        })
    }
</script>