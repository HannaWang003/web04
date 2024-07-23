<?php
$row = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<h2 class="ct">填寫資料</h2>
<style>
    #checkout {
        th {
            width: 40%;
        }
    }
</style>
<form action="./api/checkout.php" method="post">
    <table class="all" id="checkout">
        <tr>
            <th class="tt">登入帳號</th>
            <td class="pp"><?= $row['acc'] ?>
            </td>
        </tr>
        <tr>
            <th class="tt">姓名</th>
            <td class="pp"><input type="text" name="name" id="name" style="width:90%;" value="<?= $row['name'] ?>">
            </td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp"><input type="text" name="email" id="email" value="<?= $row['email'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">聯絡地址</th>
            <td class="pp"><input type="text" name="addr" id="addr" value="<?= $row['addr'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">聯絡電話</th>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?= $row['tel'] ?>"></td>
            </td>
        </tr>
    </table>
    <table class="all">
        <tr>
            <th class="tt" style="width:40%;">商品名稱</th>
            <th class="tt">編號</th>
            <th class="tt">數量</th>
            <th class="tt">單價</th>
            <th class="tt">小計</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $qt) {
            $row = $Goods->find($id);
            $sum = $qt * $row['price'];
            $total += $sum;
        ?>
            <tr>
                <td class="pp"><?= $row['name'] ?></td>
                <td class="pp"><?= $row['no'] ?></td>
                <td class="pp"><?= $qt ?></td>
                <td class="pp"><?= $row['price'] ?></td>
                <td class="pp"><?= $sum ?></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <th class="tt" colspan="5">總價：<?= $total ?></th>
            <input type="hidden" name="total" value="<?= $total ?>">
        </tr>
    </table>
    <div class="ct"><input type="submit" value="確認送出"> | <input type="button" value="返回修改訂單" onclick="history.go(-1)">
    </div>
</form>