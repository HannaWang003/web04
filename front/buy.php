<?php
$g = $Goods->find($_GET['id']);
?>
<h2 class="ct"><?= $g['name'] ?></h2>
<table class="all">
    <tr>
        <th class="pp" width="70%;" rowspan="5"><img src="./img/<?= $g['img'] ?>" style="width:95%;"></th>
        <th class="pp"><?= $Th->find($g['big'])['name'] . " > " . $Th->find($g['mid'])['name'] ?></th>
    </tr>
    <tr>
        <td class="pp">編號 : <?= $g['no'] ?></td>
    <tr>
    <tr>
        <td class="pp">價錢 : <?= $g['price'] ?></td>
    </tr>
    <tr>
        <td class="pp">詳細說明 : <?= $g['intro'] ?></td>
    </tr>
    <tr>
        <th colspan="2" class="tt">購買數量 : <input type="number" name="qt" id="qt" value="1"><img src="./icon/0402.jpg" onclick="buy(<?= $g['id'] ?>)"></th>
    </tr>
</table>
<script>
    function buy(id) {
        let qt = $('#qt').val();
        $.post('?do=buycart', {
            id,
            qt
        }, () => {
            location.href = "?do=buycart";
        })
    }
</script>