<?php
include_once "db.php";
if ($_POST['table'] == 'cart') {
    unset($_SESSION['cart'][$_POST['id']]);
} else {
    $table = $_POST['table'];
    $DB = ${ucfirst($table)};
    unset($_POST['table']);
    $DB->del($_POST);
}
