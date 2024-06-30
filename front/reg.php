<style>
    th {
        width: 40%;
    }
</style>
<h2 class="ct">會員登入</h2>
<table class="all">
    <tr>
        <th class="tt">姓名</th>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <th class="tt">帳號</th>
        <td class="pp">
            <input type="text" name="acc" id="acc">
            <input type="button" value="檢測帳號" onclick="chkacc()">
        </td>
    </tr>
    <tr>
        <th class="tt">密碼</th>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <th class="tt">電話</th>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <th class="tt">住址</th>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <th class="tt">信箱</th>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">註冊</button><button onclick="clean()">重置</button>
</div>
<script>
    function chkacc() {
        let acc = $('#acc').val();
        $.post('./api/chk_acc.php', {
            acc
        }, (res) => {
            if (parseInt(res) || acc == "admin") {
                alert(`此帳號${acc}已被使用`);
            } else {
                alert(`此帳號${acc}可使用`);
            }
        })
    }

    function reg() {
        let user = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
            name: $('#name').val(),
            tel: $('#tel').val(),
            addr: $('#addr').val(),
            email: $('#email').val(),
        }
        $.post('./api/chk_acc.php', {
            acc: user.acc
        }, (res) => {
            if (parseInt(res) || acc == "admin") {
                alert(`此帳號${acc}已被使用`);
            } else {
                $.post('./api/reg.php', user, () => {
                    alert("註冊成功，歡迎登入");
                    location.href = "?do=login";
                })
            }
        })
    }

    function clean() {
        location.reload();
    }
</script>