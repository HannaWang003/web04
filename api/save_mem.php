<?php
include_once "db.php";
$table = $_POST['table'];
$DB = ${ucfirst($table)};
unset($_POST['table']);
$DB->save($_POST);
to("../back.php?do=$table");
