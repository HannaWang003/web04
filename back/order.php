<h2 class="ct">訂單管理</h2>
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
            <td class="pp ct"><a href="?do=list&no=<?= $row['no'] ?>"><?= $row['no'] ?></a></td>
            <td class="pp ct"><?= $row['total'] ?></td>
            <td class="pp ct"><?= $row['acc'] ?></td>
            <td class="pp ct"><?= $row['name'] ?></td>
            <td class="pp ct"><?= $row['orderdate'] ?></td>
            <td class="pp ct"><button onclick="del(this,<?= $row['id'] ?>)">刪除</button></td>
        </tr>
    <?php
    }
    ?>
</table>
<script>
    function del(dom, id) {
        $.get('./api/del.php?do=order', {
            id
        }, () => {
            $(dom).parents('tr').remove();
        })
    }
</script>