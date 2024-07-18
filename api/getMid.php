<?php
include_once "db.php";
$rows = $Type->all(['big_id' => $_GET['big']]);
foreach ($rows as $row) {
?>
    <option value="<?= $row['id'] ?>" <?= ($row['id'] == $_GET['id']) ? "selected" : "" ?>><?= $row['name'] ?></option>;
<?php
}

?>