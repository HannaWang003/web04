<h2 class="ct">編輯頁尾版權區</h2>
<form action="?do=bottom" method="post">
    <table style="width:80%;margin:auto">
        <tr>
            <th class="tt" width="50%;">頁尾宣告內容</th>
            <td class="pp"><input type="text" name="bottom" value="<?= $DB->find(1)['bottom'] ?>" style="width:90%;">
            </td>
            <input type="hidden" name="id" value="1">
        </tr>
    </table>
    <div class="ct"><input type="submit" value="編輯"><input type="button" value="重置" onclick="clean()"></div>
</form>
<script>
function clean() {
    $('input[type="text"').val("");
}
</script>