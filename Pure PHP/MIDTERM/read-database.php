<?php
function getUsers()
{
    $connection = new mysqli('localhost:3316','root','','myDatabase');
    $sqlQuery='SELECT * FROM user';
    $data=[];
    foreach($connection->query($sqlQuery) as $row){
        $temp=[];
        foreach($row as $key=>$value)$temp[$key]=$value;
        array_push($data,$temp);
    }
    return $data;
}
$datasql = getUsers();
echo "<pre>";
var_dump($datasql);
echo "</pre>";