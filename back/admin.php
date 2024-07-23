<?php
$rows = $Admin->all();
?>
<div class="ct"><button onclick="location.href='?do=add_admin'">新增管理員</button></div>
<table class="all">
    <tr>
        <th class="tt">帳號</th>
        <th class="tt">密碼</th>
        <th class="tt">管理</th>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp ct"><?= $row['acc'] ?></td>
            <td class="pp ct"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
            <td class="pp ct">
                <?php
                if ($row['acc'] == "admin") {
                    echo "此帳號為最高權限";
                } else {
                ?>
                    <button onclick="location.href='?do=edit_admin&id=<?= $row['id'] ?>'">修改</button><button onclick="del(this,<?= $row['id'] ?>,'admin')">刪除</button>
            </td>
        <?php
                }
        ?>

        </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><button onclick="location.href='index.php'">返回</button></div>
<script>
    function del(dom, id, table) {
        $.post('./api/del.php', {
            id,
            table
        }, () => {
            $(dom).parents('tr').remove();
            alert("已移除此管理員")
        })
    }
</script>