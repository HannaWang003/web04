<?php
include_once "db.php";
$id = 0;
$rows = $Th->all(['big_id' => $_GET['big_id']]);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
foreach ($rows as $row) {
?>
<option value="<?= $row['id'] ?>" <?= ($row['id'] == $id) ? "selected" : "" ?>><?= $row['name'] ?></option>
<?php
}