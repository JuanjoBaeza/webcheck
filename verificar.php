<?php

require($_SERVER['DOCUMENT_ROOT'].'/config/global.php');
require($_SERVER['DOCUMENT_ROOT'].'/core/header.php');
require($_SERVER['DOCUMENT_ROOT'].'/sys/pintar.php');

echo '  
      <center>
        <table border="1">
            <tr>
                <td align="center" style="width:40px;"> ACTIVO </td>
                <td align="center" style="width:250px;"> URL </td>
                <td align="center" style="width:120px;"> HTTP CODE </td>
                <td align="center" style="width:110px;"> LINEAS LOCAL </td>
                <td align="center" style="width:110px;"> LINEAS WEB </td>
                <td align="center" style="width:110px;"> DIFER % </td>
            </tr>
     ';

function isa_count_datafile_lines($file) {
    set_time_limit(300);
    ini_set('memory_limit', '-1');
    $arr = file($file, FILE_IGNORE_NEW_LINES);
    $c = ( false === $arr) ? 0 : count($arr);
    set_time_limit(30);
    ini_set('memory_limit','128M');
    return $c;
}

foreach($webs as $web => $data) {
    
    $activo = $data[0];            
    $url    = $data[1];
    $file   = "webs/$url";
    
    if(!$data[1] || !is_string($data[1]) || !preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $data[1]) && $data[0] == 1) {    

        $handle = curl_init($data[1]);

            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_HEADER, true); 
            curl_setopt($handle, CURLOPT_NOBODY, true);

            $response = curl_exec($handle);
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

            curl_close($handle);   

            ltrim($data[1]); rtrim($data[1]);

            @$lineas_online = count(file('http://'.$url));
                      
            $lineas_local = isa_count_datafile_lines($file);          
            
            if($lineas_local < $lineas_online)  {$calc = ($lineas_local / $lineas_online)*100; $diff = round($calc,1)."%";}
            if($lineas_local > $lineas_online)  {$calc = ($lineas_online / $lineas_local)*100; $diff = 100 - (round($calc,1))."%";}
            
            if($lineas_local == $lineas_online) {$diff = "0%";}
          
            if($lineas_local == 0) {$diff = '';}
            
            pintar_resultados($url, $httpCode, $lineas_online, $lineas_local, $activo, $diff);
    
    } else { 

            if($activo == 0) {$lineas_online = ''; $lineas_local = ''; $diff = ''; $httpCode = '';}
            
            pintar_resultados($url, $httpCode, $lineas_online, $lineas_local, $activo, $diff); 
    }   
}

echo '     
          </table>
        </center>
               
      <div class="container">
      <div class="content"><a href="'.$basepath.'" class="btn btn-info">VOLVER AL INICIO</a></div>
      </div>
     ';

include ('core/footer.php');
