<h2 class="ct">新增管理帳號</h2>
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
        <tr>
            <td colspan="2" class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>
</form>