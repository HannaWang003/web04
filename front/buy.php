<?php
$g = $Goods->find($_GET['id']);
?>
<style>
#g {
    width: 90%;
    margin: auto;

    td,
    th {
        padding: 2px 10px;
    }
}
</style>
<h2 class="ct"><?= $g['name'] ?></h2>
<table id="g">
    <tr>
        <td class="pp" width="60%" rowspan="5" style="padding:10px;"><img src="./img/<?= $g['img'] ?>"
                style="width:95%"></td>
        <td class="pp" width="40%" style="padding:10px;">分類 : <?= $Th->find($g['big'])['name'] ?> >
            <?= $Th->find($g['mid'])['name'] ?></td>
    </tr>
    <tr>
        <td class="pp">編號 : <?= $g['no'] ?></td>
    </tr>
    <tr>
        <td class="pp">價格 : <?= $g['price'] ?></td>
    </tr>
    <tr>
        <td class="pp">詳細說明 : <?= $g['intro'] ?></td>
    </tr>
    <tr>
        <td class="pp">庫存量 : <?= $g['stock'] ?></td>
    </tr>
    <tr>
        <th class="tt ct" colspan="2">購買數量 : <input type="number" name="qt" id="qt" value="1"><img src="./icon/0402.jpg"
                onclick="buycart(<?= $g['id'] ?>)"></th>
    </tr>
</table>
<div class="ct"><input type="button" onclick="history.go(-1)" value="返回"></div>
<script>
function buycart(id) {
    let qt = $('#qt').val();
    $.post('?do=buycart', {
        id,
        qt
    }, () => {
        location.href = "?do=buycart";
    })
}
</script>