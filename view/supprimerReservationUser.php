<?php
session_start();
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	$reservationC->supprimerreservation($_GET["id"]);
	$session=gzinflate($_SESSION['key']);
	$res=json_decode($session,true);
	$to      = $res['email'];
$subject = 'reservation';
$message = 'la suppression de votre reservation est reussite';
$headers = array(
'From' => 'mohamedaziz.jellazi@esprit.com',
'Reply-To' => 'mohamedaziz.jellazi@esprit.com',
'X-Mailer' => 'PHP/' . phpversion()
);
mail($to, $subject, $message, $headers);
	header('Location:profilUser.php');
?>