<?php
$g = $Goods->find($_GET['id']);
?>
<h1 class="ct"><?= $g['name'] ?></h1>
<table class="all">
    <tr>
        <td class="pp ct" rowspan="5" style="width:60%"><img src="./img/<?= $g['img'] ?>" style="width:95%"></td>
        <td class="pp">分類：<?= $Th->find($g['big'])['name'] ?> > <?= $Th->find($g['mid'])['name'] ?></td>
    </tr>
    <tr>
        <td class="pp">編號：<?= $g['no'] ?></td>
    </tr>
    <tr>
        <td class="pp">價錢：<?= $g['price'] ?></td>
    </tr>
    <tr>
        <td class="pp">詳細說明：<?= $g['intro'] ?></td>
    </tr>
    <tr>
        <td class="pp">庫存量：<?= $g['stock'] ?></td>
    </tr>
    <tr>
        <td class="pp ct" colspan="2">購買數量：<input type="number" name="qt" id="qt" value="1"><a
                href="javascript:buy(<?=$g['id']?>)"><img src="./icon/0402.jpg" alt=""></a></td>
    </tr>
</table>
<script>
function buy(id) {
    let qt = $('#qt').val();
    $.get('?do=buycart', {
        id,
        qt
    }, () => {
        location.href = "?do=buycart";
    })
}
</script>