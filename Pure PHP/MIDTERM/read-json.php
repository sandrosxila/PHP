<?php
$server="localhost:3316";
$user='root';
$pass='';
$database='myDatabase';
$tablename = 'user';
function createTable($serverName,$userName,$Password,$databaseName,$columnArray,$tableName){
    $connection  = new mysqli($serverName,$userName,$Password,$databaseName);
    $sqlQuery='CREATE TABLE IF NOT EXISTS '.$tableName.' (_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY';
    foreach ($columnArray as $element)$sqlQuery.=', '.$element.' varchar(100) NOT NULL';
    $sqlQuery.=')';
    $connection->query($sqlQuery);
    return $connection;
}
$file = file_get_contents(__DIR__.'/users.json');
$JSONData = json_decode($file,1);
createTable(
    $server,$user,$pass,$database,["age","name","gender","company","email","phone","address"],
    $tablename);
$dbcon  = new mysqli($server,$user,$pass,$database);
$statement = $dbcon->prepare('INSERT INTO ' . $tablename . '(age,name,gender,company,email,phone,address) VALUES (?,?,?,?,?,?,?)');
foreach ($JSONData as $person) {
    $statement->bind_param(
        'sssssss',
        $person['age'],
        $person['name'],
        $person['gender'],
        $person['company'] ,
        $person['email'],
        $person['phone'],
        $person['address']);
    $statement->execute();
}
$statement->close();