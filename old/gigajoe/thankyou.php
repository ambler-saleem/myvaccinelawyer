<?php
$name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$state = $_POST['state'];
$vaccine = $_POST['vaccine'];
$date = $_POST['date'];
$comments = $_POST['comments'];
$agree = $_POST['agree'];
 

$email_message = "

Name:".$name."
Email: ".$email."
Phone: ".$phone."
City: ".$city."
State: ".$state."
Vaccine: ".$vaccine."
Date: ".$date."
Comments: ".$comments."
Agree: ".$agree."
";



mail ("mmuller@mullerbrazil.com", "New Inquiry from myvaccinelawyer.com", $email_message);
header("location:email_success.php");


?>