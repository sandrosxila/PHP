<?php
$ch=curl_init();

curl_setopt($ch,CURLOPT_URL,'https://jsonplaceholder.typicode.com/posts');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
$response = json_decode($response,1);
$response = json_encode($response,JSON_PRETTY_PRINT);
curl_close($ch);
file_put_contents(__DIR__.'/posts.json',$response);