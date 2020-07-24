<?php
// Pick up the form data and assign it to variables
$name     = $_POST['name'];
$tel      = $_POST['tel'];
$email    = $_POST['email'];
$address  = $_POST['address'];

// Build the email (replace the address in the $to section with your own)
$to      = 'info@taxbr.com';
$subject = "TAX REFUND : " . $name;
$headers = "From: $email";
$message = "$name escreveu: ";

$message .="NAME    : " . $name    . "\r\n\r\n"; 
$message .="TEL     : " . $tel     . "\r\n\r\n"; 
$message .="EMAIL   : " . $email   . "\r\n\r\n"; 
$message .="ADDRESS : " . $address . "\r\n\r\n"; 
// 


// Send the mail using PHPs mail() function
mail($to, $subject, $message, $headers);

// Redirect
header("Location: http://www.taxbr.com/index.php"); ?>