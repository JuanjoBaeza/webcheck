<?php

$to_email = "youremail@yourserver.com";
$subject  = "Simple Email Test via PHP";
$body     = "Hi, this is test email send by PHP Script";
$headers  = "From: report@localhost";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

