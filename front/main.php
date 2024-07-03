<?php
$type = ($_GET['type']) ?? 0;
if ($type != 0) {
    $t = $Type->find($type);
    if ($t['big_id'] == 0) {
        $goods = $Goods->all(['big' => $type, 'sh' => 1]);
        $nav = $t['name'];
    } else {
        $goods = $Goods->all(['mid' => $type, 'sh' => 1]);
        $nav = $Type->find($t['big_id'])['name'] . ">" . $t['name'];
    }
} else {
    $goods = $Goods->all(['sh' => 1]);
    $nav = "全部商品";
}
?>
<h2><?= $nav ?></h2>
<style>
.all {
    display: flex;
    box-sizing: border-box;
}

.all>div:nth-child(1) {
    width: 35%;
    padding: 15px;
    border: 2px solid #fff;

    img {
        width: 100%;
    }
}

.all>div:nth-child(2) {
    width: 65%;
    display: flex;
    flex-wrap: wrap;

    div {
        width: 100%;
        border: 2px solid #fff;
        padding: 2px;
    }
}
</style>
<?php
foreach ($goods as $g) {
?>
<div class="all pp">
    <div>
        <img src="./img/<?= $g['img'] ?>" alt="">
    </div>
    <div>
        <div class='tt ct'><?= $g['name'] ?></div>
        <div style="display:flex;justify-content:space-between;align-items:center;">價錢:
            <?= $g['price'] ?><?= $g['name'] ?><a href="?do=buycart&id=<?=$g['id']?>&q=1"><img
                    src="./icon/0402.jpg"></a></div>
        <div>規格: <?= $g['spec'] ?></div>
        <div>簡介: <?= $g['intro'] ?></div>
    </div>
</div>
<?php
}
?>