<div class="ct"><button onclick="location.href='?do=add_admin'">新增管理員</button></div>
<table class="all">
    <tr>
        <th class="tt">帳號</th>
        <th class="tt">密碼</th>
        <th class="tt">管理登入</th>
    </tr>
    <?php
    foreach ($DB->all() as $row) {
    ?>
    <tr>
        <td class="ct pp"><?= $row['acc'] ?></td>
        <td class="ct pp"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
        <td class="ct pp">
            <?php
                if ($row['acc'] == "admin") {
                ?>
            此帳號為最高權限
            <?php
                } else {
                ?>
            <button onclick="location.href='?do=edit_admin&id=<?= $row['id'] ?>'">修改</button><button
                onclick="del(<?= $row['id'] ?>)">刪除</button>
            <?php
                }
                ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="location.href='index.php'">返回</button></div>
<script>
function del(id) {
    $.post('./api/del_acc.php?do=<?= $table ?>', {
        id
    }, () => {
        location.reload();
    })
}
</script>