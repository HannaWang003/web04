<?php
include_once "db.php";
$row['acc'] = "test01";
$row['pw'] = "test01";
$row['pr'] = serialize([1, 2, 3]);
$Admin->save($row);
