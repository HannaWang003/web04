<?php
include_once "db.php";
$admin = [
    "acc" => "admin",
    "pw" => "1234",
    "pr" => serialize([1, 2, 3, 4, 5])
];
$Admin->save($admin);
to("../index.php?do=admin");
