<?php
include_once "db.php";
$rows = $DB->all(['big_id' => $_POST['big_id']]);
foreach ($rows as $row) {
?>
    <option value="<?= $row['id'] ?>" <?= ($_POST['mid'] == $row['id']) ? "selected" : "" ?>><?= $row['name'] ?></option>
<?php
}


?>