<?php
if (!isset($_GET['type']) || $_GET['type'] == 0) {
    $nav = "全部商品";
    $goods = $Goods->all(['sh' => 1]);
} else {
    $type = $Th->find($_GET['type']);
    if ($type['big_id'] == 0) {
        $nav = $type['name'];
        $goods = $Goods->all(['sh' => 1, 'big' => $type['id']]);
    } else {
        $nav = $Th->find($type['big_id'])['name'] . " > " . $type['name'];
        $goods = $Goods->all(['sh' => 1, 'mid' => $type['id']]);
    }
}
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
<h2><?= $nav ?></h2>
<table id="g">
    <?php
    foreach ($goods as $g) {
    ?>
    <tr>
        <td class="pp ct" width="40%" rowspan="4" style="padding:10px;"><a href="?do=buy&id=<?= $g['id'] ?>"><img
                    src="./img/<?= $g['img'] ?>" style="width:90%"></a></td>
        <th class="tt" width="60%" style="padding:10px;"><?= $g['name'] ?></th>
    </tr>
    <tr>
        <td class="pp">價錢 : <?= $g['price'] ?><img src="./icon/0402.jpg" style="float:right"
                onclick="buycart(<?= $g['id'] ?>)"></td>
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
function buycart(id) {
    $.post('?do=buycart', {
        id,
        qt: 1
    }, () => {
        location.href = '?do=buycart';
    })
}
</script>