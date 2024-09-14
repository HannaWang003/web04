<?php
$row = $Goods->find($_GET['id']);
?>
<h2 class="ct"><?= $row['name'] ?></h2>
<table class="all">
    <tr>
        <td class="pp" rowspan="5" width="60%"><img src="./img/<?= $row['img'] ?>" style="width:100%"></td>
        <td class="pp">分類:<?= $Th->find($row['big'])['name'] ?> > <?= $Th->find($row['mid'])['name'] ?></td>
    </tr>
    <tr>
        <td class="pp">編號:<?= $row['no'] ?></td>
    </tr>
    <tr>
        <td class="pp">價格:<?= $row['price'] ?></td>
    </tr>
    <tr>
        <td class="pp">詳細說明:<?= $row['intro'] ?></td>
    </tr>
    <tr>
        <td class="pp">庫存量:<?= $row['stock'] ?></td>
    </tr>
    <tr>
        <td class="tt ct" colspan="2">購買數量: <input type="number" name="qt" id="qt" value="1"><img onclick="buy()"
                src="./icon/0402.jpg" alt=""></td>
    </tr>
</table>
<script>
function buy() {
    let id = <?= $_GET['id'] ?>;
    let qt = $('#qt').val();
    $.get('./api/buycart.php', {
        id,
        qt
    }, () => {
        location.href = '?do=buycart';
    })
}
</script>