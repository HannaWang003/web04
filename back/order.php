<?php
$table = $_GET['do'] ?? "admin";
$DB = ${ucfirst($table)};
$rows = $DB->all();
?>
<h1 class="ct">訂單管理</h1>
<table class="all">
    <tr>
        <th class="tt">訂單編號</th>
        <th class="tt">金額</th>
        <th class="tt">會員帳號</th>
        <th class="tt">姓名</th>
        <th class="tt">下單日期</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    if (!empty($rows)) {
        foreach ($rows as $row) {
    ?>
            <tr style="text-align:center">
                <td class="pp"><a href="?do=detail&id=<?= $row['id'] ?>"><?= $row['no'] ?></a></td>
                <td class="pp"><?= $row['total'] ?></td>
                <td class="pp"><?= $row['acc'] ?></td>
                <td class="pp"><?= $row['name'] ?></td>
                <td class="pp"><?= $row['orderdate'] ?></td>
                <td class="pp">
                    <button onclick="del('order',<?= $row['id'] ?>)">刪除</button>
                </td>
            </tr>
    <?php
        }
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