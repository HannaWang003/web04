<?php
include_once "db.php";
$_POST['no'] = date("Ymd") . rand(100000, 999999);
$_POST['orderdate'] = date("Ymd");
$_POST['acc'] = $_SESSION['mem'];
$_POST['cart'] = serialize($_SESSION['cart']);
$Order->save($_POST);
echo $_POST['no'];
unset($_SESSION['cart']);
