<?php
$g = $Goods->find($_GET['id']);
$big = $Th->find($g['big'])['text'];
$mid = $Th->find($g['mid'])['text'];
?>
<h2 class="ct"><?= $g['name'] ?></h2>
<table class="all">
    <tr>
        <td class="pp" width="60%;" rowspan="4" style="text-align:center;"><img src="./img/<?= $g['img'] ?>"
                style="width:100%;" onclick="location.href='?do=buy&id=<?= $g['id'] ?>'"></td>
        <th class="pp" width="40%">分類 : <?= $big ?> > <?= $mid ?></th>
    </tr>
    <tr>
        <td class="pp">編號 : <?= $g['no'] ?></a>
        </td>
    </tr>
    <tr>
        <td class="pp">價格 : <?= $g['price'] ?></td>
    </tr>
    <tr>
        <td class="pp">詳細說明 : <?= $g['intro'] ?></td>
    </tr>
    <tr>
        <th class="tt" colspan="2">購買數量 : <input type="number" name="qt" id="qt" value="1"> <img src="./icon/0402.jpg"
                onclick="buy(<?= $g['id'] ?>)"></th>
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