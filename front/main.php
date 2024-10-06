<?php
if (isset($_GET['type'])) {
    $type = $Th->find($_GET['type']);
    if ($type['big_id'] == 0) {
        $nav = $type['text'];
        $goods = $Goods->all(['sh' => 1, 'big' => $type['id']]);
    } else {
        $nav = $Th->find($type['big_id'])['text'] . ">" . $type['text'];
        $goods = $Goods->all(['sh' => 1, 'mid' => $type['id']]);
    }
} else {
    $nav = "全部商品";
    $goods = $Goods->all(['sh' => 1]);
}
?>
<h1><?= $nav ?></h1>
<table class="all">
    <?php
    foreach ($goods as $g) {
    ?>
    <tr>
        <td class="pp" width="40%;" rowspan="5" style="text-align:center;"><img src="./img/<?= $g['img'] ?>"
                style="width:80%;border:5px solid #eee" onclick="location.href='?do=buy&id=<?= $g['id'] ?>'"></td>
        <th class="tt" width="60%"><?= $g['name'] ?></th>
    </tr>
    <tr>
        <td class="pp">價錢 : <?= $g['price'] ?><img src="./icon/0402.jpg" onclick="buycart(<?= $g['id'] ?>,1)"
                style="float:right"></a>
        </td>
    </tr>
    <tr>
        <td class="pp">規格 : <?= $g['spec'] ?></td>
    </tr>
    <tr>
        <td class="pp">簡介 : <?= $g['intro'] ?></td>
    </tr>
    <tr>
        <td class="pp">庫存量 : <?= $g['stock'] ?></td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
function buycart(id, qt) {
    $.post('?do=buycart', {
        id,
        qt
    }, () => {
        location.href = "?do=buycart";
    })
}
</script>