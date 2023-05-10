<?php
function sendEmail($recipient, $subject, $message)
{
   $headers = "From: your-email@example.com" . "\r\n";
   $headers .= "Reply-To: your-email@example.com" . "\r\n";
   $headers .= "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

   mail($recipient, $subject, $message, $headers);
}
?>