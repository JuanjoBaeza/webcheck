<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

require($_SERVER['DOCUMENT_ROOT'].'/web-checker/config/global.php');
require($_SERVER['DOCUMENT_ROOT'].'/web-checker/core/header.php');
require($_SERVER['DOCUMENT_ROOT'].'/web-checker/sys/pintar.php');

date_default_timezone_set("Europe/Madrid");
$fecha = date("F j, Y, g:i a");

echo '<br>
        <center><img src="assets/img/secify.png">
        <br><br>STATUS WEBS CLIENTES - '.$fecha.'</center><br>

        <center>
        <table border="1">
            <tr>
                <td align="center" style="width:250px;"><b>URL</b></td>
                <td align="center" style="width:140px;"><b>STATUS CODE</b></td>
                <td align="center" style="width:130px;"><b>LINEAS LOCAL</b></td>
                <td align="center" style="width:120px;"><b>LINEAS WEB</b></td>
                <td align="center" style="width:110px;"><b>MATCH %</b></td>
            </tr>
     ';

foreach($webs as $web => $data) {
    
    $activo = $data[0];            
    $url    = $data[1];
    
    if($activo == 1) { $lineas_set = count(file('/var/www/html/web-checker/webs/'.$url)); }
    
    if(!$url || !is_string($url) || !preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url) && $activo == 1) {    

        $handle = curl_init($url);

            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_HEADER, true); 
            curl_setopt($handle, CURLOPT_NOBODY, true);

            $response = curl_exec($handle);
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

            curl_close($handle);   

            ltrim($url); rtrim($url);

            @$lineas_get = count(file('http://'.$url));

            $char_local  = strlen(file_get_contents('/var/www/html/web-checker/webs/'.$url));
            $char_remote = strlen(@file_get_contents('http://'.$url));
            
            if($char_remote == 0) {$diff = 0;} else { $diff = round( ((100 * $char_local) / $char_remote), 2); }
            
            pintar_resultados($url, $httpCode, $lineas_get, $lineas_set, $diff);
    
    } else { 
            $lineas_set = '0'; 
            $lineas_get = '0';
            $httpCode   = '0';
            $diff       = '0';
            $activo     = '0';   
    }   
}

echo '     
          </table>
        </center>
      <br>
       
      <div class="container">
      <div class="content"><a href="'.$basepath.'" class="btn btn-info">VOLVER AL INICIO</a></div>
      </div>
      <br><center>[ secify.es area de sistemas ]</center>
     ';

require($_SERVER['DOCUMENT_ROOT'].'/web-checker/core/footer.php');
