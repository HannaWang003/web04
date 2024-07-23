<?php
include_once "db.php";
$_POST['acc'] = $_SESSION['mem'];
$_POST['no'] = date("Ymd") . rand(100000, 999999);
$_POST['orderdate'] = date("Y-m-d");
$_POST['cart'] = serialize($_SESSION['cart']);
$Order->save($_POST);
unset($_SESSION['cart']);
to("../index.php");
