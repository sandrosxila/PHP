<?php

function getUsersFromJson()
{
    $data=file_get_contents(__DIR__.'/users.json');
    $data = json_decode($data,1);
    return $data;
}

function getUserByIdFromJson($id)
{
    $data=getUsersFromJson();
    foreach($data as $user){
        if($user['id']==$id){
            return $user;
        }
    }
    return null;
}
function createUserInJson($data)
{
    $dataBase=getUsersFromJson();
    array_push($dataBase,$data);
    $dataBase=json_encode($dataBase,JSON_PRETTY_PRINT);
    file_put_contents(__DIR__.'/users.json',$dataBase);
}

function updateUserInJson($data, $id)
{
    //@todo implement user update in json
    $dataBase=getUsersFromJson();
    for($i=0;$i<count($dataBase);$i++){
        if($dataBase[$i]['id']==$id)$dataBase[$i]=$data;
    }
    $dataBase=json_encode($dataBase,JSON_PRETTY_PRINT);
    file_put_contents(__DIR__.'/users.json',$dataBase);
}
