<?php
$row = $Goods->find($_GET['id']);
?>
<h1 class="ct">修改商品</h1>
<form action="./api/goods.php?do=goods" method="post" enctype="multipart/form-data">
    <table class="all">
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
            <td class="pp"><?= $row['no'] ?></td>
        </tr>
        <tr>
            <th class="tt">商品名稱</th>
            <td class="pp"><input type="text" name="text" value=<?= $row['text'] ?>></td>
        </tr>
        <tr>
            <th class="tt">商品價格</th>
            <td class="pp"><input type="text" name="price" value=<?= $row['price'] ?>></td>
        </tr>
        <tr>
            <th class="tt">規格</th>
            <td class="pp"><input type="text" name="spec" value=<?= $row['spec'] ?>></td>
        </tr>
        <tr>
            <th class="tt">庫存量</th>
            <td class="pp"><input type="text" name="stock" value=<?= $row['stock'] ?>></td>
        </tr>
        <tr>
            <th class="tt">商品圖片</th>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <th class="tt">商品介紹</th>
            <td class="pp"><textarea name="intro"><?= $row['intro'] ?></textarea></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="ct"><input type="submit" value="修改">|<input type="reset" value="重置">|<input type="button" value="返回"
            onclick="history.go(-1)"></div>
</form>
<script>
    getBig(<?= $row['big'] ?>)

    function getBig(id) {
        $.post('./api/get_big.php?do=th', {
            id
        }, (res) => {
            $('#big').html(res);
            let big_id = $('#big').val();
            getMid(big_id, <?= $row['mid'] ?>)
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
    $('#big').on('change', function() {
        let big_id = $('#big').val();
        getMid(big_id, 0);
    })
</script>