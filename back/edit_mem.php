<?php
$row = $Mem->find($_GET['id']);
?>
<h2 class="ct">編輯會員資料</h2>
<style>
#mem {
    width: 80%;
    margin: auto;
    padding: 10px;
    border: 1px solid #333;
    box-shadow: 0 0 10px #999;

    th {
        width: 40%;
    }
}
</style>
<form action="./api/mem.php?do=mem" method="post">
    <table id="mem">
        <tr>
            <th class="tt">帳號</th>
            <td class="pp"><?= $row['acc'] ?></td>
        </tr>
        <tr>
            <th class="tt">密碼</th>
            <td class="pp"><?= str_repeat("*",mb_strlen($row['pw'])) ?></td>
        </tr>
        <tr>
            <th class="tt">累積金額</th>
            <td class="pp">
                <?=$row['total']?>
            </td>
        </tr>
        <tr>
            <th class="tt">姓名</th>
            <td class="pp">
                <input type="text" name="name" value="<?=$row['name']?>">
            </td>
        </tr>
        <tr>
            <th class="tt">電子信箱</th>
            <td class="pp">
                <input type="text" name="email" value="<?=$row['email']?>">
            </td>
        </tr>
        <tr>
            <th class="tt">地址</th>
            <td class="pp">
                <input type="text" name="addr" value="<?=$row['addr']?>">
            </td>
        </tr>
        <tr>
            <th class="tt">電話</th>
            <td class="pp">
                <input type="text" name="tel" value="<?=$row['tel']?>">
            </td>
        </tr>
        <tr>
            <input type="hidden" name="id" value=<?= $row['id'] ?>>
            <td colspan="2" class="ct"><input type="submit" value="編輯"><input type="reset" value="重置"><input
                    type="button" value="取消" onclick="location.href='?do=mem'"></td>
        </tr>
    </table>
</form>