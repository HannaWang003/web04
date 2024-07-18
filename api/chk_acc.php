<?php
include_once "db.php";
$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);
if ($DB->count($_POST) > 0 || $_POST['acc'] == "admin") {
    echo "1";
} else {
    echo "0";
}
