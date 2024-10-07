<h2 class="ct">填寫資料</h2>
<?php
$row = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<form action="./api/checkout.php?do=order" method="post">
    <table class="all">
        <tr>
            <th class="tt">登入帳號</th>
            <td class="pp" colspan="4"><?= $row['acc'] ?></td>
        </tr>
        <tr>
            <th class="tt" width="40%;">姓名</th>
            <td class="pp" colspan="4"><input type="text" name="name" id="name" value="<?= $row['name'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp" colspan="4"><input type="text" name="email" id="email" value="<?= $row['email'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">聯絡住址</th>
            <td class="pp" colspan="4"><input type="text" name="addr" id="addr" value="<?= $row['addr'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">聯絡電話</th>
            <td class="pp" colspan="4"><input type="text" name="tel" id="tel" value="<?= $row['tel'] ?>"></td>
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
        foreach ($_SESSION['cart'] as $id => $qt) {
            $g = $Goods->find($id);
            $sum += $qt * $g['price'];
        ?>
        <tr>
            <td class="pp"><?= $g['name'] ?></td>
            <td class="pp"><?= $g['price'] ?></td>
            <td class="pp"><?= $qt ?></td>
            <td class="pp"><?= $g['price'] ?></td>
            <td class="pp"><?= $g['price'] * $qt ?></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <th class="tt" colspan="5">總價 : <?= $sum ?></th>
            <input type="hidden" name="total" value="<?= $sum ?>">
        </tr>
    </table>
    <div class="ct"><input type="submit" value="確認送出"><input type="button" value="返回修改訂單" onclick="history.go(-1)">
    </div>
</form>
<script>
$('input[type="submit"]').on('click', () => {
    alert("訂購成功\n感謝您的選購");
})
</script>