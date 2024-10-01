<?php
include_once "db.php";
$_POST['no'] = date("Ymd") . rand(100000, 999999);
$_POST['acc'] = $_SESSION['mem'];
$_POST['cart'] = serialize($_SESSION['cart']);
$_POST['orderdate'] = date("Y-m-d");
$mem = $Mem->find(['acc' => $_SESSION['mem']]);
$mem['total'] += $_POST['total'];
$Mem->save($mem);
$DB->save($_POST);
to("../index.php");
