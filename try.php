<?php
// Output messages
$responses = [];
// Check if the form was submitted
if (isset($_POST['arrival'], $_POST['departure'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['adults'], $_POST['children'], $_POST['room_pref'])) {
// Assign POST variables
$arrival = htmlspecialchars($_POST['arrival'], ENT_QUOTES);
$departure = htmlspecialchars($_POST['departure'], ENT_QUOTES);
$first_name = htmlspecialchars($_POST['first_name'], ENT_QUOTES);
$last_name = htmlspecialchars($_POST['last_name'], ENT_QUOTES);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$phone = htmlspecialchars($_POST['phone'], ENT_QUOTES);
$adults = htmlspecialchars($_POST['adults'], ENT_QUOTES);
$children = htmlspecialchars($_POST['children'], ENT_QUOTES);
$room_pref = htmlspecialchars($_POST['room_pref'], ENT_QUOTES);
// Validate email adress
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$responses[] = 'Email is not valid!';
}
// First name must contain only alphabet characters.
if (!preg_match('/^[a-zA-Z]+$/', $first_name)) {
	$responses[] = 'First name must contain only characters!';
}
// Last name must contain only alphabet characters.
if (!preg_match('/^[a-zA-Z]+$/', $last_name)) {
	$responses[] = 'Last name must contain only characters!';
}
// If there are no errors
if (!$responses) {
	// Where to send the mail? It should be your email address
	$to      = 'reservations@yourwebsite.com';
	// Mail from
	$from    = 'noreply@yourwebsite.com';
	// Mail subject
	$subject = 'A guest has booked a reservation';
	// Mail headers
	$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'Return-Path: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
	// Capture the email template file as a string
	ob_start();
	include 'reg.php';
	$email_template = ob_get_clean();
	// Try to send the mail
	if (mail($to, $subject, $email_template, $headers)) {
		// Success
		$responses[] = 'Thank you for your reservation!';		
	} else {
		// Fail; problem with the mail server...
		$responses[] = 'Message could not be sent! Please check your mail server settings!';
	}
}
}
?>