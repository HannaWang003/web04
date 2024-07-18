<h3 class="ct">新增管理帳號</h3>
<form action="./api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <th class="tt" style="width:40%;">帳號</th>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <th class="tt">權限</th>
            <td class="pp">
                <div><input type="checkbox" class="pr" name="pr[]" value="1">商品分類與管理</div>
                <div><input type="checkbox" class="pr" name="pr[]" value="2">訂單管理</div>
                <div><input type="checkbox" class="pr" name="pr[]" value="3">會員管理</div>
                <div><input type="checkbox" class="pr" name="pr[]" value="4">頁尾版權區管理</div>
                <div><input type="checkbox" class="pr" name="pr[]" value="5">最新消息管理</div>
            </td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>