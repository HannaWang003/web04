<?php
include_once "db.php";
$Admin->save([
    "acc" => "admin",
    "pw" => "1234",
    "pr" => serialize([1, 2, 3, 4, 5])
]);
