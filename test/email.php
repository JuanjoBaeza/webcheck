<?php

$to_email = "info@informaticabyte.es";
$subject  = "Simple Email Test via PHP";
$body     = "Hi, this is test email send by PHP Script";
$headers  = "From: info@informaticabyte.es";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

