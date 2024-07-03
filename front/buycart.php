<?php
if (isset($_GET['id']) && isset($_GET['qt'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if (!isset($_SESSION['mem'])) {
    to("?do=login");
} else {
?>
    <h2 class="ct"><?= $_SESSION['mem'] ?>的購物車</h2>
    <?php
    if (empty($_SESSION['cart'])) {
        echo "<h3 class='ct'>目前購物車是空的</h3>";
    } else {
    ?>
        <table style="width:95%;margin:auto;">
            <tr>
                <th class=" tt">編號</th>
                <th class="tt">商品名稱</th>
                <th class="tt">數量</th>
                <th class="tt">庫存量</th>
                <th class="tt">單價</th>
                <th class="tt">小計</th>
                <th class="tt">刪除</th>
            </tr>
            <?php
            foreach ($_SESSION['cart'] as $id => $qt) {
                $g = $Goods->find($id);
            ?>
                <tr>
                    <td class="pp"><?= $g['no'] ?></td>
                    <td class="pp"><?= $g['name'] ?></td>
                    <td class="pp"><input type="number" name="qt" id="qt" value="<?= $qt ?>"></td>
                    <td class="pp"><?= $g['stock'] ?></td>
                    <td class="pp"><?= $g['price'] ?></td>
                    <td class="pp"><?= $qt * $g['price'] ?></td>
                    <td class="pp"><img src="./icon/0415.jpg" onclick="removeItem(<?= $g['id'] ?>)"></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <div class="ct">
            <img src="./icon/0411.jpg" onclick="location.href='index.php'">
            <img src="./icon/0412.jpg" onclick="location.href='?do=checkout'">
        </div>
<?php
    }
}
?>
<script>
    function removeItem(id) {
        $.get('./api/remove_item.php', {
            id
        }, () => {
            location.href = "?do=buycart";
        })
    }
</script>