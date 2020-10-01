<?php
require_once __DIR__."/users/users.php";
// @todo implement user delete and redirect user with:
$user=getUserById($_GET['id']);
$user['delete']=TRUE;
createUser($user);
header('Location: index.php');