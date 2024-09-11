<h2 class="ct">會員註冊</h2>
<table class="all">
    <tr>
        <th class="tt" width="40%">姓名</th>
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
        <th class="tt">地址</th>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <th class="tt">電子信箱</th>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
        <td class="ct" colspan="2"><button onclick=" reg()">新增</button><button onclick="clean()">重置</button></td>
    </tr>
</table>
<script>
function chk() {
    let acc = $('#acc').val();
    $.post('./api/chk.php?do=mem', {
        acc
    }, (res) => {
        if (res != 0 || acc == "admin") {
            alert(`此帳號 ${acc} 已存在`)
            $('#acc').val("")
        } else {
            alert(`此帳號${acc}可使用`)
        }
    })
}

function reg() {
    if ($('input').filter(function() {
            return $(this).val() == "";
        }).length > 0) {
        alert("不可空白")
    } else {
        let data = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
            name: $('#name').val(),
            tel: $('#tel').val(),
            addr: $('#addr').val(),
            email: $('#email').val()
        }
        $.post('./api/reg.php?do=mem', data, (res) => {
            if (res != 0 || acc == "admin") {
                alert(`此帳號 ${data['acc']} 已存在`)
                $('#acc').val("")
            } else {
                alert("註冊成功，請登入");
                location.href = "?do=mem";

            }
        })
    }
}

function clean() {
    $('input').val("")
}
</script>