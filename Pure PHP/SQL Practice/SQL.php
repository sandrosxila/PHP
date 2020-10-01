<?php
$servername='localhost';
$username='root';
$password='';
$databasename='myDB';
$con = new mysqli($servername,$username,$password,$databasename);
function getNumRows($TableData){
    $result = $TableData->query('SELECT count(id) from myTable')->fetch_assoc();
    return $result['count(id)'];
}
print_r((getNumRows($con)));
//echo "<pre>";
//print_r($max_id);
//echo "</pre>";