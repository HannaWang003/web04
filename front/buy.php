<?php
$g = $Goods->find($_GET['id']);
?>
<table class="all">
    <tr>
        <th class="pp ct" rowspan="4" width="65%;"><a href="?do=buy&id=<?= $g['id'] ?>"><img
                    src="./img/<?= $g['img'] ?>" style="width:95%;"></a></th>
        <th class="tt">分類 : <?= $Th->find($g['big'])['text'] ?> > <?= $Th->find($g['mid'])['text'] ?></th>
    </tr>
    <tr>
        <td class="pp">編號 : <?= $g['no'] ?></td>
    </tr>
    <tr>
        <td class="pp">價錢 : <?= $g['price'] ?></td>
    </tr>
    <tr>
        <td class="pp">庫存量 : <?= $g['stock'] ?></td>
    </tr>
    <tr>
        <th class="tt" colspan="2">購買數量 : <input type="number" name="qt" id="qt" value="1"><img src="./icon/0402.jpg"
                onclick="buy()">
        </th>
    </tr>
</table>
<div class="ct"><button onclick="history.go(-1)">返回</button></div>
<script>
    function buy() {
        let qt = $('#qt').val();
        let id = "<?= $g['id'] ?>";
        $.post('?do=buycart', {
            id,
            qt
        }, () => {
            location.href = "?do=buycart";
        })
    }
</script>