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
        <th class="tt">驗證碼</th>
        <?php
        $a = rand(10, 99);
        $b = rand(10, 99);
        $res = $a + $b;
        ?>
        <td class="pp"><?= $a ?>+<?= $b ?>=<input type="text" name="res" id="res"><?= $res ?></td>
    </tr>
</table>
<div class="ct"><button onclick="login()">確認</button></div>
<script>
function login() {
    let res = $('#res').val();
    if (res != <?= $res ?>) {
        alert("對不起，您輸入的驗證碼有誤請您重新登入");
    } else {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        $.post('./api/chk.php?do=admin', {
            acc,
            pw
        }, (res) => {
            console.log(res)
            if (res == 0) {
                alert("帳號或密碼錯誤");
            } else {
                location.href = "back.php";
            }
        })
    }
}
</script>