<?php

function createDatabase($name,$connection){
    $sqlQuery="CREATE DATABASE IF NOT EXISTS $name";
    $connection->query($sqlQuery);
}

function createTable($serverName,$userName,$Password,$databaseName,$columnArray,$tableName){
    $connection = new mysqli($serverName,$userName,$Password,$databaseName);
    $sqlQuery = "CREATE TABLE IF NOT EXISTS $tableName ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY";
    foreach ($columnArray as $column)$sqlQuery.=", $column nvarchar(60) NOT NULL";
    $sqlQuery.=')';
    $connection->query($sqlQuery);
    closeConnection($connection);
}

function getNumRows($TableName){
    $connection = new mysqli('localhost','root','','practice_users_crud');
    $sqlQuery="SELECT count(id) FROM $TableName";
    $result = $connection->query($sqlQuery)->fetch_assoc();
    return $result['count(id)'];
}

function getUsers()
{
    $data=[];
    $connection = new mysqli('localhost','root','','practice_users_crud');
    $sqlQuery="SELECT * FROM users";
    $result = $connection -> query($sqlQuery);
    while($row = $result->fetch_assoc())array_push($data,$row);
    return $data;
}

function getUserById($id)
{
    // @todo implement getting user by id
    $connection = new mysqli('localhost','root','','practice_users_crud');
    $sqlQuery="SELECT * FROM users WHERE id=$id";
    $result = $connection->query($sqlQuery)->fetch_assoc();
    closeConnection($connection);
    return $result;
}
function createUser($data)
{
    //@todo implement creating user
    $connection = new mysqli('localhost','root','','practice_users_crud');
    $statement = $connection->prepare( "INSERT INTO users (name,username,email,phone,website) VALUES (?,?,?,?,?)");
    $statement->bind_param('sssss',$data['name'],$data['username'],$data['email'],$data['phone'],$data['website']);
    $statement->execute();
    $statement->close();
}

function updateUser($data, $id)
{
    //@todo implement user update
    var_dump($data);
    $connection = new mysqli('localhost','root','','practice_users_crud');
    $sqlQuery = "UPDATE users SET ";
    foreach ($data as $key=>$value)$sqlQuery.="$key='$value',";
    $sqlQuery=substr($sqlQuery,0,-1);
    $sqlQuery.="WHERE id=$id";
    $connection-> query($sqlQuery);
    var_dump($connection->error,$sqlQuery);
    closeConnection($connection);

}

function openConnection($serverName,$userName,$Password)
{
    $connection = new mysqli($serverName,$userName,$Password);
    return $connection;
}

function closeConnection($connection)
{
    $connection->close();
}
