<?php
if (isset($_GET['type'])) {
    $tmp = $Th->find($_GET['type']);
    if ($tmp['big_id'] == 0) {
        $nav = $tmp['name'];
        $goods = $Goods->all(['big' => $_GET['type'], 'sh' => 1]);
    } else {
        $nav = $Th->find($tmp['big_id'])['name'] . " > " . $tmp['name'];
        $goods = $Goods->all(['mid' => $_GET['type'], 'sh' => 1]);
    }
} else {
    $nav = "全部商品";
    $goods = $Goods->all(['sh' => 1]);
}
?>
<style>
td {
    box-sizing: border-box;

    >div {
        border: 2px solid white;
    }
}
</style>
<h2><?= $nav ?></h2>
<table class="all">
    <?php
    foreach ($goods as $g) {
    ?>
    <tr>
        <td rowspan="4" class="pp" width="40%" style="padding:5%;"><a href="?do=buy&id=<?= $g['id'] ?>"><img
                    src="./img/<?= $g['img'] ?>" style="width:100%;"></a>
        </td>
        <td class="tt ct"><?= $g['name'] ?></td>
    </tr>
    <tr>
        <td class="pp">價格:<?= $g['price'] ?><a href="./api/buycart.php?id=<?=$g['id']?>&qt=1"><img src="./icon/0402.jpg"
                    style="float:right" /></a></td>
    </tr>
    <tr>
        <td class="pp">規格:<?= $g['spec'] ?></td>
    </tr>
    <tr>
        <td class="pp"> 簡介:<?= $g['intro'] ?></td>
    </tr>
    <?php
    }
    ?>
</table>