<h2 class="ct">新增商品</h2>
<style>
#ag {
    th {
        width: 40%;
    }

    select {
        padding: 5px 10px;
    }

    textarea {
        width: 80%;
        height: 150px;
    }

    input[type='text'] {
        width: 60%;
    }
}
</style>
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all" id="ag">
        <tr>
            <th class="tt">所屬大分類</th>
            <td class="pp"><select name="big" id="big"></select></td>
        </tr>
        <tr>
            <th class="tt">所屬中分類</th>
            <td class="pp"><select name="mid" id="mid"></select></td>
        </tr>
        <tr>
            <th class="tt">商品編號</th>
            <td class="pp">完成分配後自動分配
            </td>
        </tr>
        <tr>
            <th class="tt">商品名稱</th>
            <td class="pp"><input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <th class="tt">商品價格</th>
            <td class="pp"><input type="text" name="price" id="price">
            </td>
        </tr>
        <tr>
            <th class="tt">規格</th>
            <td class="pp"><input type="text" name="spec" id="spec"></td>
            </td>
        </tr>
        <tr>
            <th class="tt">庫存量</th>
            <td class="pp"><input type="text" name="stock" id="stock"></td>
        </tr>
        <tr>
            <th class="tt">商品圖片</th>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <th class="tt">商品介紹</th>
            <td class="pp"><textarea name="intro" id="intro"></textarea></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增">|<input type="reset" value="重置">|<input type="button" value="返回"
            onclick="history.go(-1)"></div>
</form>
<script>
getBig();

function getBig() {
    $.get('./api/get_big.php', (res) => {
        $('#big').html(res)
        getMid($('#big').val());
    })
}

function getMid(big_id) {
    $.get('./api/get_mid.php', {
        big_id
    }, (res) => {
        $('#mid').html(res);
    })
}
$('#big').on('change', () => {
    getMid($('#big').val());
})
</script>