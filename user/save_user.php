<?php
require('sql_connection.php');
require('../AfricasTalkingGateway.php');

$pName = $_POST['person_name'];

$pNumber = $_POST['phone_number'];

$emailAddress = $_POST['email_address'];

$district = $_POST['district_id'];

$user_password = md5($_POST['user_password']);

$confirm_user_password = md5($_POST['confirm_user_password']);

if($user_password != $confirm_user_password) {

	echo "Passwords did not match";

	exit();
	
}

$sql_connection->query("INSERT INTO users(NAME,DISTRICT_ID,PHONE_NUMBER,PASSWORD,EMAIL_ADDRESS)VALUES('$pName','$district','$pNumber','$user_password','$emailAddress')");

$message = "Hello ".$pName.", Thank you for creating an account with Climate change Uganda. You will login with your email and your password, Our team leader will contact you shortly for more information" ; 

$gateway    = new AfricasTalkingGateway("sandbox", "1627d8cc7a3cb7e6e439f5c03dc7e8928d4d66a5f8dfa9a7958b348e88f858a8","sandbox");

$gateway->sendMessage("+256786964345", $message); 

header("Location:list_of_users.php");