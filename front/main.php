<?php
if (!isset($_GET['type']) || $_GET['type'] == 0) {
    $nav = "全部商品";
    $goods = $Goods->all(['sh' => 1]);
} else {
    $type = $Th->find($_GET['type']);
    if ($type['big_id'] == 0) {
        $nav = $type['text'];
        $goods = $Goods->all(['sh' => 1, 'big' => $type['id']]);
    } else {
        $nav = $Th->find($type['big_id'])['text'] . " > " . $type['text'];
        $goods = $Goods->all(['sh' => 1, 'mid' => $type['id']]);
    }
}
?>
<h1><?= $nav ?></h1>
<table width="80%" style="margin:auto">
    <?php
    foreach ($goods as $g) {
    ?>
        <tr>
            <td rowspan="4" class="pp ct" style="padding:10px;width:40%;"><a href="?do=order&id=<?= $g['id'] ?>"><img
                        src="./img/<?= $g['img'] ?>" style="width:90%;"></a></td>
            <td class="tt ct" style="width:60%"><?= $g['text'] ?><img src="./icon/0402.jpg" style="float:right"
                    onclick="buycart(<?= $g['id'] ?>)"></td>
        </tr>
        <tr>
            <td class="pp">價錢 : <?= $g['price'] ?></td>
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
        let data = {
            id,
            qt: 1
        }
        $.post('./api/buycart.php', data, () => {
            location.href = "?do=buycart";
        })
    }
</script>