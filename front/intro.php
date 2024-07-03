<?php
$row = $Goods->find($_GET['id']);
?>
<style>
    div.all {
        box-sizing: border-box;
        display: flex;
        flex-wrap: wrap;
    }

    div.all>div:nth-child(1) {
        box-sizing: border-box;
        ;
        width: 55%;
        border: 2px solid #fff;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;

        img {
            width: 80%;
        }
    }

    div.all>div:nth-child(2) {
        box-sizing: border-box;
        width: 45%;
        display: flex;
        flex-wrap: wrap;

        div {
            width: 100%;
            border: 2px solid #fff;
        }
    }

    div.all>div:nth-child(3) {
        width: 100%;
    }
</style>
<h2 class="ct"><?= $row['name'] ?></h2>
<div class="all pp">
    <div><img src="./img/<?= $row['img'] ?>"></div>
    <div style="display:flex;flex-wrap:wrap">
        <div>分類: <?= $Type->find($row['big'])['name'] ?> > <?= $Type->find($row['mid'])['name'] ?></div>
        <div>編號: <?= $row['no'] ?></div>
        <div>價錢: <?= $row['price'] ?></div>
        <div><?= $row['intro'] ?></div>
        <div>庫存量: <?= $row['stock'] ?></div>
    </div>
    <div class="ct tt">購買數量<input type="number" name="qt" id="qt" value="1"><img src="./icon/0402.jpg" onclick="buycart(<?= $row['id'] ?>)"></div>
</div>

<script>
    function buycart(id) {
        location.href = `?do=buycart&id=${id}&qt=${$('#qt').val()}`;

    }
</script>