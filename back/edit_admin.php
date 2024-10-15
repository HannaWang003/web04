<?php
$row = $Admin->find($_GET['id']);
$pr = unserialize($row['pr']);
?>
<h2 class="ct">修改管理員權限</h2>
<style>
    #admin {
        width: 80%;
        margin: auto;
        padding: 10px;
        border: 1px solid #333;
        box-shadow: 0 0 10px #999;

        th {
            width: 40%;
        }
    }
</style>
<form action="./api/admin.php?do=admin" method="post">
    <table id="admin">
        <tr>
            <th class="tt">帳號</th>
            <td class="pp"><input type="text" name="acc" value="<?= $row['acc'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" value="<?= $row['pw'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">權限</th>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1"
                        <?= (in_array(1, $pr)) ? "checked" : "" ?>><span>商品分類與管理</span></div>
                <div><input type="checkbox" name="pr[]" value="2"
                        <?= (in_array(2, $pr)) ? "checked" : "" ?>><span>訂單管理</span>
                </div>
                <div><input type="checkbox" name="pr[]" value="3"
                        <?= (in_array(3, $pr)) ? "checked" : "" ?>><span>會員管理</span>
                </div>
                <div><input type="checkbox" name="pr[]" value="4"
                        <?= (in_array(4, $pr)) ? "checked" : "" ?>><span>頁尾版權管理</span></div>
                <div><input type="checkbox" name="pr[]" value="5"
                        <?= (in_array(5, $pr)) ? "checked" : "" ?>><span>最新消息管理</span></div>
            </td>
        </tr>
        <tr>
            <input type="hidden" name="id" value=<?= $row['id'] ?>>
            <td colspan="2" class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>