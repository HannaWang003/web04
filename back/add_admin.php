<h1 class="ct">新增管理帳號</h1>
<form action="./api/admin.php?do=admin" method="post">
    <table class="all">
        <tr>
            <th class="tt" width="40%">帳號</th>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <th class="tt">權限</th>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1"><span>商品分類與管理</span></div>
                <div><input type="checkbox" name="pr[]" value="2"><span>訂單管理</span></div>
                <div><input type="checkbox" name="pr[]" value="3"><span>會員管理</span></div>
                <div><input type="checkbox" name="pr[]" value="4"><span>頁尾版權管理</span></div>
                <div><input type="checkbox" name="pr[]" value="5"><span>最新消息管理</span></div>
            </td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>