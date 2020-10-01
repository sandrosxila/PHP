<?php
$ch = curl_init();
$postData = array(
    "name" => "nick",
    "surname" => "fury",
    "age" => 14
);
curl_setopt($ch,CURLOPT_URL,"localhost:8080/API_For_Curl/index.php");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($postData));
$output = curl_exec($ch);
if($output===FALSE){
    echo curl_error($ch);
}
echo "<pre>";
print_r($output);
echo "</pre>";
curl_close($ch);