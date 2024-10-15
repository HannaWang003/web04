<h3>第一次購物</h3>
<img src="./icon/0413.jpg" onclick="location.href='?do=reg'">
<h3>會員登入</h3>
<style>
#mem {
    width: 80%;
    margin: auto;
}
</style>
<table id="mem">
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
        $ans = $a + $b;
        ?>
        <td class="pp"><?= $a ?>+<?= $b ?>=<input type="text" name="ans" id="ans"><?= $ans ?></td>
    </tr>
</table>
<div class="ct"><input type="button" value="確認" onclick="login()"></div>
<script>
function login() {
    let ans = $('#ans').val();
    if (ans != <?= $ans ?>) {
        alert("對不起，您輸入的驗證碼有誤請您重新登入")
    } else {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        $.post('./api/chk_acc.php?do=<?= $do ?>', {
            acc,
            pw
        }, (res) => {
            if (res == 0) {
                alert("帳號或密碼有誤")
            } else {
                location.href = 'index.php';
            }
        })
    }
}
</script>