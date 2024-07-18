<h3 class="ct">編輯會員資料</h3>
<?php
$row = $Mem->find($_GET['id']);
?>
<form action="./api/save_mem.php" method="post">
    <table class="all">
        <tr>
            <th class="tt" style="width:40%;">姓名</th>
            <td class="pp"><?= $row['name'] ?></td>
        </tr>
        <tr>
            <th class="tt" style="width:40%;">帳號</th>
            <td class="pp"><?= $row['acc'] ?></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><?= str_repeat("*", mb_strlen($row['acc'])) ?></td>
        </tr>
        <tr>
            <th class="tt">累積交易額</th>
            <td class="pp"><?= $row['total'] ?> 元</td>
        </tr>
        <tr>
            <th class="tt">電話</th>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?= $row['tel'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">地址</th>
            <td class="pp"><input type="text" name="addr" id="addr" value="<?= $row['addr'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp"><input type="text" name="email" id="email" value="<?= $row['email'] ?>"></td>
        </tr>
    </table>
    <input type="hidden" name="table" value="mem">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="ct"><input type="submit" value="修改"> | <input type="reset" valeu="重置"> | <input type="button" onclick="history.go(-1)" value="取消"></div>
</form>