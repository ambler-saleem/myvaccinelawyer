<?php if(!empty($_POST['my_url'])){ die('Have a nice day elsewhere.'); } ?>

<?php

$name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$zip = $_POST['zip'];
$vaccine = $_POST['vaccine'];
$date = $_POST['date'];
$comments = $_POST['comments'];
$agree = $_POST['agree'];



$email_message = "

Name:".$name."
Email: ".$email."
Phone: ".$phone."
Zip: ".$zip."
Vaccine: ".$vaccine."
Date: ".$date."
Comments: ".$comments."
Agree: ".$agree."
";



mail ("denise.bogan@gmail.com", "New Inquiry from myvaccinelawyer.com", $email_message);
header("location:email_success.php");



/* Functions we used */
if($_POST['zip']){
   $test = strlen(trim(preg_replace("/[^[:digit:]]/", '', $_POST['zip'])));
   if($test < 5){
      $errors['zip'] = 'Please enter a valid zip code';
   }
}
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<?php
$http_counter = 0;
foreach($_POST as $key => $val){
   if(stristr($val, 'http://')){ $http_counter++; }
   if(stristr($val, '[url=')){ $http_counter++; }
}
// Legitimate users might enter zero URL in their message.
if($http_counter > 0){ die('Have a nice day elsewhere.'); }
?>
<html>
<body>

<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>
<p>Hit the back button and try again</p>

</body>
</html>
<?php
exit();
}
?>

