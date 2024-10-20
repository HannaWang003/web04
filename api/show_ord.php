<?php
include_once "db.php";
$row = $DB->find($_POST);
?>
<h2 class="ct">訂單編號<?= $row['no'] ?>的詳細資料</h2>
<style>
    #ordtable {
        width: 90%;
        margin: auto;
        box-shadow: 0 0 10px #aaa;

        td,
        th {
            padding: 10px;
        }
    }
</style>
<table id="ordtable">
    <tr>
        <th class="tt">會員帳號</th>
        <td class="pp" colspan="4"><?= $row['acc'] ?></td>
    </tr>
    <tr>
        <th class="tt">姓名</th>
        <td class="pp" colspan="4"><input type="text" name="name" value="<?= $row['name'] ?>" id="name"></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp" colspan="4"><input type="text" name="email" value="<?= $row['email'] ?>" id="email"></td>
    </tr>
    <tr>
        <th class="tt">聯絡地址</th>
        <td class="pp" colspan="4"><input type="text" name="addr" value="<?= $row['addr'] ?>" id="addr"></td>
    </tr>
    <tr>
        <th class="tt">聯絡電話</th>
        <td class="pp" colspan="4"><input type="text" name="tel" value="<?= $row['tel'] ?>" id="tel"></td>
    </tr>
    <tr>
        <th class="tt" width="40%">商品名稱</th>
        <th class="tt" width="20%">編號</th>
        <th class="tt" width="10%">數量</th>
        <th class="tt" width="10%">單價</th>
        <th class="tt" width="20%">小計</th>
    </tr>
    <?php
    $row['cart'] = unserialize($row['cart']);
    foreach ($row['cart'] as $id => $qt) {
        $g = $Goods->find($id);
    ?>
        <tr>
            <td class="ct pp"><?= $g['name'] ?></td>
            <td class="ct pp"><?= $g['no'] ?></td>
            <td class="ct pp"><?= $qt ?></td>
            <td class="ct pp"><?= $g['price'] ?></td>
            <td class="ct pp"><?= $g['price'] * $qt ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <th class="tt" colspan="5">總價 : <?= $row['total'] ?></th>
    </tr>
</table>
<div class="ct"><button onclick="show(<?= $row['id'] ?>)">返回</button></div>