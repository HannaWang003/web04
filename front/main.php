<?php
if (isset($_GET['type']) && $_GET['type'] != 0) {
    $t = $Th->find($_GET['type']);
    if ($Th->find($_GET['type'])['big_id'] == 0) {
        $rows = $Goods->all(['sh' => 1, 'big' => $_GET['type']]);
        $nav = $t['name'];
    } else {
        $rows = $Goods->all(['sh' => 1, 'mid' => $_GET['type']]);
        $nav = $Th->find($t['big_id'])['name'] . " > " . $t['name'];
    }
} else {
    $rows = $Goods->all(['sh' => 1]);
    $nav = "全部商品";
}
?>
<h2><?= $nav ?></h2>
<table class="all">
    <?php
    foreach ($rows as $row) {
    ?>
    <tr>
        <td rowspan="5" class="pp" style="width:35%;text-align:center"><a href="?do=buy&id=<?=$row['id']?>"><img
                    src="./img/<?= $row['img'] ?>" style="width:200px;height:120px;"></a></td>
    </tr>
    <tr>
        <th class="tt"><?= $row['name'] ?></th>
    </tr>
    <tr>
        <td class="pp">價錢：<?= $row['price'] ?><a href="?do=buycart&id=<?= $row['id'] ?>&qt=1" style="float:right"><img
                    src="./icon/0402.jpg" alt=""></a></td>
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