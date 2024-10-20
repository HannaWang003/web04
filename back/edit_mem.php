<?php
$row = $Mem->find($_GET['id']);
?>
<h2 class="ct">編輯會員資料</h2>
<form action="./api/edit_mem.php?do=mem" method="post">
    <table class="all" style="margin:auto;">
        <tr>
            <th class="tt" width="40%">帳號</th>
            <td class="pp"><?= $row['acc'] ?></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
        </tr>
        <tr>
            <th class="tt">累積交易金額</th>
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
    </table>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="ct"><input type="submit" value="編輯"> | <input type="reset" value="重置"> | <input type="button" value="取消" onclick="history.go(-1)"></div>
</form>