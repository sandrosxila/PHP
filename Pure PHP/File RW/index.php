<?php
    $file = fopen("file.txt","a");
    fwrite($file,"BLAAAAA\n");
    fclose($file);
    $file = fopen("file.txt","r");
    $text = fread($file,filesize("file.txt"));
    print_r($text);
?>