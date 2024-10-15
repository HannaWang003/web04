<?php
if (isset($_POST['id'], $_POST['qt'])) {
    $_SESSION['cart'][$_POST['id']] = $_POST['qt'];
}
if (!isset($_SESSION['mem'])) {
    to("?do=mem");
}
?>
<style>
    #buycart {
        width: 90%;
        margin: auto;
    }
</style>
<h2 class="ct"><?= $_SESSION['mem'] ?>的購物車</h2>
<form action="?do=checkout" method="post">
    <table id="buycart">
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
        if (empty($_SESSION['cart'])) {
        ?>
            <tr>
                <td class="pp ct" colspan="7">尚未加入商品</td>
            </tr>
            <?php
        } else {
            foreach ($_SESSION['cart'] as $id => $qt) {
                $row = $Goods->find($id);
            ?>
                <tr>
                    <td class="pp"><?= $row['no'] ?></td>
                    <td class="pp"><?= $row['name'] ?></td>
                    <td class="pp"><input type="number" name="qt[]" value="<?= $qt ?>" class="qt"></td>
                    <td class="pp"><?= $row['stock'] ?></td>
                    <td class="pp"><?= $row['price'] ?></td>
                    <td class="pp"><?= $row['price'] * $qt ?></td>
                    <td class="pp"><img src="./icon/0415.jpg" onclick="del(<?= $row['id'] ?>)"></td>
                    <input type="hidden" name="id[]" value=<?= $id ?> class="id">
                </tr>
        <?php
            }
        }
        ?>
        <tr>
            <td class="ct" colspan="7" style="padding:10px">
                <button type="button"><img src="./icon/0411.jpg" onclick="location.href='index.php'"></button>
                <?php
                echo (!empty($_SESSION['cart'])) ? "<button><img src='./icon/0412.jpg'></button>" : "";
                ?>

            </td>
        </tr>
    </table>
</form>
<script>
    function del(id) {
        $.post('./api/del_buycart.php', {
            id
        }, () => {
            location.href = "?do=buycart"
        })
    }
</script>