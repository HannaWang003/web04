<h1 class="ct">修改管理員權限</h1>
<?php
$table = "admin";
$DB = ${ucfirst($table)};
$row = $DB->find($_GET['id']);
$row['pr'] = unserialize($row['pr']);
?>
<form action="./api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <th class="tt" style="width:40%">帳號</th>
            <td class="pp"><input type="text" name="acc" id="acc" value="<?= $row['acc'] ?>">
            </td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" id="pw" value="<?= $row['acc'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">權限</th>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1" <?= (in_array(1, $row['pr'])) ? "checked" : "" ?>><label for="">商品分類與管理</label></div>
                <div><input type="checkbox" name="pr[]" value="2" <?= (in_array(2, $row['pr'])) ? "checked" : "" ?>><label for="">訂單管理</label></div>
                <div><input type="checkbox" name="pr[]" value="3" <?= (in_array(3, $row['pr'])) ? "checked" : "" ?>><label for="">會員管理</label></div>
                <div><input type="checkbox" name="pr[]" value="4" <?= (in_array(4, $row['pr'])) ? "checked" : "" ?>><label for="">頁尾版權管理</label></div>
                <div><input type="checkbox" name="pr[]" value="5" <?= (in_array(5, $row['pr'])) ? "checked" : "" ?>><label for="">最新消息管理</label></div>
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>