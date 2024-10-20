<h2 class="ct">編輯頁尾版權區</h2>
<form action="?do=<?= $do ?>" method="post">
    <table class="all">
        <tr>
            <th class="tt">頁尾宣告內容</th>
            <td class="pp"><input type="text" name="bottom" value="<?= $DB->find(1)[$do] ?>" id="bot"></td>
        </tr>
        <tr>
            <input type="hidden" name="id" value="1">
            <th colspan="2"><input type="submit" value="編輯"><input type="button" value="重置" onclick="clean()"></th>
        </tr>
    </table>
</form>
<script>
    function clean() {
        $('#bot').val("");
    }
</script>