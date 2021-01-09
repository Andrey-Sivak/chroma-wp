<?php

$mail = trim($_POST['mail']);
$site_name = "Chroma Dental";
$headers = "From: www-data@chromadental.ca" . "\r\n";

$name = trim($_POST['name']);
$age = trim($_POST['age']);
$problem = trim($_POST['problem']);
$first_name = trim($_POST['first-name']);
$last_name = trim($_POST['last-name']);
$phone = trim($_POST['phone']);
$page = trim($_POST['page']);
$mess = trim($_POST['message']);
$email = trim($_POST['email']);
if( $problem ) {
	$message = "Name: $first_name $last_name \nPhone: $phone \nProblem: $problem \nAge: $age \nFrom page: $page";
} elseif ( $email ) {
	$message = "Name: $name \nPhone: $phone \nEmail: $email \nMessage: $mess \nFrom page: $page";
} else {
	$message = "Name: $first_name $last_name \nPhone: $phone \nFrom page: $page";
}

$page_title = "Новая заявка с сайта \"$site_name\"";
mail($mail, $page_title, $message, $headers);