<h2 class="ct">訂單管理</h2>
<?php
    $rows = $Order->all();
    if (empty($rows)) {
        echo "<h3 class='ct'>尚無訂單</h3>";
    } else {
        ?>
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
        <td class="pp ct"><a href="?do=detail&id=<?= $row['id'] ?>"><?= $row['no'] ?></a></td>
        <td class="pp ct"><?= $row['total'] ?></td>
        <td class="pp ct"><?= $row['acc'] ?></td>
        <td class="pp ct"><?= $row['name'] ?></td>
        <td class="pp ct"><?= $row['orderdate'] ?></td>
        <td class="pp ct"><button onclick="del(<?= $row['id'] ?>,'order')">刪除</button></td>
    </tr>
    <?php
        }
        ?>
    <?php
    }
    ?>
</table>
<script>
function del(id, table) {
    $.post('./api/del.php', {
        id,
        table
    }, () => {
        location.reload();
    })
}
</script>