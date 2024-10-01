<div class="ct"><button onclick="location.href='?do=add_admin'">新增管理員</button></div>
<table class="all">
    <tr>
        <th class="tt">帳號</th>
        <th class="tt">密碼</th>
        <th class="tt">管理</th>
    </tr>
    <?php
    foreach ($Admin->all() as $ad) {
    ?>
        <tr>
            <td class="ct pp"><?= $ad['acc'] ?></td>
            <td class="ct pp"><?= str_repeat("*", mb_strlen($ad['pw'])) ?></td>
            <td class="ct pp">
                <?php
                if ($ad['acc'] == "admin") {
                    echo "此帳號為最高權限";
                } else {
                ?>
                    <button onclick="location.href='?do=edit_admin&id=<?= $ad['id'] ?>'">修改</button><button
                        onclick="del(this,<?= $ad['id'] ?>)">刪除</button>
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
    function del(dom, id) {
        $.post('./api/del.php?do=<?= $table ?>', {
            id
        }, () => {
            $(dom).parents('tr').remove();
        })
    }
</script>