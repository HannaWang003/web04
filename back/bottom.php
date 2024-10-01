<?php
if (isset($_POST['bottom'])) {
    $DB->save($_POST);
}
?>
<h1 class="ct">編輯頁尾版權區</h1>
<form action="?do=<?= $table ?>" method="post">
    <table class="all">
        <tr>
            <th class="tt">頁尾宣告內容</th>
            <td class="pp"><input type="text" name="bottom" value="<?= $DB->find(1)[$table] ?>" style="width:90%"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="1">
    <div class="ct"><input type="submit" value="編輯"><input type="reset" value="重置"></div>
</form>