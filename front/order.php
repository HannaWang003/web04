<?php
$g = $Goods->find($_GET['id']);
?>
<h2 class="ct"><?= $g['text'] ?></h2>
<table>
    <tr>
        <td width="60%" rowspan="5" class="pp"><img src="./img/<?= $g['img'] ?>" style="width:100%"></td>
        <td width="40%" class="pp"><?= $Th->find($g['big'])['text'] ?> > <?= $Th->find($g['mid'])['text'] ?></td>
    </tr>
    <tr>
        <td class="pp">編號:<?= $g['no'] ?></td>
    </tr>
    <tr>
        <td class="pp">價格:<?= $g['price'] ?></td>
    </tr>
    <tr>
        <td class="pp">詳細說明:<?= $g['intro'] ?></td>
    </tr>
    <tr>
        <td class="pp">庫存量:<?= $g['stock'] ?></td>
    </tr>
    <tr>
        <td colspan="2" class="tt ct">購買數量: <input type="number" name="qt" id="qt" value="1"><img src="./icon/0402.jpg"
                onclick="buycart(<?= $g['id'] ?>)"></td>
    </tr>
</table>
<div class="ct"><button onclick="history.go(-1)">返回</button></div>
<script>
function buycart(id) {
    let data = {
        id,
        qt: $('#qt').val()
    }
    $.post('./api/buycart.php', data, () => {
        location.href = "?do=buycart";
    })
}
</script>