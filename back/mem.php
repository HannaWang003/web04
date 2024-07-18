<?php
$table = $_GET['do'] ?? "admin";
$DB = ${ucfirst($table)};
?>
<style>
td {
    text-align: center;
}
</style>
<h1 class="ct">會員管理</h1>
<table class="all">
    <tr>
        <th class="tt">姓名</th>
        <th class="tt">帳號</th>
        <th class="tt">註冊日期</th>
        <th class="tt">管理</th>
    </tr>
    <?php
    $rows = $DB->all();
    foreach ($rows as $row) {
    ?>
    <tr>
        <td class="pp"><?= $row['name'] ?></td>
        <td class="pp"><?= $row['acc'] ?></td>
        <td class="pp"><?= $row['regdate'] ?></td>
        <td class="pp">
            <button onclick="location.href='?do=edit_mem&id=<?= $row['id'] ?>'">修改</button>
            <button onclick="del('mem',<?= $row['id'] ?>)">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
function del(table, id) {
    $.post('./api/del.php', {
        table,
        id
    }, () => {
        location.reload();
    })
}
</script>