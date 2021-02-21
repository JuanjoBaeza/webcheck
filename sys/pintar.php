<?php

function pintar_resultados($url, $httpCode, $lineas_online, $lineas_local, $activo, $diff ){
        
    if($httpCode == '301' || $httpCode == '302' || $httpCode == '200') {$bgcolor_http_status = "green";} else {$bgcolor_http_status = "red";}
    if($lineas_local  == $lineas_online){$bgcolor_lineas_online = "green";}
    if($lineas_local !== $lineas_online){$bgcolor_lineas_online = "red";}
    if($activo == 0) {$bgcolor_lineas_online = "white"; $bgcolor_http_status = "white";}
    
    echo '
            <tr>
                <td align="center"> '.$activo.' </td>
                <td> '.$url.' </td>
                <td align="center" style="background-color:'.$bgcolor_http_status.'; color:white;"> '.$httpCode.' </td>
                <td align="center"> '.$lineas_local.' </td>
                <td align="center" style="background-color:'.$bgcolor_lineas_online.';color:white;"> '.$lineas_online.' </td>
                <td align="center"> '.$diff.' </td>
            </tr>
         '; 
}
