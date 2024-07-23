<?php
$rows = $Mem->all();
?>
<h2 class="ct">會員管理</h2>
<table class="all">
    <tr>
        <th class="tt">姓名</th>
        <th class="tt">會員帳號</th>
        <th class="tt">註冊日期</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
    <tr>
        <td class="pp ct"><?= $row['name'] ?></td>
        <td class="pp ct"><?= $row['acc'] ?></td>
        <td class="pp ct"><?= $row['regdate'] ?></td>
        <td class="pp ct">
            <button onclick="location.href='?do=edit_mem&id=<?= $row['id'] ?>'">修改</button><button
                onclick="del(this,<?= $row['id'] ?>,'mem')">刪除</button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
function del(dom, id, table) {
    $.post('./api/del.php', {
        id,
        table
    }, () => {
        $(dom).parents('tr').remove();
    })
}
</script>