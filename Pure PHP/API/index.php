<?php
$database = json_decode(file_get_contents("package.json"), 1);
$key = substr($_SERVER['PATH_INFO'], strpos($_SERVER['PATH_INFO'], '/', 1)+1);
function reWrite(&$data){
    $data = json_encode($data,JSON_PRETTY_PRINT);
    $file = fopen("package.json", "w");
    fwrite($file, $data);
    fclose($file);
};
if(isset($_SERVER['PATH_INFO']) && strpos($_SERVER['PATH_INFO'],"/movies/")!== false && $_SERVER['HTTP_ACCEPT']=="application/json"){
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
        print_r(array_key_exists($key, $database)? $database[$key]:"That Movie Doesn't exists");
    else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (array_key_exists($key, $database)) echo "that movie exists";
            else $database[$key] = $_GET;
            reWrite($database);
    }
    else if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
            if (array_key_exists($key, $database)) unset($database[$key]);
            else echo "That Movie Doesn't exists";
            reWrite($database);
    }
}