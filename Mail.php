


<?php
$to = "csgsajeewa@yahoo.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "csgsajeewa@gmail.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>