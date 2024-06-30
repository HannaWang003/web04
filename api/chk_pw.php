<?php
include_once "db.php";
$DB = ${ucfirst($_POST['table'])};
$table = $_POST['table'];
unset($_POST['table']);
echo $chk = $DB->count($_POST);
if ($chk) {
    $_SESSION[$table] = $_POST['acc'];
}
