<?php

function getUsers()
{
    return json_decode(file_get_contents(__DIR__.'\users.json'),1);
}

function getUserById($id)
{
    $data=getUsers();
    return $data[$id-1];
}


function createUser($data)
{
    $database=getUsers();
    array_push($database,$data);
    $file=fopen(__DIR__.'\users.json','w');
    $writeData=json_encode($database,JSON_PRETTY_PRINT);
    fwrite($file,$writeData);
    fclose($file);
}

function updateUser($data, $id)
{
    $database=getUsers();
    $database[$id-1]=$data;
    $writeData=json_encode($database,JSON_PRETTY_PRINT);
    $file = fopen(__DIR__.'\users.json','w');
    fwrite($file,$writeData);
    fclose($file);
}