<?php
include_once "db.php";
$DB->save($_POST);
to("../back.php?do=$table");
