<?php
include_once "db.php";
$rows = $Th->all(['big_id' => 0]);
if (!empty($rows)) {
    foreach ($rows as $row) {
?>
<option value="<?= $row['id'] ?>" <?= ($row['id'] == $_GET['id'])?"selected":"" ?>><?= $row['name'] ?></option>
<?php
    }
}
?>