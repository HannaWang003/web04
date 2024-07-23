<?php
session_start();
$table = $_GET['do'];
unset($_SESSION[$table]);
if ($table == "mem") {
    unset($_SESSION['cart']);
}
header("location:../index.php");
