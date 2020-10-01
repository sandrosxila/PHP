<?php

function getUsers()
{
    $usersdata = file_get_contents(__DIR__.'\users.json');
    $usersdata = json_decode($usersdata,1);
    return $usersdata;
}

function getUserById($id)
{
    $data = getUsers();
    foreach ($data as $user){
        if($user['id']==$id){
            return $user;
        }
    }
    return null;
}
function createUser($data)
{
    $dataBase=getUsers();
    array_push($dataBase,$data);
    $dataBase = json_encode($dataBase,JSON_PRETTY_PRINT);
    file_put_contents(__DIR__.'\users.json',$dataBase);
}

function updateUser($data, $id)
{
    //@todo implement user update in json
    $dataBase = getUsers();
    for($i = 0;$i<count($dataBase);$i++){
        if($dataBase[$i]['id']==$id){
            $dataBase[$i]=$data;
        }
    }
    $dataBase = json_encode($dataBase,JSON_PRETTY_PRINT);
    file_put_contents(__DIR__.'\users.json',$dataBase);
}
