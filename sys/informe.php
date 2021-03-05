<?php

require($_SERVER['DOCUMENT_ROOT'].'/config/global.php');
require($_SERVER['DOCUMENT_ROOT'].'/class/download.php');
require($_SERVER['DOCUMENT_ROOT'].'/sys/notificar.php');

$notifica = new Notificar();

$r    = new HTTPRequest("$basepath");
$file = 'report.html';

file_put_contents($file, $r->DownloadToString());

$notifica->enviar_correo();
