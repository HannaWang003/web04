<?php
$type = $_GET['type'] ?? 0;
if ($type == 0) {
    $nav = "全部商品";
    $rows = $Goods->all(['sh' => 1]);
} else {
    $th = $Th->find($type);
    if ($th['big_id'] == 0) {
        $nav = $th['name'];
        $rows = $Goods->all(['sh' => 1, 'big' => $th['id']]);
    } else {
        $nav = $Th->find($th['big_id'])['name'] . " > " . $th['name'];
        $rows = $Goods->all(['sh' => 1, 'mid' => $th['id']]);
    }
}
?>
<style>
#goods {
    tr:nth-child(1) td {
        text-align: center;
    }
}
</style>
<h2><?= $nav ?></h2>
<table class="all" id="goods">
    <?php
    foreach ($rows as $row) {
    ?>
    <tr>
        <td rowspan="4" class="pp" style="width:30%"><a href="?do=buy&id=<?=$row['id']?>"><img
                    src="./img/<?= $row['img'] ?>" style="width:90%"></a></td>
        <td class="tt"><?= $row['name'] ?></a>
        </td>
    </tr>
    <tr>
        <td class="pp">價錢：<?= $row['price'] ?><a href="?do=buycart&id=<?= $row['id'] ?>&qt=1"><img src="./icon/0402.jpg"
                    style="float:right"></td>
    </tr>
    <tr>
        <td class="pp">規格：<?= $row['spec'] ?></td>
    </tr>
    <tr>
        <td class="pp">簡介：<?= $row['intro'] ?></td>
    </tr>
    <?php
    }
    ?>
</table>