<?php
include_once "db.php";
$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);
echo $DB->count($_POST);
$_SESSION[$table] = $_POST['acc'];
