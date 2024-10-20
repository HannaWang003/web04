<?php
$id = ($_GET['type']) ?? 0;
if ($id == 0) {
    $nav = "全部商品";
    $goods = $Goods->all(['sh' => 1]);
} else {
    $th = $Th->find($id);
    if ($th['big_id'] == 0) {
        $nav = $th['name'];
        $goods = $Goods->all(['sh' => 1, 'big' => $th['id']]);
    } else {
        $nav = $Th->find($th['big_id'])['name'] . " > " . $th['name'];
        $goods = $Goods->all(['sh' => 1, 'mid' => $th['id']]);
    }
}
?>
<h2><?= $nav ?></h2>
<table class="all">
    <?php
    foreach ($goods as $g) {
    ?>
        <tr>
            <th class="pp" width="40%;" rowspan="4"><a href="?do=buy&id=<?= $g['id'] ?>"><img src="./img/<?= $g['img'] ?>" style="width:80%;height:150px;"></a></th>
            <th class="tt"><?= $g['name'] ?></th>
        </tr>
        <tr>
            <td class="pp">價錢 : <?= $g['price'] ?><img src="./icon/0402.jpg" onclick="buy(<?= $g['id'] ?>,1)" style="float:right;">
            </td>
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