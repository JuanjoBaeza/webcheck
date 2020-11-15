<?php

$remoteFile = 'http://emballatorlifestyle.se/en/index.php';
$headers  = get_headers($remoteFile, 1);
$headers  = array_change_key_case($headers);
$fileSize = -1;

if(isset($headers['content-length'])){
    $fileSize = $headers['content-length'];
}
 
echo $fileSize[1];
