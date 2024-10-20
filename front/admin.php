<h2>管理登入</h2>
<table class="all" style="table-layout:fixed;">
    <tr>
        <th class="tt">帳號</th>
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
        $ans = $a + $b;
        ?>
        <td class="pp"><?= $a ?>+<?= $b ?>=<input type="text" name="ans" id="ans"><?= $ans ?></td>
    </tr>
    <tr>
        <th colspan="2"><input type="button" value="確認" onclick="login()"></th>
    </tr>
</table>
<script>
    function login() {
        let ans = $('#ans').val()
        if (ans != <?= $ans ?>) {
            alert("對不起，您輸入的驗證碼有誤請您重新登入")
        } else {
            let acc = $('#acc').val()
            let pw = $('#pw').val()
            $.post('./api/login.php?do=<?= $do ?>', {
                acc,
                pw
            }, (res) => {
                if (res == 0) {
                    alert("帳號或密碼錯誤");
                } else {
                    alert("登入成功");
                    location.href = "back.php";
                }
            })
        }
    }
</script>