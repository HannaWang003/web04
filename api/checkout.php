<?php
include_once "db.php";
$_POST['acc'] = $_SESSION['mem'];
$_POST['orderdate'] = date("Y-m-d");
$_POST['no'] = date("Ymd") . rand(100000, 999999);
$_POST['cart'] = serialize($_SESSION['cart']);
$DB->save($_POST);
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
$mem['total'] += $_POST['total'];
$Mem->save($mem);
unset($_SESSION['cart']);
