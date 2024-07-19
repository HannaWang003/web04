<?php
session_start();
unset($_SESSION[$_GET['do']]);
if ($_GET['do'] == "mem") {
    unset($_SESSION['cart']);
}
header("location:../index.php");
