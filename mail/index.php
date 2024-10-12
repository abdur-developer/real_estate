<?php

$from_name = $_POST['name'];	
$from_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mass = "
	<h3>Name: $from_name </h3>
	<h5>Email: $from_email </h5>
	<p>$message </p>
";
require '../include/dbcon.php';
$sql = "INSERT INTO message (name, email, subject, message) 
VALUES ('$from_name', '$from_email', '$subject', '$message')";
mysqli_query($conn, $sql);

include('smtp/PHPMailerAutoload.php');

$receiverEmail="abdur09266@gmail.com";

smtp_mailer($receiverEmail,$subject,$mass);

function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "myearningbdd@gmail.com"; // Sender's Email
	$mail->Password = "zhhwhvqyddtedxow"; //Sender's Email App Password
	$mail->SetFrom("myearningbdd@gmail.com","Website"); // Sender's Email
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	$response = array();
	if($mail->Send()){
		$response = array(
			"status" => "success",
			"message" => "Your message has been sent successfully!"
		);
	}else{
		$response = array(
			"status" => "error",
			"message" => "Your message has failed to send!"
		);
	}
	$jsonResponse = json_encode($response);
	header('Content-Type: application/json');
	echo $jsonResponse;
}
?>