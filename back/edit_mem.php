<style>
    th {
        width: 40%;
    }
</style>
<?php
$row = $Mem->find($_GET['id']);
?>
<h2 class="ct">編輯會員資料</h2>
<form action="./api/save_mem.php" method="post">
    <table class="all">
        <tr>
            <th class="tt">帳號</th>
            <td class="pp"><?= $row['acc'] ?></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
        </tr>
        <tr>
            <th class="tt">交易金額</th>
            <td class="pp">0 元</td>
        </tr>
        <tr>
            <th class="tt">姓名</th>
            <td class="pp"><input type="text" name="name" id="name" value="<?= $row['name'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp"><input type="text" name="email" id="email" value="<?= $row['email'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">地址</th>
            <td class="pp"><input type="text" name="addr" id="addr" value="<?= $row['addr'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">電話</th>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?= $row['tel'] ?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
    </div>
</form>