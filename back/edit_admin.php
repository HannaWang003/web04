<h1 class="ct">修改管理員權限</h1>
<?php
$row = $Admin->find($_GET['id']);
$pr = unserialize($row['pr']);
?>
<form action="./api/admin.php?do=admin" method="post">
    <table class="all">
        <tr>
            <th class="tt" width="40%">帳號</th>
            <td class="pp"><input type="text" name="acc" value="<?= $row['acc'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" value="<?= $row['pw'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">權限</th>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" <?= (in_array(1, $pr)) ? "checked" : "" ?>
                        value="1"><span>商品分類與管理</span></div>
                <div><input type="checkbox" name="pr[]" <?= (in_array(2, $pr)) ? "checked" : "" ?>
                        value="2"><span>訂單管理</span>
                </div>
                <div><input type="checkbox" name="pr[]" <?= (in_array(3, $pr)) ? "checked" : "" ?>
                        value="3"><span>會員管理</span>
                </div>
                <div><input type="checkbox" name="pr[]" <?= (in_array(4, $pr)) ? "checked" : "" ?>
                        value="4"><span>頁尾版權管理</span></div>
                <div><input type="checkbox" name="pr[]" <?= (in_array(5, $pr)) ? "checked" : "" ?>
                        value="5"><span>最新消息管理</span></div>
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>
</form>