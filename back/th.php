<style>
select {
    padding: 5px 10px;
}
</style>
<h1 class="ct">商品分類</h1>
<div class="ct"><label for="">新增大分類</label><input type="text" name="big" id="big"><button
        onclick="add('big')">新增</button></div>
<div class="ct"><label for="">新增中分類</label>
    <select name="th" id="th">
        <?php
        $bigs = $Th->all(['big_id' => 0]);
        if (!empty($bigs)) {
            foreach ($bigs as $big) {
                echo "<option value='{$big['id']}'>{$big['name']}</option>";
            }
        }
        ?>
    </select>
    <input type="text" name="mid" id="mid">
    <button onclick="add('mid')">新增</button>
</div>

<table class="all">
    <?php
    $bigs = $Th->all(['big_id' => 0]);
    if (!empty($bigs)) {
        foreach ($bigs as $big) {
    ?>
    <tr>
        <td class="tt"><?= $big['name'] ?></td>
        <td class="ct tt">
            <button onclick="edit(this,<?= $big['id'] ?>)">修改</button><button
                onclick="del('th',<?= $big['id'] ?>)">刪除</button>
        </td>
    </tr>
    <?php
            $mids = $Th->all(['big_id' => $big['id']]);
            if (!empty($mids)) {
                foreach ($mids as $mid) {
            ?>
    <tr>
        <td class="ct pp"><?= $mid['name'] ?></td>
        <td class="ct pp">
            <button onclick="edit(this,<?= $mid['id'] ?>)">修改</button><button
                onclick="del('th',<?= $mid['id'] ?>)">刪除</button>
        </td>
    </tr>
    <?php

                }
            }
            ?>
    <?php
        }
    }
    ?>
</table>
<h1 class="ct">商品管理</h1>
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
    $goods = $Goods->all();
    if (!empty($goods)) {
        foreach ($goods as $g) {
    ?>
    <tr>
        <td class="pp ct"><?= $g['no'] ?></th>
        <td class="pp ct"><?= $g['name'] ?></th>
        <td class="pp ct"><?= $g['stock'] ?></th>
        <td class="pp ct"><?= ($g['sh'] == 1) ? "販售中" : "已下架" ?></th>
        <td class="pp ct">
            <div><button onclick="location.href='?do=edit_goods&id=<?= $g['id'] ?>'">修改</button><button
                    onclick="del('goods',<?= $g['id'] ?>)">刪除</button></div>
            <div><button onclick="sh(<?= $g['id'] ?>,1)">上架</button><button onclick="sh(<?= $g['id'] ?>,0)">下架</button>
            </div>
            </th>
    </tr>
    <?php
        }
    }
    ?>
</table>
<script>
function add(type) {
    let th = new Array();
    switch (type) {
        case "big":
            th = {
                big_id: "0",
                name: $('#big').val()
            }
            break;
        case "mid":
            th = {
                big_id: $('#th').val(),
                name: $('#mid').val()
            }
    }
    $.post('./api/save_th.php', th, () => {
        location.reload();
    })
}

function del(table, id) {
    $.post('./api/del.php', {
        table,
        id
    }, () => {
        location.reload();
    })
}

function edit(dom, id) {
    let now = $(dom).parent().prev().text();
    let name = prompt("請輸入欲修改的名稱：", now);
    $.post('./api/save_th.php', {
        id,
        name
    }, () => {
        location.reload();
    })
}

function sh(id, sh) {
    $.post('./api/sw.php', {
        id,
        sh
    }, () => {
        location.reload();
    })
}
</script>