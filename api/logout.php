<?php
include_once "db.php";
switch ($_GET['do']) {
    case "admin":
        unset($_SESSION['admin']);
        break;
    case "mem":
        unset($_SESSION['mem']);
        break;
}
to("../index.php");
