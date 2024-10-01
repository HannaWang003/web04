<h1 class="ct">會員註冊</h1>
<form action="?">
    <table class="all">
        <tr>
            <th class="tt">姓名</th>
            <td class="pp" colspan="4"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <th class="tt" width="30%">帳號</th>
            <td class="pp" colspan="4"><input type="text" name="acc" id="acc"><input type="button" value="檢測帳號"
                    onclick="chk()"></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <th class="tt">電話</th>
            <td class="pp" colspan="4"><input type="text" name="tel" id="tel"></td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp" colspan="4"><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <th class="tt">地址</th>
            <td class="pp" colspan="4"><input type="text" name="addr" id="addr"></td>
        </tr>
    </table>
    <div class="ct"><input type="button" value="註冊" onclick="reg()"><input type="reset" value="重置"></div>
</form>
<script>
    function chk() {
        let acc = $('#acc').val();
        $.post('./api/chk.php?do=mem', {
            acc
        }, (res) => {
            if (res == 1) {
                alert(`該帳號${acc}已存在`)
            } else {
                alert(`帳號${acc}可註冊`)
            }
        })
    }

    function reg() {
        let acc = $('#acc').val();
        $.post('./api/chk.php?do=mem', {
            acc
        }, (res) => {
            if (res == 1) {
                alert(`該帳號${acc}已存在`)
            } else {
                let data = {
                    name: $('#name').val(),
                    acc,
                    pw: $('#pw').val(),
                    tel: $('#tel').val(),
                    addr: $('#addr').val(),
                    email: $('#email').val(),
                }
                $.post('./api/reg.php?do=mem', data, () => {
                    location.href = "?do=mem";
                })
            }
        })
    }
</script>