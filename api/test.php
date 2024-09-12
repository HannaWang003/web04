<?php
include_once "db.php";
$pr = serialize([1, 2, 3, 4, 5]);
$test = [
    "acc" => "admin",
    "pw" => "1234",
    "pr" => $pr
];
$Admin->save($test);
