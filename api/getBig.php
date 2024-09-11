<?php
include_once "db.php";
$rows = $DB->all(['big_id' => 0]);
foreach ($rows as $row) {
?>
    <option value="<?= $row['id'] ?>" <?= ($_GET['id'] != 0 && $row['id'] == $_GET['id']) ? "selected" : "" ?>><?= $row['name'] ?>
    </option>
<?php
}
?>