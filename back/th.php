<h2 class="ct">商品分類</h2>
<div class="ct"><span>新增大分類</span><input type="text" name="big" id="big"><button onclick="add(0)">新增</button></div>
<div class="ct"><span>新增中分類</span><select name="big" id="big_id">
        <?php
        $bigs = $Th->all(['big_id' => 0]);
        foreach ($bigs as $big) {
        ?>
            <option value="<?= $big['id'] ?>"><?= $big['text'] ?></option>
        <?php
        }
        ?>
    </select><input type="text" name="mid" id="mid"><button onclick="add(1)">新增</button></div>
<script>
    function add(type) {
        let big_id = 0;
        let text = "";
        switch (type) {
            case 0:
                big_id = 0;
                text = $('#big').val();
                break;
            case 1:
                big_id = $('#big_id').val();
                text = $('#mid').val();
        }
        $.post('./api/th.php?do=th', {
            big_id,
            text
        }, () => {
            location.reload();
        })
    }
</script>
<table class="all">
    <?php
    $bigs = $DB->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr>
            <td class="tt" width="70%"><b><?= $big['text'] ?></b></td>
            <td class="tt ct"><button onclick="edit(this,<?= $big['id'] ?>)">修改</button
                    onclick="del(<?= $big['id'] ?>,'th')"><button>刪除</button></td>
        </tr>
        <?php
        $mids = $DB->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr>
                <th class="pp"><?= $mid['text'] ?></th>
                <th class="pp"><button onclick="edit(this,<?= $mid['id'] ?>)">修改</button><button
                        onclick="del(<?= $mid['id'] ?>,'th')">刪除</button></th>
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
        let text = $(dom).parent('td').siblings('td,.tt').text();
        text = prompt("請輸入欲修改的內容 : ", text);
        if (text != "") {
            $.post('./api/th.php?do=th', {
                id,
                text
            }, () => {
                location.reload();
            })
        }
    }
</script>
<h2 class="ct">商品管理</h2>
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
    foreach ($goods as $g) {
    ?>
        <tr>
            <td class="pp"><?= $g['no'] ?></td>
            <td class="pp"><?= $g['name'] ?></td>
            <td class="pp"><?= $g['stock'] ?></td>
            <td class="pp"><?= ($g['sh'] == 1) ? "販售中" : "已下架" ?></td>
            <td class="pp"><button onclick="location.href='?do=edit_goods&id=<?= $g['id'] ?>'">修改</button><button
                    onclick="del(<?= $g['id'] ?>,'goods')">刪除</button><br><button
                    onclick="sh(<?= $g['id'] ?>,1)">上架</button><button onclick="sh(<?= $g['id'] ?>,0)">下架</button></td>
        </tr>
    <?php
    }
    ?>
</table>
<script>
    function sh(id, sh) {
        $.post('./api/sh.php?do=goods', {
            id,
            sh
        }, () => {
            location.reload();
        })
    }

    function del(id, table) {
        $.post('./api/del.php?do=' + table, {
            id
        }, () => {
            location.reload();
        })
    }
</script>