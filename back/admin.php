<?php
if ($_SESSION['admin'] != "admin") {
?>
    <h2 class="ct">請選擇管理項目</h2>
<?php
} else {
?>
    <div class="ct"><button onclick="location.href='?do=add_admin'">新增管理員</button></div>
    <table class="all">
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
                <td class="pp ct"><?= $row['acc'] ?></td>
                <td class="pp ct"><?= str_repeat("*", mb_strlen($row['pw'])) ?></td>
                <td class="pp ct"><?= ($row['acc'] == "admin") ? "此帳號為最高權限" : "<button onclick=location.href='?do=edit_admin&id={$row['id']}'>修改</button><button onclick='del({$row['id']})'>刪除</button>" ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><input type="button" value="返回" onclick="location.href='index.php'"></div>

<?php
}
?>
<script>
    function del(id) {
        $.post('./api/del.php?do=admin', {
            id
        }, () => {
            location.reload();
        })
    }
</script>