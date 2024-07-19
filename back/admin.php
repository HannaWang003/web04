<div class="ct"><button onclick="location.href='?do=add_admin'">新增管理帳號</button></div>
<?php
$table = $_GET['do'] ?? "admin";
$DB = ${ucfirst($table)};
$rows = $DB->all();
?>
<table class="all">
    <tr>
        <th class="tt">帳號</th>
        <th class="tt">密碼</th>
        <th class="tt">管理</th>
    </tr>
    <?php
    if (!empty($rows)) {
        foreach ($rows as $row) {
    ?>
    <tr style="text-align:center">
        <td class="pp"><?= $row['acc'] ?></td>
        <td class="pp"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
        <td class="pp">
            <?php
                    if ($row['acc'] == "admin") {
                        echo "此帳號為最高權限";
                    } else {
                    ?>
            <button onclick="location.href='?do=edit_admin&id=<?= $row['id'] ?>'">修改</button><button
                onclick="del('admin',<?= $row['id'] ?>)">刪除</button>
            <?php
                    }
                    ?>
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