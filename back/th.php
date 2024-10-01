<h2 class="ct">商品分類</h2>
<div class="ct"><b>新增大分類</b><input type="text" name="big" id="big"><button onclick="addBTh(0)">新增</button></div>
<div class="ct"><b>新增中分類</b>
    <select name="" id="">
        <?php
        $bigs = $Th->all(['big_id' => 0]);
        foreach ($bigs as $big) {
        ?>
        <option value="<?= $big['id'] ?>"><?= $big['text'] ?></option>
        <?php
        }
        ?>
    </select>
    <input type="text" name="mid" id="mid"><button onclick="addMTh(this)">新增</button>
</div>
<table class="all">
    <?php
    foreach ($bigs as $big) {
    ?>
    <tr>
        <td class="tt"><?= $big['text'] ?></td>
        <th class="tt"><button onclick="chg(this,<?= $big['id'] ?>)">修改</button><button
                onclick="del(this,<?= $big['id'] ?>)">刪除</button>
        </th>
    </tr>
    <?php
        $mids = $Th->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
    <tr>
        <td class="pp ct"><?= $mid['text'] ?></td>
        <th class="pp"><button onclick="chg(this,<?= $mid['id'] ?>)">修改</button><button
                onclick="del(this,<?= $mid['id'] ?>)">刪除</button>
        </th>
    </tr>
    <?php
        }
    }
    ?>
</table>
<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
    <tr>
        <th class="tt">編號</th>
        <th class="tt">商品</th>
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
        <td class="pp"><?= $g['text'] ?></td>
        <td class="pp"><?= $g['stock'] ?></td>
        <td class="pp"><?= ($g['sh'] == 1) ? "販售中" : "已下架" ?></td>
        <td class="pp" width="20%;"><button
                onclick="location.href='?do=edit_goods&id=<?= $g['id'] ?>'">修改</button><button
                onclick="del_goods(this,<?= $g['id'] ?>)">刪除</button><button
                onclick="sh(1,<?= $g['id'] ?>)">上架</button><button onclick="sh(0,<?= $g['id'] ?>)">下架</button></td>
    </tr>
    <?php
    }
    ?>
</table>
<script>
function chg(dom, id) {
    let now = $(dom).parents().siblings('td').text();
    let text = prompt("請輸入欲修改的內容:\n", now)
    if (text != "") {
        $.post('./api/chg.php?do=th', {
            id,
            text
        }, () => {
            $(dom).parents().siblings('td').text(text)
        })
    }

}

function addBTh(big_id) {
    let text = $('#big').val();
    $.post('./api/add_th.php?do=th', {
        big_id,
        text
    }, () => {
        location.reload();
    })
}

function addMTh(dom) {
    let big_id = $(dom).siblings('select').val();
    let text = $('#mid').val();
    $.post('./api/add_th.php?do=th', {
        big_id,
        text
    }, () => {
        location.reload();
    })
}

function del(dom, id) {
    $.post('./api/del.php?do=<?= $table ?>', {
        id
    }, () => {
        $(dom).parents('tr').remove();
    })
}

function del_goods(dom, id) {
    $.post('./api/del.php?do=goods', {
        id
    }, () => {
        $(dom).parents('tr').remove();
    })
}

function sh(sh, id) {
    $.post('./api/sh.php?do=goods', {
        id,
        sh
    }, () => {
        location.reload();
    })
}
</script>