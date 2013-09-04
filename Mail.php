


<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/PHPMailer/class.phpmailer.php');

$mail = new PHPMailer(true);


if(true){
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 587; // set the SMTP port for the GMAIL server
    $mail->Username = "csgsajeewa@gmail.com"; // GMAIL username
    $mail->Password = "chamath@123"; // GMAIL password
}

//Typical mail data
$mail->AddAddress("csgsajeewa@yahoo.com", "chamath");
$mail->SetFrom("csgsajeewa@gmail.com", "chamath");
$mail->Subject = "My Subject";
$mail->Body = "Mail contents";

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message has been sent";
}


?>