<?php

function createDatabase($name,$connection){
    $sqlQuery='CREATE DATABASE IF NOT EXISTS '.$name;
    $connection->query($sqlQuery);
}

function createTable($serverName,$userName,$Password,$databaseName,$columnArray,$tableName){
    $connection  = new mysqli($serverName,$userName,$Password,$databaseName);
    $sqlQuery='CREATE TABLE IF NOT EXISTS '.$tableName.' (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY';
    foreach ($columnArray as $element)$sqlQuery.=', '.$element.' varchar(100) NOT NULL';
    $sqlQuery.=')';
    $connection->query($sqlQuery);
    return $connection;
}

function getNumRows($TableData,$TableName){
    $result = $TableData->query('SELECT count(id) from '.$TableName)->fetch_assoc();
    return $result['count(id)'];
}

function getUsers()
{
    $connection = new mysqli('localhost','root','','webII_users_crud');
    $sqlQuery='SELECT * FROM users';
    $data=[];
    foreach($connection->query($sqlQuery) as $row){
        $temp=[];
        foreach($row as $key=>$value)$temp[strtolower($key)]=$value;
        array_push($data,$temp);
        $temp=array();
    }
    return $data;
}

function getUserById($id)
{
    // @todo implement getting user by id
    $data=getUsers();
    foreach ($data as $value){
        if($value['id']==$id) return $value;
    }
}
function createUser($data)
{
    //@todo implement creating user
    $connection = new mysqli('localhost','root','','webII_users_crud');
    $sqlQuery=$connection->prepare('INSERT INTO users (Name,Username,Email,Phone,website) VALUES (?,?,?,?,?)');
    $sqlQuery->bind_param('sssss',$data['name'],$data['username'],$data['email'],$data['phone'],$data['website']);
    $sqlQuery->execute();
    $sqlQuery->close();
}

function updateUser($data, $id)
{
    //@todo implement user update
    $connection = new mysqli('localhost','root','','webII_users_crud');
    $sqlQuery='UPDATE users SET ';
    foreach($data as $key=>$value) $sqlQuery.=$key.' = \''.$value.'\' ,';
    $sqlQuery=substr($sqlQuery,0,-1);
    $sqlQuery.=' WHERE id='.$id;
    $connection->query($sqlQuery);
}

function openConnection($serverName,$userName,$Password)
{
    $connection = new mysqli($serverName,$userName,$Password);
    if($connection->connect_error){
        return FALSE;
    }
    else return $connection;
}

function closeConnection($connection)
{
    $connection->close();
}
