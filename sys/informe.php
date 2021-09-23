<?php

require($_SERVER['DOCUMENT_ROOT'].'/config/global.php');
require($_SERVER['DOCUMENT_ROOT'].'/class/download.php');
require($_SERVER['DOCUMENT_ROOT'].'/sys/notificar.php');

$notifica = new Notificar();

$file = 'report.html';
$reset = '';
file_put_contents($file, $reset);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $basepath."/verificar.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true); 
curl_setopt($ch, CURLOPT_NOBODY, true);

$result = curl_exec($ch);
curl_close($ch);

file_put_contents($file, $result);

$notifica->enviar_correo($correo);
