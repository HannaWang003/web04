<div class="ct"><button onclick="location.href='?do=add_admin'">新增管理員</button></div>
<style>
    #admin {
        width: 90%;
        margin: auto;
    }
</style>
<table id="admin">
    <tr>
        <th class="tt">帳號</th>
        <th class="tt">密碼</th>
        <th class="tt">管理</th>
    </tr>
    <?php
    $rows = $DB->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="ct pp"><?= $row['acc'] ?></td>
            <td class="ct pp"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
            <td class="ct pp">
                <?= ($row['acc'] == "admin") ? "此帳號為最高權限" : "<button onclick=location.href='?do=edit_admin&id={$row['id']}'>修改</button><button onclick=del(this,{$row['id']})>刪除</button>" ?>
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