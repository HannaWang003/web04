<h2 class="ct">商品分類</h2>
<div class="ct"><span>新增大分類</span><input type="text" name="big" id="big"><input type="button" value="新增"
        onclick="add('big')"></div>
<div class="ct"><span>新增中分類</span><select name="big_id" id="big_id">
        <?php
        $bigs = $Th->all(['big_id' => 0]);
        foreach ($bigs as $big) {
        ?>
            <option value="<?= $big['id'] ?>"><?= $big['name'] ?></option>
        <?php
        }
        ?>
    </select><input type="text" name="mid" id="mid"><input type="button" value="新增" onclick="add('mid')"></div>
<style>
    #th {
        width: 90%;
        margin: auto;
    }
</style>
<table id="th">
    <?php
    foreach ($bigs as $big) {
    ?>
        <tr>
            <td class="tt"><b class="name"><?= $big['name'] ?></b></td>
            <td class="tt ct"><input type="button" value="修改" onclick="edit(this,<?= $big['id'] ?>)"><input type="button"
                    value="刪除" onclick="del(<?= $big['id'] ?>,'big')"></td>
        </tr>
        <?php
        $mids = $Th->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr>
                <td class="pp ct name"><?= $mid['name'] ?></td>
                <td class="pp ct"><input type="button" value="修改" onclick="edit(this,<?= $mid['id'] ?>)"><input type="button"
                        value="刪除" onclick="del(<?= $mid['id'] ?>,'mid')"></td>
            </tr>
    <?php
        }
    }
    ?>
</table>
<h2 class="ct">商品管理</h2>
<div class="ct"><input type="button" value="新增商品" onclick="location.href='?do=add_goods'"></div>
<style>
    #goods {
        width: 90%;
        margin: auto;
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
    $rows = $Goods->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="ct pp"><?= $row['no'] ?></td>
            <td class="ct pp"><?= $row['name'] ?></td>
            <td class="ct pp"><?= $row['stock'] ?></td>
            <td class="ct pp"><?= ($row['sh'] == 1) ? "販售中" : "已下架" ?></td>
            <td class="ct pp">
                <button onclick="location.href='?do=edit_goods&id=<?= $row['id'] ?>'">修改</button>
                <button onclick="del(<?= $row['id'] ?>,'g')">刪除</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><input type="button" value="返回" onclick="location.href='index.php'"></div>
<script>
    function add(th) {
        let name = "";
        let big_id = 0;
        switch (th) {
            case "big":
                name = $("#" + th).val();
                break;
            case "mid":
                name = $('#' + th).val();
                big_id = $('#big_id').val();
                break;
        }
        console.log(name);
        $.post('./api/edit.php?do=th', {
            name,
            big_id
        }, () => {
            location.reload();
        })
    }

    function del(id, type) {
        $.post('./api/del_goods.php', {
            id,
            type
        }, () => {
            location.reload();
        })
    }

    function edit(dom, id) {
        let old = $(dom).parents('tr').find('.name').text();
        let name = prompt("請輸入欲修改的內容:", old);
        if (name != null && name != old && name != "") {
            $.post('./api/edit.php?do=th', {
                id,
                name
            }, () => {
                location.reload();
            })
        } else {
            alert("未修改任何內容");
        }
    }
</script>