<?php
include_once "db.php";
$rows = $DB->all(['big_id' => $_GET['big_id']]);
foreach ($rows as $row) {
?>
    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
<?php
}
?>