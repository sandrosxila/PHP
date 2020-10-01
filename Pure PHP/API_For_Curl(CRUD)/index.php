<?php
$dataBase = file_get_contents(__DIR__."\users.json");
//$dataBase = json_decode($dataBase,1);

if($_SERVER['REQUEST_METHOD']=='GET'){
    echo "<pre>";
    print_r($dataBase);
    echo "</pre>";
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $dataBase = json_decode($dataBase,1);
    if(isset($_POST['delete']) && $_POST['delete']==TRUE){
        for ($i = 0; $i < count($dataBase); $i++) {
            if ($dataBase[$i]['id'] == $_POST['id']) {
                $pos=$i;
            }
        }
        array_splice($dataBase,$pos,1);
    }
    else {
        $flag = TRUE;
        for ($i = 0; $i < count($dataBase); $i++) {
            if ($dataBase[$i]['id'] == $_POST['id']) {
                $dataBase[$i] = $_POST;
                $flag = FALSE;
                break;
            }
        }
        if ($flag) array_push($dataBase, $_POST);
    }

    file_put_contents(__DIR__."\users.json",json_encode($dataBase,JSON_PRETTY_PRINT));
    echo "<pre>";
    print_r($dataBase);
    echo "</pre>";
}
?>
