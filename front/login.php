<h3>第一次購物</h3>
<div><a href="?do=add_mem"><img src="./icon/0413.jpg" alt=""></a></div>
<style>
    th {
        width: 40%;
    }
</style>
<h3>會員登入</h3>
<table class="all">
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
        <td class="pp">
            <?php
            $a = rand(10, 99);
            $b = rand(10, 99);
            $_SESSION['ans'] = $a + $b;
            echo "$a + $b = ";
            ?>
            <input type="text" name="chk" id="chk">
        </td>
    </tr>
</table>
<div class="ct"><button onclick="chk('mem')">確認</button></div>
<script>
    function chk(table) {
        let ans = <?= $_SESSION['ans'] ?>;
        let chk = $('#chk').val();
        if (ans != chk) {
            alert("對不起，您輸入的驗證碼有誤請您重新登入");
        } else {
            $.post('./api/chk.php', {
                table,
                acc: $('#acc').val(),
                pw: $('#pw').val()
            }, (res) => {
                if (parseInt(res) == 1) {
                    location.href = "index.php";
                } else {
                    alert("帳號或密碼輸入錯誤");
                }
            })
        }
    }
</script>