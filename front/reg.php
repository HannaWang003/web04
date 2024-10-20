<h2 class="ct">會員註冊</h2>
<table class="all" style="margin:auto;">
    <tr>
        <th class="tt" width="40%">姓名</th>
        <td class="pp"><input type="text" name="name" value="" id="name"></td>
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
        <th class="tt">電子信箱</th>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
    <tr>
        <th class="tt">地址</th>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <th class="tt">電話</th>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
</table>
<div class="ct"><input type="submit" value="註冊" onclick="reg()"> | <input type="reset" value="重置"></div>
<script>
    function chk() {
        let acc = $('#acc').val();
        $.post('./api/add_mem.php?do=mem', {
            acc
        }, (res) => {
            if (acc == "admin" || res > 0) {
                alert(`此帳號${acc}已存在，不可註冊`)
            } else {
                alert(`此帳號${acc}可註冊`)
            }
            return res;
        })
    }

    function reg() {
        let acc = $('#acc').val();
        $.post('./api/add_mem.php?do=mem', {
            acc
        }, (res) => {
            if (acc == "admin" || res > 0) {
                alert(`帳號已存在，不可註冊`)
            } else {
                let data = {
                    acc,
                    pw: $('#pw').val(),
                    email: $('#email').val(),
                    tel: $('#tel').val(),
                    addr: $('#addr').val(),
                    name: $('#name').val()
                }
                $.post('./api/add_mem.php?do=mem', data, (res) => {
                    console.log(res)
                    alert("註冊成功\n歡迎加入")
                    location.href = "?do=mem";
                })
            }
        })


    }
</script>