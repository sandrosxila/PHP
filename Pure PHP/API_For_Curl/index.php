<?php
$dataBase = file_get_contents(__DIR__."\package.json");
//$dataBase = json_decode($dataBase,1);

if($_SERVER['REQUEST_METHOD']=='GET'){
    echo "<pre>";
    print_r($dataBase);
    echo "</pre>";
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $dataBase = json_decode($dataBase,1);
    array_push($dataBase,$_POST);
    file_put_contents(__DIR__."\package.json",json_encode($dataBase,JSON_PRETTY_PRINT));
    echo "<pre>";
    print_r($dataBase);
    echo "</pre>";
}
?>
