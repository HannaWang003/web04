<h2>第一次購物</h2>
<a href="?do=reg"><img src="./icon/0413.jpg" alt=""></a>
<h2>會員登入</h2>
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
        <td class="pp">
            <?php
            echo $a = rand(10, 99);
            echo "+";
            echo $b = rand(10, 99);
            echo "=";
            $_SESSION['ans'] = $a + $b;
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
    <tr>
        <td colspan="2" class="ct"><button onclick="login()">確認</button></td>
    </tr>
</table>
<script>
    function login() {
        let ans = $('#ans').val();
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        $.post('./api/login.php?do=mem', {
            acc,
            pw
        }, (res) => {
            if (res == 0) {
                alert("帳號或密碼錯誤");
            } else {
                if (ans != <?= $_SESSION['ans'] ?>) {
                    alert("對不起，您輸入的驗證碼有誤請您重新登入");
                } else {
                    location.href = "index.php";
                }
            }
        })

    }
</script>