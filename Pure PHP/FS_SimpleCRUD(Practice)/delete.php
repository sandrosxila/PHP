<?php
require_once __DIR__."/users/users.php";
// @todo implement user delete and redirect user with:
$data = getUsers();
$new = [];
foreach ($data as $user){
    if($user['id']!=$_GET['id']){
        array_push($new,$user);
    }
}
$new = json_encode($new,JSON_PRETTY_PRINT);
file_put_contents(__DIR__.'\users\users.json',$new);
header('Location: index.php');