<h2 class="ct">管理登入</h2>
<style>
    th {
        width: 40%;
    }
</style>
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
<div class="ct"><button onclick="chk('admin')">確認</button></div>
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
                    location.href = "back.php";
                } else {
                    alert("帳號或密碼輸入錯誤");
                }
            })
        }
    }
</script>