<h2>
    <?php
    if (isset($_GET['type'])) {
        $type = $Type->find($_GET['type']);
        if ($type['big_id'] == 0) {
            $goods = $Goods->all(['sh' => 1, 'big' => $type['id']]);
            echo $type['name'];
        } else {
            $goods = $Goods->all(['sh' => 1, 'mid' => $type['id']]);
            echo $Type->find($type['big_id'])['name'] . " > " . $type['name'];
        }
    } else {
        $goods = $Goods->all(['sh' => 1]);
        echo "全部商品";
    }
    ?>
</h2>
<table class="all">
    <?php
    foreach ($goods as $g) {
    ?>
    <tr>
        <td rowspan="5" class="pp" style="text-align:center;vertical-align:center;"><a
                href="?do=cart&id=<?=$g['id']?>"><img src="./img/<?= $g['img'] ?>"
                    style="width:200px;height:150px;"></a></td>
    </tr>
    <tr>
        <td class="tt ct">
            <b><?= $g['name'] ?></b>
        </td>
    </tr>
    <tr>
        <td class="pp">價錢：<?= $g['price'] ?><a href="?do=buycart&id=<?= $g['id'] ?>&qt=1" style="float:right"><img
                    src="./icon/0402.jpg" alt=""></a></td>
    </tr>
    <tr>
        <td class="pp">規格：<?= $g['spec'] ?></td>
    </tr>
    <tr>
        <td class="pp">簡介：<?= $g['intro'] ?></td>
    </tr>
    <?php
    }
    ?>
</table>