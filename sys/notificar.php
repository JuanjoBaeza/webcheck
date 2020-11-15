<?php
class Notificar {
    
    function enviar_correo(){

    // header("Location: https://smsc.i-digital-m.com/smsgw/sendsms.php?user=IBYwebHQ1&password=SPoRiITj&sender=infoSMS&recipients=34609409407&message=$pila");

    $to = "info@informaticabyte.es";
    $subject  = "Reporte status websites clientes" ;
    $header = "From: noreply@informaticabyte.es\r\n"; 
    $header.= "MIME-Version: 1.0\r\n"; 
    $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
    $message = file_get_contents('report.html');

    mail($to,$subject,$message,$header);
    }
}
