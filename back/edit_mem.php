<?php
$table = "mem";
$DB = ${ucfirst($table)};
$row = $DB->find($_GET['id']);
?>
<h2 class="ct">編緝會員資料</h2>
<form action="./api/edit_mem.php" method="post">
    <table class="all">
        <tr>
            <th class="tt" width="40%">帳號</th>
            <td class="pp"><?= $row['acc'] ?></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
        </tr>
        <tr>
            <th class="tt">累積交易額</th>
            <td class="pp"><?= $row['total'] ?></td>
        </tr>
        <tr>
            <th class="tt">姓名</th>
            <td class="pp"><input type="text" name="name" value="<?= $row['name'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp"><input type="text" name="email" value="<?= $row['email'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">地址</th>
            <td class="pp"><input type="text" name="addr" value="<?= $row['addr'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">電話</th>
            <td class="pp"><input type="text" name="tel" value="<?= $row['tel'] ?>"></td>
        </tr>
        <tr>
            <th colspan="2" class="ct"><input type="submit"><input type="reset"><input type="button" value="返回"
                    onclick="history.go(-1)"></th>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
</form>