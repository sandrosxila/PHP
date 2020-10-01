<?php

function getUsers()
{
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,'http://localhost:8080/API_For_Curl(CRUD)/index.php');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    $output=curl_exec($ch);
    curl_close($ch);
    $result = strip_tags($output);
    $result =json_decode($result,1);
    return $result;
}

function getUserById($id)
{
    $dataBase = getUsers();
    foreach ($dataBase as $user){
        if($user['id']==$id)return $user;
    }
    return null;
}
function createUser($data)
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'http://localhost:8080/API_For_Curl(CRUD)/index.php');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));
    var_dump(http_build_query($data));
    curl_exec($ch);
    curl_close($ch);
}

function updateUser($data, $id)
{
    //@todo implement user update in json
    $data['id']=$id;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'http://localhost:8080/API_For_Curl(CRUD)/index.php');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));
    curl_exec($ch);
    curl_close($ch);

}
