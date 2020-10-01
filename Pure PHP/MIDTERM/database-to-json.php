<?php
require_once "read-database.php";
$data = getUsers();
$data = json_encode($data,JSON_PRETTY_PRINT);
file_put_contents(__DIR__.'/users.json',$data);