<?php
include_once "db.php";
$_POST['regdate'] = date("Y-m-d");
$DB->save($_POST);
