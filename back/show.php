<?php
$row = $Order->find($_GET['id']);
?>
<style>
#show {
    width: 90%;
    margin: auto;
}
</style>
<h2 class="ct">訂單編號<?=$row['no']?></h2>
<table id="show">
    <tr>
        <th class="tt" width="30%">會員帳號</th>
        <td class="pp" colspan="4"><?= $row['acc'] ?></td>
    </tr>
    <tr>
        <th class="tt">姓名</th>
        <td class="pp" colspan="4"><?= $row['name'] ?></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp" colspan="4"><?= $row['email'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp" colspan="4"><?= $row['addr'] ?></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp" colspan="4"><?= $row['tel'] ?></td>
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
        $row['cart']=unserialize($row['cart']);
        foreach ($row['cart'] as $id => $qt) {
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
        <td class="ct" colspan="5"><input type="button" value="返回" onclick="history.go(-1)"></td>
    </tr>
</table>
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