<h1 class="ct">訂單管理</h1>
<table class="all">
    <tr>
        <th class="tt">訂單編號</th>
        <th class="tt">金額</th>
        <th class="tt">會員帳號</th>
        <th class="tt">姓名</th>
        <th class="tt">下單時間</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    $rows = $DB->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp"><button onclick="location.href='?do=edit_order&id=<?= $row['id'] ?>'"><?= $row['no'] ?></button>
            </td>
            <td class="pp"><?= $row['total'] ?></td>
            <td class="pp"><?= $row['acc'] ?></td>
            <td class="pp"><?= $row['name'] ?></td>
            <td class="pp"><?= $row['orderdate'] ?></td>
            <td class="pp">
                <button onclick="del(this,<?= $row['id'] ?>)">刪除</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<script>
    function del(dom, id) {
        $.post('./api/del.php?do=<?= $table ?>', {
            id
        }, () => {
            $(dom).parents('tr').remove();
        })
    }
</script>