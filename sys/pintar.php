<?php

function pintar_resultados($url, $httpCode, $lineas_get, $lineas_set, $diff){
    
    if($httpCode == '301' || $httpCode == '302' || $httpCode == '200') {$bgcolorh = "green";}
    if($lineas_set == $lineas_get){$bgcolorl = "green";} else {$bgcolorl = "red";}
    
    if($diff  <  103 && $diff > 100){$bgcolord = "yellow"; $colord = "black";} 
    if($diff  <  103 && $diff > 107) {$bgcolord = "orange"; $colord = "black";} 
    if($diff > 107) {$bgcolord = "red"; $colord = "white";}
    
    if($diff == 100){$bgcolord = "green"; $colord = "white";} 

    if($diff  >  97 && $diff < 100){$bgcolord = "yellow"; $colord = "black";} 
    if($diff  >  94 && $diff < 97) {$bgcolord = "orange"; $colord = "black";} 
    if($diff  < 94) {$bgcolord = "red"; $colord = "white";}
       
    echo '
            <tr>
                <td><a href="http://'.$url.'" target="_blank" style="text-decoration:none;">'.$url.'</td>
                <td align="center" style="background-color:'.$bgcolorh.';color:white;">'.$httpCode.'</td>
                <td align="center">'.$lineas_set.'</td>
                <td align="center" style="background-color:'.$bgcolorl.';color:white;">'.$lineas_get.'</td>
                <td align="center" style="background-color:'.$bgcolord.';color:'.$colord.';">'.$diff.'</td>
            </tr>
         '; 
}

