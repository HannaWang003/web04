<?php
include_once "db.php";
echo $res = $DB->count(['acc' => $_POST['acc']]);
