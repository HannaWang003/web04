<h2>第一次購物</h2>
<a href="?do=reg"><img src="./icon/0413.jpg" alt=""></a>
<h2>會員登入</h2>
<table class="all">
    <tr>
        <th class="tt" width="40%">帳號</th>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <th class="tt" width="40%">密碼</th>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <th class="tt" width="40%">驗證碼</th>
        <?php
        $a = rand(10, 99);
        $b = rand(10, 99);
        $ans = $a + $b;
        ?>
        <td class="pp"><?= $a ?> + <?= $b ?> = <input type="text" name="ans" id="ans"><?= $ans ?></td>
    </tr>
</table>
<div class="ct"><button onclick="login()">確認</button></div>
<script>
function login() {
    let ans = $('#ans').val();
    if (ans != "<?=$ans?>") {
        alert("對不起\n你輸入的驗證碼有誤請您重新登入");
    } else {
        let data = {
            acc: $('#acc').val(),
            pw: $('#pw').val()
        }
        $.post('./api/login.php?do=<?=$table?>', data, (res) => {
            if (res == 0) {
                alert("帳號或密碼有誤")
            } else {
                location.href = "index.php";
            }
        })
    }
}
</script>