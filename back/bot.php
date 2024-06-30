<?php
if (!empty($_POST['bottom'])) {
    $Bottom->save($_POST);
}
?>
<h2 class="ct">編緝頁尾版權區</h2>
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <th class="tt">頁尾宣告內容</th>
            <td class="pp"><input type="text" name="bottom" value="<?= $Bottom->find(1)['bottom'] ?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="編輯"><input type="reset" value="重置">
        <input type="hidden" name="id" value="<?= $Bottom->find(1)['id'] ?>">
    </div>
</form>