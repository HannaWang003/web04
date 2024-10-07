<?php
if (isset($_GET['type'])) {
    $nav = $Th->find($_GET['type']);
    if ($nav['big_id'] == 0) {
        $goods = $Goods->all(['sh' => 1, 'big' => $nav['id']]);
        $nav = $nav['text'];
    } else {
        $goods = $Goods->all(['sh' => 1, 'mid' => $nav['id']]);
        $nav = $Th->find($nav['big_id'])['text'] . " > " . $nav['text'];
    }
} else {
    $goods = $Goods->all(['sh' => 1]);
    $nav = "全部商品";
}
?>
<h1><?= $nav ?></h1>
<table class="all">
    <?php
    foreach ($goods as $g) {
    ?>
    <tr>
        <th class="pp ct" rowspan="4" width="40%;"><a href="?do=buy&id=<?= $g['id'] ?>"><img
                    src="./img/<?= $g['img'] ?>" style="width:80%;"></a></th>
        <th class="tt"><?= $g['name'] ?></th>
    </tr>
    <tr>
        <td class="pp">價錢 : <?= $g['price'] ?> <img src="./icon/0402.jpg" onclick="buy(<?= $g['id'] ?>,1)"
                style="float:right"></td>
    </tr>
    <tr>
        <td class="pp">規格 : <?= $g['spec'] ?></td>
    </tr>
    <tr>
        <td class="pp">簡介 : <?= $g['intro'] ?></td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
function buy(id, qt) {
    $.post('?do=buycart', {
        id,
        qt
    }, () => {
        location.href = "?do=buycart";
    })
}
</script>