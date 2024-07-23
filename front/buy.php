<?php
$row = $Goods->find($_GET['id']);
?>
<h2 class="ct"><?= $row['name'] ?></h2>
<table class="all">
    <tr>
        <td rowspan="4" class="pp" style="width:60%"><a href="?do=buy&id=<?= $row['id'] ?>"><img src="./img/<?= $row['img'] ?>" style="width:100%"></a></td>
        <td class="pp">分類：<?= $Th->find($row['big'])['name'] ?> > <?= $Th->find($row['mid'])['name'] ?></a>
        </td>
    </tr>
    <tr>
        <td class="pp">編號：<?= $row['no'] ?></td>
    </tr>
    <tr>
        <td class="pp">價格：<?= $row['price'] ?></td>
    </tr>
    <tr>
        <td class="pp">詳細說明：<?= $row['intro'] ?></td>
    </tr>
    <tr>
        <th class="tt" colspan="2">購買數量：<input type="number" name="qt" value="1" id="qt"><a onclick="buycart(<?= $row['id'] ?>)"><img src="./icon/0402.jpg" alt=""></a></th>
    </tr>
</table>
<div class="ct"><button onclick="history.go(-1)">返回</button></div>
<script>
    function buycart(id) {
        location.href = `?do=buycart&id=${id}&qt=${$('#qt').val()}`;
    }
</script>