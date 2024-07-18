<?php
$g = $Goods->find($_GET['id']);
?>
<table class="all">
    <tr>
        <td rowspan="6" class="pp" style="vertical-align:center;text-align:center;"><img src="./img/<?= $g['img'] ?>" style="width:350px;height:200px;"></td>
    </tr>
    <tr>
        <td class="pp">分類：<?= $Type->find($g['big'])['name'] ?> > <?= $Type->find($g['mid'])['name'] ?></td>
    </tr>
    <tr>
        <td class="pp">編號：<?= $g['no'] ?></td>
    </tr>
    <tr>
        <td class="pp">價格：<?= $g['price'] ?></td>
    </tr>
    <tr>
        <td class="pp">詳細說明：<?= $g['intro'] ?></td>
    </tr>
    <tr>
        <td class="pp">庫存量：<?= $g['stock'] ?></td>
    </tr>
    <tr>
        <td colspan="2" class="tt ct">
            購買數量：<input type="number" name="qt" id="qt" value="1"><a onclick="buy(<?= $g['id'] ?>)"><img src="./icon/0402.jpg" alt=""></a>
        </td>
    </tr>
</table>
<script>
    function buy(id) {
        let qt = $('#qt').val();
        $.get('?do=buycart', {
            id,
            qt
        }, () => {
            location.href = "?do=buycart";
        })
    }
</script>