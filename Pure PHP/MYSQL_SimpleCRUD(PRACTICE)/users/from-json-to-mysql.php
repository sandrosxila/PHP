<?php
require_once 'users-from-fs.php';
require_once 'users-from-mysql.php';
$servername = "localhost";
$username = "root";
$database = "practice_users_crud";
$password = "";
$tablename="users";
$con = new mysqli($servername,$username,$password);
createDatabase($database,$con);
createTable($servername,$username,$password,$database,["name","username",'email','phone','website'],$tablename);
if(getNumRows($tablename)==0){
    $usersJSON=getUsersFromJson();
    foreach ($usersJSON as $userJSON)createUser($userJSON);
}

?>