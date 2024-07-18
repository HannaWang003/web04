<?php
session_start();
$table = $_GET['table'];
$DB = ${ucfirst($table)};
unset($_SESSION[$table]);
header("location:../index.php");
