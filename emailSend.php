<?php
session_start();

///////////////////////////////////////////////////////////////////////
// Complete the rest of this file.
// 1) Set the properties using the data submitted from the form.
// 2) After all of the properties have been set, Send the mail message.
// 3) Finally, redirect to the next page
///////////////////////////////////////////////////////////////////////

$_SESSION["errorMessage"] = "";
$error = false;



// Checking For Blank Fields..

if(!empty($_POST["ToField"])||!empty($_POST["FromField"])||!empty($_POST["Subject"])||!empty($_POST["Body"])){

  // Check if the "Sender's Email" input field is filled out
$toField=$_POST['ToField'];
// Sanitize E-mail Address
$toField =filter_var($toField, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$toField= filter_var($toField, FILTER_VALIDATE_EMAIL);
  
  
// Check if the "Sender's Email" input field is filled out
$fromField=$_POST['FromField'];
// Sanitize E-mail Address
$fromField =filter_var($fromField, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$fromField= filter_var($fromField, FILTER_VALIDATE_EMAIL);
  
  
$subject = $_POST['Subject'];
$body = $_POST['Body'];
} else {
  
  $error = true;
}



//Redirect based on whether there was an error

  
  if($error) {
  $_SESSION["errorMessage"] = "There was an error sending your email";
  header("Location: email.php");
  exit;
} else {
  $headers = "From: ".$fromField;
  
  mail ($toField, $subject, $body, $headers);
  header ("Location: emailConfirm.php");
  exit;
}




?>
