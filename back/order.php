<h2 class="ct">訂單管理</h2>
<style>
    #order {
        width: 90%;
        margin: auto;
    }
</style>
<table id="order">
    <tr>
        <th class="tt">訂單編號</th>
        <th class="tt">金額</th>
        <th class="tt">會員帳號</th>
        <th class="tt">姓名</th>
        <th class="tt">下單日期</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    $rows = $DB->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="ct pp"><button onclick="location.href='?do=show&id=<?= $row['id'] ?>'"><?= $row['no'] ?></button></td>
            <td class="ct pp"><?= $row['total'] ?></td>
            <td class="ct pp"><?= $row['acc'] ?></td>
            <td class="ct pp"><?= $row['name'] ?></td>
            <td class="ct pp"><?= $row['orderdate'] ?></td>
            <td class="ct pp">
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