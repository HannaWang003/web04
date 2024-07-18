<h1 class="ct">商品分類</h1>
<div class="ct">新增大分類 <input type="text" name="big" id="big"> <button onclick="addBig()">新增</button></div>
<div class="ct"> 新增中分類
    <select name="big_id" id="big_id" style="padding:5px;">
        <?php
        $bigs = $Type->all(['big_id' => 0]);
        foreach ($bigs as $big) {
        ?>
        <option value="<?= $big['id'] ?>"><?= $big['name'] ?></option>
        <?php
        }
        ?>
    </select>
    <input type="text" name="mid" id="mid">
    <button onclick="addMid()">新增</button>
</div>
<table class="all">
    <?php
    foreach ($bigs as $big) {
    ?>
    <tr>
        <td style="width:70%" class="tt"><?= $big['name'] ?></td>
        <td class="tt ct"><button onclick="edit(this,<?= $big['id'] ?>)"> 修改</button><button
                onclick="del('type',<?= $big['id'] ?>)">刪除</button></td>
    </tr>
    <?php
        $mids = $Type->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
    <tr>
        <td style="width:70%" class="pp ct"><?= $mid['name'] ?></td>
        <td class="pp ct"><button onclick="edit(this,<?= $mid['id'] ?>)"> 修改</button><button
                onclick="del('type',<?= $mid['id'] ?>)">刪除</button></td>
    </tr>
    <?php
        }
        ?>
    <?php
    }
    ?>

</table>
<hr>
<h1 class="ct">商品管理</h1>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
    <tr>
        <th class="tt">編號</th>
        <th class="tt">商品名稱</th>
        <th class="tt">庫存量</th>
        <th class="tt">狀態</th>
        <th class="tt">管理</th>
    </tr>
    <?php
    $rows = $Goods->all();
    if (!empty($rows)) {
        foreach ($rows as $row) {
    ?>
    <tr>
        <td class="pp"><?= $row['no'] ?></td>
        <td class="pp"><?= $row['name'] ?></td>
        <td class="pp"><?= $row['stock'] ?></td>
        <td class="pp"><?= ($row['sh'] == 1) ? "販售中" : "已下架" ?></td>
        <td class="pp" style="display:flex;flex-wrap:wrap;">
            <div style="width:45%">
                <button onclick="location.href='?do=edit_goods&id=<?= $row['id'] ?>'">修改</button>
                <button onclick="del('goods',<?= $row['id'] ?>)">刪除</button>
            </div>
            <div style="width:45%">
                <button onclick="sh(<?= $row['sh'] ?>,1)">上架</button><button
                    onclick="sh(<?= $row['sh'] ?>,1)">下架</button>
            </div>
        </td>
    </tr>
    <?php
        }
    }
    ?>
</table>
<script>
function del(table, id) {
    $.post('./api/del.php', {
        table,
        id
    }, () => {
        location.reload();
    })
}
</script>
<script>
function addBig() {
    let name = $('#big').val();
    let big_id = "0";
    $.post('./api/save_type.php', {
        name,
        big_id
    }, () => {
        location.reload();
    })
}

function addMid() {
    let name = $('#mid').val();
    let big_id = $('#big_id').val();
    $.post('./api/save_type.php', {
        name,
        big_id
    }, () => {
        location.reload();
    })
}

function edit(dom, id) {
    let now = $(dom).parent('td').siblings().text();
    let name = prompt("請輸入欲修改的名稱：", now);
    if (name != "") {
        $.post('./api/save_type.php', {
            id,
            name
        }, () => {
            location.reload();
        })
    }
}

function del(table, id) {
    $.post('./api/del.php', {
        table,
        id
    }, () => {
        location.reload();
    })
}
</script>