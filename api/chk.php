<?php
include_once "db.php";
$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);
echo $res = $DB->count($_POST);
if ($res == 1) {
    $_SESSION[$table] = $_POST['acc'];
}
