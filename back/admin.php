<div class="ct"><button onclick="location.href='?do=add_admin'">新增管理員</button></div>
<table class="all">
    <tr>
        <th class="tt">帳號</th>
        <th class="tt">密碼</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    $rows = $Admin->all();
    foreach ($rows as $row) {
    ?>
    <tr>
        <td class="pp"><?= $row['acc'] ?></td>
        <td class="pp"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
        <td class="pp">
            <?php
if($row['acc']=="admin"){
    ?>
            <div class="ct">此帳號為最高權限</div>
            <?php
}else{
    ?>
            <button onclick="location.href='?do=edit_admin&id=<?= $row['id'] ?>'">修改</button>
            <button onclick="del('admin',<?= $row['id'] ?>)">刪除</button>
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
function del(table, id) {
    $.get('./api/del.php', {
        table,
        id
    }, () => {
        location.reload();
    })
}
</script>