<?php

require($_SERVER['DOCUMENT_ROOT'].'/web-checker/config/global.php');

foreach($webs as $web => $data) {
    
    if($data[0] == 1){
    
        $fichero = $data[1];

        $url = file_get_contents('http://'.$data[1]);

        file_put_contents('webs/'.$fichero, $url);
       
    } else { return false; }
    
        header('Location:'.$basepath.'/index.html');
}
