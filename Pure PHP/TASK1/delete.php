<?php
require_once __DIR__."/users/users.php";
// @todo implement user delete and redirect user with:
$database=getUsers();
array_splice($database,$_GET['id']-1,1);
$tempdata=[];
foreach($database as $key => $value){
    $temp=$value;
    $temp['id']=(int)$key+1;
    array_push($tempdata,$temp);

}
$data=json_encode($tempdata,JSON_PRETTY_PRINT);
$file=fopen(__DIR__."/users/users.json",'w');
fwrite($file,$data);
fclose($file);
header('Location: index.php');
