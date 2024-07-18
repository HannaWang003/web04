<style>
    select {
        padding: 5px 10px;
    }
</style>
<h3 class="ct">新增商品</h3>
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <th class="tt" style="width:40%;">所屬大分類</th>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <th class="tt" style="width:40%;">所屬中分類</th>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <th class="tt" style="width:40%;">商品編號</th>
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <th class="tt">商品名稱</th>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <th class="tt">商品價格</th>
            <td class="pp"><input type="text" name="price" id="price"></td>
        </tr>
        <tr>
            <th class="tt">規格</th>
            <td class="pp"><input type="text" name="spec" id="spec"></td>
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
            <td class="pp">
                <textarea name="intro" id="intro" style="width:80%;height:200px;"></textarea>
            </td>
        </tr>
    </table>
    <div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"><input type="button" value="返回" onclick="history.go(-1)"></div>
</form>
<script>
    getBig(0)

    function getBig(id) {
        $.get('./api/getBig.php', {
            id
        }, (res) => {
            $('#big').html(res);
            let big = $('#big').val();
            getMid(big, 0);
        })
    }

    function getMid(big, id) {
        $.get('./api/getMid.php', {
            big,
            id
        }, (res) => {
            $('#mid').html(res);
        })
    }
    $('#big').on('change', () => {
        let big = $('#big').val();
        getMid(big, 0)
    })
</script>