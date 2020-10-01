<?php
require_once __DIR__."/users/users-from-mysql.php";
// @todo implement user delete and redirect user with:
$connection = new mysqli('localhost','root','','webII_users_crud');
$sqlQuery="DELETE FROM users WHERE id=".$_GET['id'];
$connection->query($sqlQuery);
closeConnection($connection);
if(is_writable(realpath(__DIR__ . "/users/images/${_GET['id']}.png"))==1)unlink(__DIR__ . "/users/images/${_GET['id']}.png");
header('Location: index.php');