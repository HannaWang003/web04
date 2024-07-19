<?php
include_once "db.php";
$_POST['no'] = date("Ymd") . rand(100000, 999999);
$_POST['orderdate'] = date("Ymd");
$_POST['acc'] = $_SESSION['mem'];
$_POST['cart'] = serialize($_SESSION['cart']);
$Order->save($_POST);
$mem = $Mem->find(['acc' => $_POST['acc']]);
$mem['total'] += $_POST['total'];
$Mem->save($mem);
echo $_POST['no'];
unset($_SESSION['cart']);
