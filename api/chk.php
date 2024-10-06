<?php
include_once "db.php";
echo $DB->count(['acc' => $_POST]);
