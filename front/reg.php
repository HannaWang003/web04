<h2 class="ct">會員註冊</h2>
<table class="all">
    <tr>
        <th class="tt" width="40%;">姓名</th>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <th class="tt">帳號</th>
        <td class="pp"><input type="text" name="acc" id="acc"><button onclick="chk()">檢測帳號</button></td>
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
        <th class="tt">電子信箱</th>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct"><button onclick="reg()">註冊</button><button onclick="clean()">重置</button></div>
<script>
    function chk() {
        let acc = $('#acc').val();
        $.post('./api/chk.php?do=mem', {
            acc
        }, (res) => {
            if (acc == "admin" || res > 0) {
                alert(`此帳號${acc}已存在\n不得使用`);
            } else {
                alert(`此帳號${acc}可使用`);
            }
        })
    }

    function reg() {
        let acc = $('#acc').val();
        $.post('./api/chk.php?do=mem', {
            acc
        }, (res) => {
            if (acc == "admin" || res > 0) {
                alert(`此帳號${acc}已存在\n不得使用`);
            } else {
                let data = {
                    acc,
                    pw: $('#pw').val(),
                    name: $('#name').val(),
                    tel: $('#tel').val(),
                    addr: $('#addr').val(),
                    email: $('#email').val()
                }
                $.post('./api/reg.php?do=mem', data, () => {
                    alert("註冊成功\n歡迎登入");
                    location.href = "?do=mem";
                })
            }
        })
    }

    function clean() {
        location.reload();
    }
</script>