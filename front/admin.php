<h2 class="ct">管理登入</h2>
<style>
    #admin {
        th {
            width: 40%;
        }
    }
</style>
<table class="all" id="admin">
    <tr>
        <th class="tt">帳號</th>
        <td class="pp"><input type="text" name="acc" id="acc" style="width:90%;">
        </td>
    </tr>
    <tr>
        <th class="tt">密碼</th>
        <td class="pp"><input type="password" name="pw" id="pw" style="width:90%;">
        </td>
    </tr>
    <tr>
        <th class="tt">驗證碼</th>
        <td class="pp">
            <?php
            echo $a = rand(10, 99);
            echo "+";
            echo $b = rand(10, 99);
            echo  "=";
            $_SESSION['ans'] = $a + $b;
            ?>
            <input type="text" name="chk" id="chk">
        </td>
    </tr>
</table>
<input type="hidden" name="table" value="admin" id="table">
<div class="ct"><input type="submit" value="確認"></div>
<script>
    $("input[type='submit']").on('click', () => {
        let ans = <?= $_SESSION['ans'] ?>;
        let chk = $('#chk').val();
        if (ans != chk) {
            alert("對不起，您輸入的驗證碼有誤，請您重新登入");
        } else {
            let data = {
                acc: $('#acc').val(),
                pw: $('#pw').val(),
                table: $('#table').val(),
            }
            $.post('./api/login.php', data, (res) => {
                if (parseInt(res) == 0) {
                    alert("帳號或密碼錯誤");
                } else {
                    location.href = "back.php";
                }
            })
        }
    })
</script>