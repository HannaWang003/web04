<style>
#row {
    th {
        width: 40%;
    }

}
</style>
<h2 class="ct">新增管理帳號</h2>
<form action="./api/save_admin.php" method="post">
    <table class="all" id="row">
        <tr>
            <th class="tt">帳號</th>
            <td class="pp"><input type="text" name="acc" style="width:90%;">
            </td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" style="width:90%;">
            </td>
        </tr>
        <tr>
            <th class="tt">權限</th>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1">商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" value="2">訂單管理</div>
                <div><input type="checkbox" name="pr[]" value="3">會員管理</div>
                <div><input type="checkbox" name="pr[]" value="4">頁尾版權管理</div>
                <div><input type="checkbox" name="pr[]" value="5">最新消息管理</div>
            </td>
        </tr>
    </table>
    <!-- <input type="hidden" name="id" value="1"> -->
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>