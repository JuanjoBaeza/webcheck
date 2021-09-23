<?php

class Notificar {
    
    function enviar_correo($correo){

    $to      = $correo;
    $subject = "Reporte status websites clientes" ;
    $header  = "From: noreply@example.com\r\n"; 
    $header .= "MIME-Version: 1.0\r\n"; 
    $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
    $message = file_get_contents('report.html');

    mail($to, $subject, $message, $header);
    }
}
