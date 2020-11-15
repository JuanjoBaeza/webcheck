<?php

require($_SERVER['DOCUMENT_ROOT'].'/web-checker/config/global.php');
require($_SERVER['DOCUMENT_ROOT'].'/web-checker/class/download.php');
require($_SERVER['DOCUMENT_ROOT'].'/web-checker/sys/notificar.php');

$notifica = new Notificar();

$r = new HTTPRequest($basepath.'/informe.php');
$fichero = 'report.html';

file_put_contents($fichero, $r->DownloadToString());

$notifica->enviar_correo();

header('Location:'.$basepath.'/index.html');