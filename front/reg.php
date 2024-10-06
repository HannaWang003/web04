<h2 class="ct">會員註冊</h2>
<form action="./api/mem.php?do=mem" method="post">
    <table class="all">
        <tr>
            <th class="tt" width="40%">姓名</th>
            <td class="pp"><input type="text" name="name"></td>
        </tr>
        <tr>
            <th class="tt">帳號</th>
            <td class="pp"><input type="text" name="acc"><input type="button" value="檢測帳號" onclick="chk()"></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <th class="tt">電話</th>
            <td class="pp">
                <input type="text" name="tel" id="">
            </td>
        </tr>
        <tr>
            <th class="tt">地址</th>
            <td class="pp">
                <input type="text" name="addr" id="">
            </td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp">
                <input type="text" name="email" id="">
            </td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="註冊"><input type="reset" value="重置"></div>
</form>
<script>
function chk() {

}
</script>