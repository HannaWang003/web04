<h2 class="ct">新增商品</h2>
<form action="./api/goods.php?do=goods" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <th class=" tt" width="40%">所屬大分類</th>
            <td class="pp"><select name="big" id="big"></select></td>
        </tr>
        <tr>
            <th class="tt">所屬中分類</th>
            <td class="pp"><select name="mid" id="mid"></select></td>
        </tr>
        <tr>
            <th class="tt">商品編號</th>
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <th class="tt">商品名稱</th>
            <td class="pp"><input type="text" name="name" id="name" style="width:90%"></td>
        </tr>
        <tr>
            <th class="tt">商品價格</th>
            <td class="pp"><input type="text" name="price" id="price" style="width:90%"></td>
        </tr>
        <tr>
            <th class="tt">規格</th>
            <td class="pp"><input type="text" name="spec" id="spec" style="width:90%"></td>
        </tr>
        <tr>
            <th class="tt">庫存量</th>
            <td class="pp"><input type="text" name="stock" id="stock" style="width:90%"></td>
        </tr>
        <tr>
            <th class="tt">商品圖片</th>
            <td class="pp"><input type="file" name="img" id="img" style="width:90%"></td>
        </tr>
        <tr>
            <th class="tt">商品介紹</th>
            <td class="pp"><textarea name="intro" id="intro" style="width:90%;height:100px;"></textarea></td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"><input type="button" value="取消"
            onclick="history.go(-1)"></div>
</form>
<script>
    getBig(0);
    $('#big').on('change', function() {
        let big_id = $('#big').val();
        getMid(big_id, 0);
    })

    function getBig(id) {
        $.post('./api/get_big.php?do=th', {
            id
        }, (res) => {
            $('#big').html(res)
            let big_id = $('#big').val();
            getMid(big_id, 0)
        })
    }

    function getMid(big_id, id) {
        $.post('./api/get_mid.php?do=th', {
            big_id,
            id
        }, (res) => {
            $('#mid').html(res);
        })
    }
</script>