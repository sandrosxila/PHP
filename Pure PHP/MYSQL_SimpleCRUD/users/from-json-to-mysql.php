<?php
require_once 'users-from-fs.php';
require_once 'users-from-mysql.php';
$servername = "localhost";
$username = "root";
$database = "webII_users_crud";
$password = "";
$tablename="users";
$con = openConnection($servername,$username,$password);
createDatabase($database,$con);
$dbcon=createTable($servername,$username,$password,$database,['Name','Username','Email','Phone','Website'],$tablename);
if(getNumRows($dbcon,$tablename)==0) {
    $JSONdata = getUsersFromJson();
    $statement = $dbcon->prepare('INSERT INTO ' . $tablename . '(Name,Username,Email,Phone,website) VALUES (?,?,?,?,?)');
    foreach ($JSONdata as $person) {
        $statement->bind_param('sssss', $person['name'], $person['username'], $person['email'], $person['phone'], $person['website']);
        $statement->execute();
    }
    $statement->close();
}

?>