<?php
include_once "db.php";
echo $_POST['no'] = date("Ymd") . rand(100000, 999999);
$_POST['orderdate'] = date("Y-m-d");
$_POST['cart'] = serialize($_SESSION['cart']);
$_POST['acc'] = $_SESSION['mem'];
$DB->save($_POST);
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
$mem['total'] += $_POST['total'];
$Mem->save($mem);
unset($_SESSION['cart']);
