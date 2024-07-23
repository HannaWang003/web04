<h2 class="ct">會員註冊</h2>
<style>
    #reg {
        th {
            width: 40%;
        }
    }
</style>
<table class="all" id="reg">
    <tr>
        <th class="tt">姓名</th>
        <td class="pp"><input type="text" name="name" id="name" style="width:90%;">
        </td>
    </tr>
    <tr>
        <th class="tt">帳號</th>
        <td class="pp"><input type="text" name="acc" id="acc" style="width:60%;"><input type="button" value="檢測帳號" onclick="chk_acc()">
        </td>
    </tr>
    <tr>
        <th class="tt">密碼</th>
        <td class="pp"><input type="password" name="pw" id="pw" style="width:90%;">
        </td>
    </tr>
    <tr>
        <th class="tt">電話</th>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
        </td>
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
<input type="hidden" name="table" value="mem" id="table">
<div class="ct"><button onclick="reg()">註冊</button> | <button onclick="clean()">重置</button></div>
<script>
    function chk_acc() {
        let acc = $('#acc').val();
        if (acc == "admin") {
            alert(`不得使用${acc}作為帳號註冊`)
            $('#acc').val("");
        } else {
            $.get('./api/chk_acc.php', {
                acc
            }, (res) => {
                if (parseInt(res) != 0) {
                    alert(`此帳號${acc}已存在，請重新選擇`)
                } else {
                    alert(`此帳號${acc}可註冊`)
                }
            })
        }
    }

    function reg() {
        let acc = $('#acc').val();
        if (acc == "admin") {
            alert(`不得使用${acc}作為帳號註冊`)
            $('#acc').val("");
        } else {
            $.get('./api/chk_acc.php', {
                acc
            }, (res) => {
                if (parseInt(res) != 0) {
                    alert(`此帳號${acc}已存在，請重新選擇`)
                } else {
                    let data = {
                        acc,
                        pw: $('#pw').val(),
                        name: $('#name').val(),
                        tel: $('#tel').val(),
                        addr: $('#addr').val(),
                        email: $('#email').val()
                    }
                    $.post('./api/reg.php', data, () => {
                        alert("註冊成功，請登入");
                        location.href = "?do=mem";
                    })
                }
            })
        }
    }
</script>