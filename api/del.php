<?php
include_once "db.php";
$DB = ${ucfirst($_GET['table'])};
$DB->del($_GET['id']);
