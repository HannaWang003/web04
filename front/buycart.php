<?php
if (isset($_POST['id'], $_POST['qt'])) {
    $_SESSION['cart'][$_POST['id']] = $_POST['qt'];
}
if (!isset($_SESSION['mem'])) {
?>
    <script>
        alert('請先登入會員')
        location.href = "?do=mem";
    </script>
<?php
}
?>
<h2 class="ct"><?= $_SESSION['mem'] ?>的購物車</h2>
<form action="?do=checkout" method="post">
    <table width="90%" style="margin:auto;">
        <tr>
            <th class="tt">編號</th>
            <th class="tt">商品名稱</th>
            <th class="tt">數量</th>
            <th class="tt">庫存量</th>
            <th class="tt">單價</th>
            <th class="tt">小計</th>
            <th class="tt">刪除</th>
        </tr>
        <?php
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $qt) {
                $row = $Goods->find($id);
        ?>
                <tr>
                    <td class="ct pp"><?= $row['no'] ?></td>
                    <td class="pp"><?= $row['name'] ?></td>
                    <td class="pp" width="10%"><input type="number" name=qt[] value="<?= $qt ?>" class="qt" min="0"></td>
                    <td class="ct pp"><?= $row['stock'] ?></td>
                    <td class="ct pp"><?= $row['price'] ?></td>
                    <td class="ct pp"><?= $row['price'] * $qt ?></td>
                    <td class="ct pp"><img src="./icon/0415.jpg" onclick="del(<?= $row['id'] ?>)"></td>
                    <input type="hidden" name="id[]" value=<?= $row['id'] ?> class="id">
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <th colspan="7" class="pp" style="padding:20px;">尚未加入商品</th>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><button type="button" onclick="buyother()"><img src="./icon/0411.jpg"></button>
        <?php
        if (!empty($_SESSION['cart'])) {
        ?>
            <button><img src="./icon/0412.jpg"></button>
        <?php
        }
        ?>
    </div>
</form>
<script>
    function del(id) {
        $.post('./api/del_cart.php', {
            id
        }, () => {
            location.reload();
        })
    }

    function buyother() {
        let id = [];
        let qt = [];
        $('.qt').each((idx, elm) => {
            qt.push($(elm).val());
        })
        $('.id').each((idx, elm) => {
            id.push($(elm).val());
        })
        $.post('index.php', {
            id,
            qt
        }, () => {
            location.href = "index.php";
        })
    }
</script>