<?php
$row = $Goods->find($_GET['id']);
?>
<h2 class="ct">修改商品</h2>
<style>
    #goods {
        width: 80%;
        margin: auto;
    }
</style>
<form action="./api/edit_goods.php?do=goods" method="post" enctype="multipart/form-data">
    <table id="goods">
        <tr>
            <th class="tt" width="40%;">所屬大分類</th>
            <td class="pp">
                <select name="big" id="big">
                    <?php
                    $bigs = $Th->all(['big_id' => 0]);
                    foreach ($bigs as $big) {
                    ?>
                        <option value="<?= $big['id'] ?>" <?= ($big['id'] == $row['big']) ? "selected" : "" ?>>
                            <?= $big['name'] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th class="tt">所屬中分類</th>
            <td class="pp">
                <select name="mid" id="mid">
                </select>
            </td>
        </tr>
        <tr>
            <th class="tt">商品編號</th>
            <td class="pp"><?= $row['no'] ?></td>
        </tr>
        <tr>
            <th class="tt">商品名稱</th>
            <td class="pp"><input type="text" name="name" value="<?= $row['name'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">商品價格</th>
            <td class="pp"><input type="text" name="price" value="<?= $row['price'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">規格</th>
            <td class="pp"><input type="text" name="spec" value="<?= $row['spec'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">庫存量</th>
            <td class="pp"><input type="text" name="stock" value="<?= $row['stock'] ?>"></td>
        </tr>
        <tr>
            <th class="tt">商品圖片</th>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <th class="tt">商品介紹</th>
            <td class="pp" class="padding:5px;">
                <textarea name="intro" id="intro" style="width:90%;height:150px;"><?= $row['intro'] ?></textarea>
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"><input type="button" value="返回"
            onclick="history.go(-1)"></div>
</form>
<script>
    getMid($('#big').val(), <?= $row['mid'] ?>);
    $('#big').on('change', function() {
        let big_id = $(this).val();
        getMid(big_id, 0);
    })

    function getMid(big_id) {
        let mid = "<?= $row['mid'] ?>";
        $.post('./api/get_mid.php?do=th', {
            big_id,
            mid
        }, (res) => {
            $('#mid').html(res);
        })
    }
</script>