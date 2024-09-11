<?php
if (isset($_POST['bottom'])) {
    $DB->save($_POST);
}
?>
<h2 class="ct">編輯頁尾版權區</h2>
<form action="?do=bottom" method="post">
    <table class="all">
        <tr>
            <th class="tt">頁尾宣告內容</th>
            <td class="pp"><input type="text" name="bottom" value="<?= $DB->find(1)['bottom'] ?>" style="width:90%">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="ct"><input type="submit" value="編輯"><input type="reset" value="重置"></td>
            <input type="hidden" name="id" value="1">
        </tr>
    </table>
</form>