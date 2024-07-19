<h2 class="ct">管理登入</h2>
<table class="all">
    <tr>
        <th class="tt" style="width:40%">帳號</th>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <th class="tt">密碼</th>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <th class="tt">驗證碼</th>
        <td class="pp">
            <?php
            echo $a = rand(10, 99);
            echo "+";
            echo $b = rand(10, 99);
            echo "=";
            $_SESSION['ans'] = $a + $b;
            ?>
            <input type="text" name="chk" id="chk">
        </td>
    </tr>
</table>
<div class="ct"><button onclick="login()">確認</button></div>
<script>
function login() {
    let chk = $('#chk').val();
    let ans = "<?= $_SESSION['ans'] ?>";
    if (chk != ans) {
        alert("對不起，您輸入的驗證碼有誤\n請您重新輸入")
    } else {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        $.post('./api/admin.php', {
            acc,
            pw
        }, (res) => {
            if (parseInt(res) == 0) {
                alert("帳號或密碼有誤，請重新輸入");
            } else {
                location.href = "back.php";
            }
        })
    }
}
</script>