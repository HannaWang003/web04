<?php
include_once "db.php";
switch ($_GET['do']) {
    case "mem":
        unset($_SESSION['mem']);
        unset($_SESSION['cart']);
        break;
    case "admin":
        unset($_SESSION['admin']);
        break;
}
to("../index.php");
