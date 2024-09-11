<h2 class="ct">商品分類</h2>
<div class="ct">新增大分類<input type="text" name="big" id="big"><button onclick="add(0,this)">新增</button></div>
<div class="ct">
    新增中分類<select name="big_th" id="big_th">
        <?php
        if ($DB->count(['big_id' => 0]) > 0) {
            $rows = $DB->all(['big_id' => 0]);
            foreach ($rows as $row) {
        ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
        <?php
            }
        }
        ?>
    </select>
    <input type="text" name="mid" id="mid"><button onclick="add(1,this)">新增</button>
</div>
<script>
    function add(big_id, dom) {
        let name = $(dom).siblings('input').val();
        if (big_id == 1) {
            big_id = $(dom).siblings('select').val();
        }
        $.post('./api/add_th.php?do=th', {
            big_id,
            name
        }, () => {
            location.reload();
        })
    }
</script>
<table class="all">
    <?php
    if ($DB->count(['big_id' => 0]) > 0) {
        $bigs = $DB->all(['big_id' => 0]);
        foreach ($bigs as $big) {
    ?>
            <tr>
                <td class="tt"><?= $big['name'] ?></td>
                <td class="tt ct"><button onclick="edit(this,<?= $big['id'] ?>)">修改</button><button
                        onclick="del(this,<?= $big['id'] ?>)">刪除</button></td>
            </tr>
            <?php
            if ($DB->count(['big_id' => $big['id']])) {
                $mids = $DB->all(['big_id' => $big['id']]);
                foreach ($mids as $mid) {
            ?>
                    <tr>
                        <td class="pp ct"><?= $mid['name'] ?></td>
                        <td class="pp ct"><button onclick="edit(this,<?= $mid['id'] ?>)">修改</button><button
                                onclick="del(this,<?= $mid['id'] ?>)">刪除</button></td>
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
<script>
    function del(dom, id) {
        $.get('./api/del.php?do=th', {
            id,
        }, () => {
            location.reload();
        })
    }

    function edit(dom, id) {
        let text = $(dom).parents('tr').children('td').eq(0).text();
        let name = prompt("請輸入欲修改的內容:", text)
        if (name != "") {
            $.get('./api/edit.php', {
                do: "th",
                name,
                id
            }, () => {
                location.reload();
            })
        }
    }
</script>
<hr>
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
            <td class="pp">
                <button onclick="location.href='?do=edit_goods&id=<?= $g['id'] ?>'">修改</button><button
                    onclick="del(this,<?= $g['id'] ?>)">刪除</button><br>
                <button onclick="sh(this,<?= $g['id'] ?>,1)">上架</button><button
                    onclick="sh(this,<?= $g['id'] ?>,0)">下架</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<script>
    function del(dom, id) {
        $.get('./api/del.php', {
            do: "goods",
            id
        }, () => {
            $(dom).parents('tr').remove();
        })
    }

    function sh(dom, id, sh) {
        let sw = $(dom).parents('td').prev().text();
        $.get('./api/sh.php', {
            do: "goods",
            id,
            sh
        }, () => {
            if (sh == 1) {
                $(dom).parents('td').prev().text("販售中")
            } else {
                $(dom).parents('td').prev().text("已下架")
            }
        })
    }
</script>