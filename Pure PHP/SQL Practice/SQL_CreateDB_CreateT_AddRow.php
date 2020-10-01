<?php
$servername='localhost';
$usename='root';
$password='';
$con = new mysqli($servername,$usename,$password);
echo "<pre>";
print_r($con);
echo"</pre>";
//echo var_dump((Bool)$con->connect_error);
if($con->connect_error){
    die("connection Failed".$con->connect_error."<br>");
}
else echo "connected Successfully<br>";
$sql='CREATE DATABASE myDB';
if($con->query($sql)===TRUE){
    echo "DataBase Created Successfully<br>";
}
else {
    echo "error creating DataBase<br>".$con->error."<br>";
    $con=new mysqli($servername,$usename,$password,'myDB');
}
$sql='CREATE TABLE myTable (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name nvarchar(100) NOT NULL,
    Username nvarchar(100) NOT NULL,
    Email nvarchar(100) NOT NULL,
    Phone nvarchar(100) NOT NULL,
    Website varchar(200) NOT NULL
)';
if($con->query($sql)==true){
    echo "Table Created Succesfully<br>";
}
else {
    echo "Error Creating Table ".$con->error."<br>";
}

$fileData=json_decode(file_get_contents('users.json'),1);
foreach($fileData as $value) {
    $sql = 'INSERT INTO myTable (Name,Username,Email,Phone,Website) VALUES 
(\'' . $value['name'] . '\',\'' . $value['username'] . '\',\'' . $value['email'] . '\',\'' . $value['phone'] . '\',\'' . $value['website'] . '\')';
    if($con->query($sql) === TRUE){
        echo 'row created successfully<br>';
    }
    else {
        echo 'error creating row : '.$con->error."<br>";
    }
}
$res = $con->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'm'");
print_r($res);
$con->close();