<?php
//Your PHP (Modified)
$EmailFrom = trim(stripslashes($_POST['Email'])); ;
$EmailTo = "denise.bogan@gmail.com";
$Subject = "Incoming Inquiry from myvaccinelawyer.com";
$FirstName = trim(stripslashes($_POST['FirstName'])); 
$State = trim(stripslashes($_POST['State'])); 
$Email = trim(stripslashes($_POST['Email'])); 
$Message = trim(stripslashes($_POST['Message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Full Name: ";
$Body .= $FirstName;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "State: ";
$Body .= $State;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 


// redirect to success page 
if (mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>")){
  print "http://www.titanvex.com/contact/sent\">";
}
else{
  print "";
}
?>