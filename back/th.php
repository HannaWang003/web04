<style>
    select {
        padding: 5px 10px;
    }
</style>
<h2 class="ct">商品分類</h2>
<div class="ct">新增大分類<input type="text" name="big" id="big"><button onclick="add_th('big')">新增</button></div>
<div class="ct">新增中分類<select name="big_id" id="big_id"></select><input type="text" name="mid" id="mid"><button onclick="add_th('mid')">新增</button></div>
<table class="all">
    <?php
    $bigs = $Th->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr>
            <td class="tt"><?= $big['name'] ?></th>
            <th class="tt"><button onclick="edit(this,<?= $big['id'] ?>)">修改</button><button onclick="del(this,<?= $big['id'] ?>,'th')">刪除</button></th>
        </tr>
        <?php
        $mids = $Th->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr>
                <th class="pp"><?= $mid['name'] ?></th>
                <th class="pp"><button onclick="edit(this,<?= $mid['id'] ?>)">修改</button><button onclick="del(this,<?= $mid['id'] ?>,'th')">刪除</button></th>
            </tr>
    <?php
        }
    }
    ?>
</table>
<?php
$rows = $Goods->all();
?>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
    <tr>
        <th class="tt">編號</th>
        <th class="tt">商品名稱</th>
        <th class="tt">庫存量</th>
        <th class="tt">狀態</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp ct"><?= $row['no'] ?></td>
            <td class="pp ct"><?= $row['name'] ?></td>
            <td class="pp ct"><?= $row['stock'] ?></td>
            <td class="pp ct"><?= ($row['sh'] == 1) ? "販售中" : "已下架" ?></td>
            <td class="pp ct" style="width:20%;">
                <div>
                    <button onclick="location.href='?do=edit_goods&id=<?= $row['id'] ?>'">修改</button>
                    <button onclick="del(this,<?= $row['id'] ?>,'goods')">刪除</button>
                </div>
                <div>
                    <button onclick="sh(<?= $row['id'] ?>,1)">上架</button>
                    <button onclick="sh(<?= $row['id'] ?>,0)">下架</button>
                </div>


            </td>
        </tr>
    <?php
    }
    ?>
</table>
<script>
    getBig();

    function getBig() {
        $.get('./api/get_big.php', (res) => {
            $('#big_id').html(res)
        })
    }

    function add_th(type) {
        let name = "";
        let big_id = "";
        switch (type) {
            case 'big':
                name = $('#big').val();
                big_id = 0;
                $.get('./api/save_th.php', {
                    name,
                    big_id
                }, () => {
                    location.reload();
                })
                break
            case 'mid':
                name = $('#mid').val();
                big_id = $('#big_id').val();
                $.get('./api/save_th.php', {
                    name,
                    big_id
                }, () => {
                    location.reload();
                })
        }
    }

    function edit(dom, id, table) {
        let name = $(dom).parents('th').prev().text();
        name = prompt("請輸入欲修改的內容", name);
        console.log(typeof(name))
        if (name != null) {
            $.get('./api/save_th.php', {
                id,
                name
            }, () => {
                location.reload();
            })
        }

    }

    function del(dom, id, table) {
        $.post('./api/del.php', {
            id,
            table
        }, () => {
            location.reload();
        })
    }

    function sh(id, sh) {
        $.get('./api/sh.php', {
            id,
            sh
        }, () => {
            location.reload();
        })
    }
</script>