<h2 class="ct">會員註冊</h2>
<style>
th {
    width: 40%;
}
</style>
<table class="all">
    <tr>
        <th class="tt">姓名</th>
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
</table>
<div class="ct">
    <button onclick="reg()">註冊</button>
    <button onclick="clean()">重置</button>
</div>
<script>
function clean() {
    location.reload();
}

function chk() {
    let acc = $('#acc').val();
    $.post('./api/chk_acc.php', {
        acc
    }, (res) => {
        if (parseInt(res) == 0) {
            alert(`此帳號${acc}可以註冊`);
        } else {
            alert(`此帳號${acc}, 已被註冊使用`);
        }
    })
}

function reg() {
    $.post('./api/chk_acc.php', {
        acc: $('#acc').val()
    }, (res) => {
        if (parseInt(res) == 0) {
            let data = {
                name: $('#name').val(),
                acc: $('#acc').val(),
                pw: $('#pw').val(),
                tel: $('#tel').val(),
                addr: $('#addr').val(),
                email: $('#email').val()
            }
            $.post('./api/reg.php', data, () => {
                alert("註冊成功，請登入");
                location.href = "?do=login";
            })
        } else {
            alert(`此帳號${$('#acc').val()}, 已被註冊使用`);
        }
    })
}
</script>