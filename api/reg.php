<?php
include_once "db.php";
$_POST['regdate'] = date("Y-m-d");
$_SESSION['mem'] = $_POST['acc'];
$Mem->save($_POST);
