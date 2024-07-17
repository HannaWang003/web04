<h2 class="ct">編輯頁面版權區</h2>
<?php
$table = $_GET['do'];
$DB = ${ucfirst($table)};
?>
<form action="?do=bottom" method="post">
    <table class="all">
        <tr>
            <td class="tt">頁尾宣告內容</td>
            <td class="pp"><input type="text" name="bottom" value="<?= $DB->find(1)['bottom'] ?>" style="width:80%">
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="1">
    <div class="ct"><input type="submit" value="編輯"><input type="reset" value="重置"></div>
</form>