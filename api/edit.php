<?php
include_once "db.php";
unset($_GET['do']);
$DB->save($_GET);
