<h2 class="ct">商品分類</h2>
<div class="ct">新增大分類<input type="text" name="big" id="big"><input type="button" value="新增" onclick="add('big')"></div>
<div class="ct">新增中分類
    <select name="big_id" id="big_id">
        <?php
        $bigs = $Th->all(['big_id' => 0]);
        foreach ($bigs as $big) {
        ?>
            <option value="<?= $big['id'] ?>"><?= $big['name'] ?></option>
        <?php
        }
        ?>
    </select>
    <input type="text" name="mid" id="mid">
    <input type="button" value="新增" onclick="add('mid')">
</div>
<style>
    #th {
        width: 100%;

        td,
        th {
            padding: 5px;
        }
    }
</style>
<table id="th">
    <?php
    foreach ($bigs as $big) {
    ?>
        <tr>
            <td class="tt"><b><?= $big['name'] ?></b></td>
            <td class="ct tt"><input type="button" value="修改" onclick="edit(this,<?= $big['id'] ?>)"><input type="button" value="刪除" onclick="del(<?= $big['id'] ?>,'th')"></td>
        </tr>
        <?php
        $mids = $Th->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr>
                <td class="ct pp"><?= $mid['name'] ?></td>
                <td class="ct pp"><input type="button" value="修改" onclick="edit(this,<?= $mid['id'] ?>)"><input type="button" value="刪除" onclick="del(<?= $mid['id'] ?>)"></td>
            </tr>
        <?php
        }
        ?>
    <?php
    }
    ?>
</table>
<script>
    function edit(dom, id) {
        let name = prompt("請輸入欲修改的內容 : ", $(dom).parent('td').siblings('td').text())
        if (name.trim() != "") {
            $.post('./api/add_th.php?do=th', {
                id,
                name
            }, () => {
                location.reload();
            })
        }
    }

    function add(type) {
        let name = "";
        let big_id = 0;
        switch (type) {
            case "big":
                name = $('#big').val();
                big_id = 0;
                break;
            case "mid":
                name = $('#mid').val();
                big_id = $('#big_id').val();
                break;
        }
        $.post('./api/add_th.php?do=th', {
            name,
            big_id
        }, () => {
            location.reload();
        })
    }
</script>
<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>

<style>
    #goods {
        width: 100%;
    }
</style>
<table id="goods">
    <tr>
        <th class="tt">編號</th>
        <th class="tt">商品名稱</th>
        <th class="tt">庫存量</th>
        <th class="tt">狀態</th>
        <th class="tt">操作</th>
    </tr>
    <?php
    $goods = $Goods->all();
    foreach ($goods as $g) {
    ?>
        <tr>
            <td class="ct pp"><?= $g['no'] ?></td>
            <td class="pp"><?= $g['name'] ?></td>
            <td class="ct pp"><?= $g['stock'] ?></td>
            <td class="ct pp"><?= ($g['sh'] == 1) ? "販售中" : "已下架" ?></td>
            <td class="pp"><button onclick="location.href='?do=edit_goods&id=<?= $g['id'] ?>'">修改</button><button onclick="del(<?= $g['id'] ?>,'goods')">刪除</button><br><button onclick="sh(<?= $g['id'] ?>,1)">上架</button><button onclick="sh(<?= $g['id'] ?>,0)">下架</button></td>
        </tr>
    <?php
    }
    ?>
</table>
<script>
    function del(id, table) {
        $.post('./api/del.php?do=' + table, {
            id
        }, () => {
            location.reload();
        })
    }

    function sh(id, sh) {
        $.post('./api/sh.php?do=goods', {
            id,
            sh
        }, () => {
            location.reload();
        })
    }
</script>