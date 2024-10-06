<?php
$rows = $DB->all();
?>
<div id="order">
    <h1 class="ct">訂單管理</h1>
    <table class="all">
        <tr>
            <th class="tt">訂單編號</th>
            <th class="tt">金額</th>
            <th class="tt">會員帳號</th>
            <th class="tt">姓名</th>
            <th class="tt">下單時間</th>
            <th class="tt">操作</th>
        </tr>
        <?php
        foreach ($rows as $row) {
        ?>
        <tr>
            <td class="pp ct"><button onclick="getOrd(<?=$row['id']?>)"><?= $row['no'] ?></button></td>
            <td class="pp ct"><?= $row['total'] ?></td>
            <td class="pp ct"><?= $row['acc'] ?></td>
            <td class="pp ct"><?= $row['name'] ?></td>
            <td class="pp ct"><?= $row['orderdate'] ?></td>
            <td class="pp ct"><button onclick="del(<?= $row['id'] ?>)">刪除</button></td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>
<script>
function del(id) {
    $.post('./api/del.php?do=<?= $table ?>', {
        id
    }, () => {
        location.reload();
    })
}

function getOrd(id) {
    $.post('./api/get_ord.php?do=order', {
        id
    }, (res) => {
        $('#order').html(res);
    })
}
</script>