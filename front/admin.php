<table class="all">
    <tr>
        <th class="tt" width="40%;">帳號</th>
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
            $a = rand(10, 99);
            $b = rand(10, 99);
            $ans = $a + $b;
            ?>
            <?= $a ?>+<?= $b ?>=<input type="text" name="ans" id="ans"><?= $ans ?>
        </td>
    </tr>
</table>
<div class="ct"><img src="./icon/0414.jpg" onclick="login()"></div>
<script>
    function login() {
        let ans = $('#ans').val();
        if (ans != <?= $ans ?>) {
            alert("對不起您輸入的驗證碼有誤\n請您重新輸入");
        } else {
            let acc = $('#acc').val();
            let pw = $('#pw').val();
            $.post('./api/login.php?do=<?= $table ?>', {
                acc,
                pw
            }, (res) => {
                if (res <= 0) {
                    alert("帳號或密碼錯誤");
                } else {
                    location.href = "back.php";
                }
            })
        }
    }
</script>