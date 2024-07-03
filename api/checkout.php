<?php
include_once "db.php";
$_POST['no'] = date("Ymd") . rand(100000, 999999);
$_POST['orderdate'] = date("Y-m-d");
$_POST['acc'] = $_SESSION['mem'];
$_POST['cart'] = serialize($_SESSION['cart']);
unset($_SESSION['cart']);
$Order->save($_POST);
