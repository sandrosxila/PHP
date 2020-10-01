<?php

function getUsersFromJson()
{
    $jsonString = file_get_contents(__DIR__ . '/users.json');
    return json_decode($jsonString, true);
}

function getUserByIdFromJson($id)
{
    $users = getUsers();
    foreach ($users as $user){
        if ($user['id'] == $id){
            return $user;
        }
    }
    return null;
}
function createUserInJson($data)
{
    $users = getUsers();
    $data['id'] = count($users)+1;
    $users[] = $data;
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
    return $data['id'];
}

function updateUserInJson($data, $id)
{
    //@todo implement user update in json
    $users = getUsers();
    $x=0;
    for ($i=0;$i<count($users);$i++){
        if ($users[$i]['id'] == $id){
            global $x;
            $x=$i;
        }
    }
    $users[$x]=$data;
    $writeData=json_encode($users,JSON_PRETTY_PRINT);
    $file = fopen(__DIR__.'\users.json','w');
    fwrite($file,$writeData);
    fclose($file);

}
