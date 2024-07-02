<?php
include_once "db.php";
$rows = $Type->all(['big_id' => 0]);
foreach ($rows as $row) {
?>
    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>;
<?php
}
?>