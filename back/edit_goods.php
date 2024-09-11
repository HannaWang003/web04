<?php
$row = $Goods->find($_GET['id']);
?>
<h1 class="ct">修改商品</h1>
<form action="./api/edit_goods.php?do=goods" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp"><select name="big" id="big"></select></td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp"><select name="mid" id="mid"></select></td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" value="<?= $row['name'] ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="text" name="price" value="<?= $row['price'] ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="spec" value="<?= $row['spec'] ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="text" name="stock" value="<?= $row['stock'] ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp">
                <textarea name="intro" id="intro"><?= $row['intro'] ?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="ct"><input type="submit" value="修改"><input type="reset" value="重置"><input
                    type="button" value="返回" onclick="history.go(-1)"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
</form>
<script>
getBig(<?= $row['big'] ?>)

function getBig(id) {
    $.get('./api/getBig.php', {
        id,
        do: "th"
    }, (res) => {
        $('#big').html(res)
        getMid(<?= $row['mid'] ?>, $('#big').val());
    })
}

function getMid(mid, big_id) {
    $.get('./api/getMid.php', {
        mid,
        big_id,
        do: "th"
    }, (res) => {
        $('#mid').html(res);
    })
}
$('#big').on('change', function() {
    let big_id = $('#big').val();
    getMid(0, big_id);
})
</script>