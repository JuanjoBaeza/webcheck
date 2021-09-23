<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

require($_SERVER['DOCUMENT_ROOT'].'/config/global.php');
require($_SERVER['DOCUMENT_ROOT'].'/class/download.php');

array_map('unlink', glob("webs/*.*"));    

foreach($webs as $web => $data) {
    
    if($data[0] == 1){
        
        $r = new HTTPRequest('http://'.$data[1]);
        $fichero = $data[1];
        file_put_contents('webs/'.$fichero, $r->DownloadToString());   
        
    } else { 
        
        return false;         
    }
    
    header("Location: $basepath");
}
