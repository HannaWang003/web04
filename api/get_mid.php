<?php
include_once "db.php";
$rows = $Type->all($_POST);
foreach ($rows as $row) {
?>
    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>;
<?php
}
?>