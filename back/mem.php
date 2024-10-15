<h2 class="ct">會員管理</h2>
<style>
    #mem {
        width: 90%;
        margin: auto;
    }
</style>
<table id="mem">
    <tr>
        <th class="tt">姓名</th>
        <th class="tt">會員帳號</th>
        <th class="tt">註冊日期</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    $rows = $DB->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="ct pp"><?= $row['name'] ?></td>
            <td class="ct pp"><?= $row['acc'] ?></td>
            <td class="ct pp"><?= $row['regdate'] ?></td>
            <td class="ct pp">
                <button onclick="location.href='?do=edit_mem&id=<?= $row['id'] ?>'">修改</button>
                <button onclick="del(this,<?= $row['id'] ?>)">刪除</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><input type="button" value="返回" onclick="location.href='index.php'"></div>
<script>
    function del(dom, id) {
        $.post('./api/del.php?do=<?= $do ?>', {
            id
        }, () => {
            $(dom).parents('tr').remove()
        })
    }
</script>