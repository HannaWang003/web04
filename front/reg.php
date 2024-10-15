<h2 class="ct">會員註冊</h2>
<style>
#reg {
    width: 80%;
    margin: auto;
}
</style>
<table id="reg">
    <tr>
        <th class="tt" width="40%;">姓名</th>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <th class="tt">帳號</th>
        <td class="pp"><input type="text" name="acc" id="acc"><input type="button" value="檢測帳號" onclick="chk()"></td>
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
<div class="ct"><input type="button" value="註冊" onclick="reg()"><input type="button" value="重置"
        onclick="location.reload()"></div>
<script>
function chk() {
    let acc = $('#acc').val();
    $.post('./api/chk_reg.php?do=mem', {
        acc
    }, (res) => {
        if (res != 0 || acc == "admin") {
            alert(`${acc}已存在，不可註冊`);
        } else {
            alert(`${acc}可註冊`);
        }
    })
}

function reg() {
    let acc = $('#acc').val();
    $.post('./api/chk_reg.php?do=mem', {
        acc
    }, (res) => {
        if (res != 0 || acc == "admin") {
            alert(`${acc}已存在，不可註冊`);
        } else {
            let data = {
                acc: $('#acc').val(),
                pw: $('#pw').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                tel: $('#tel').val(),
                addr: $('#addr').val()
            }
            $.post('./api/reg.php?do=mem', data, () => {
                alert("註冊成功");
                location.href = "?do=mem";
            })
        }
    })

}
</script>