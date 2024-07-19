<?php
session_start();
$table = $_GET['table'];
$DB = ${ucfirst($table)};
unset($_SESSION[$table]);
if ($table == "mem") {
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
}
header("location:../index.php");
