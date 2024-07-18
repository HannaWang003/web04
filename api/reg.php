<?php
include_once "db.php";
$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);
$_POST['regdate'] = date("Y-m-d");
$DB->save($_POST);
