<style>
    table {
        width: 100%;
        margin: auto;

        td {
            padding: 10px
        }
    }
</style>
<div id="ord">
    <h2 class="ct">訂單管理</h2>
    <table width="100%" style="padding:10px;margin:auto;">
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
                <td class="pp ct"><button onclick="show(<?= $row['id'] ?>)"><?= $row['no'] ?></button></td>
                <td class=" pp ct"><?= $row['total'] ?></td>
                <td class="pp ct"><?= $row['acc'] ?></td>
                <td class="pp ct"><?= $row['name'] ?></td>
                <td class="pp ct"><?= $row['orderdate'] ?></td>
                <td class="pp ct"><button onclick="del(<?= $row['id'] ?>)">刪除</button></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<div id="show" style="display:none"></div>
<script>
    function del(id) {
        $.post('./api/del.php?do=order', {
            id
        }, () => {
            location.reload();
        })
    }

    function show(id) {
        $('#ord,#show').slideToggle(1000);
        $.post('./api/show_ord.php?do=order', {
            id
        }, (res) => {
            $('#show').html(res)
        })
    }
</script>