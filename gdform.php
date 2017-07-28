<?php
$email = "ryan@mullerbrazil.com";	//who does this mail get sent from (must be in the same domain as this site)
$recipient = "ryan@mullerbrazil.com"; 	//who does this mail get sent to?
$body = $_POST['comments']; 	//contents of the message
$subject = "Subject line"; 		//subject line
$headers = "From: ". $email . "\r\n";

if (!mail ($recipient, $subject, $body, $headers))
	echo "Couldn't send mail";
?>