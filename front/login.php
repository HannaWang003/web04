<h3>第一次購物</h3>
<button onclick="location.href='?do=reg'"><img src="./icon/0413.jpg" alt=""></button>
<h3>會員登入</h3>
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
        <th class="tt">驗證碼</th>
        <td class="pp">
            <?php
            echo ($a = rand(10, 99)) . "+" . ($b = rand(10, 99)) . "=";
            $_SESSION['ans'] = $a + $b;
            ?>
            <input type="text" name="chk" id="chk">
        </td>
    </tr>
</table>
<div class="ct"><button onclick="login()">確定</button></div>
<script>
    function login() {
        let ans = "<?= $_SESSION['ans'] ?>";
        let chk = $('#chk').val();
        if (ans != chk) {
            alert("對不起，您輸入的驗講碼有誤請您重新登入");
        } else {
            let acc = $('#acc').val();
            let pw = $('#pw').val();
            $.post('./api/login.php', {
                acc,
                pw,
                table: "mem"
            }, (res) => {
                console.log(res);
                if (parseInt(res) == 1) {
                    location.href = "index.php";
                } else {
                    alert("帳號或密碼錯誤，請重新登入")
                }
            })
        }


    }
</script>