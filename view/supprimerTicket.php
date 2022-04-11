<?php
	include '../Controller/ticketC.php';
	$ticketC=new ticketC();
	$ticketC->supprimerticket($_GET["id"]);
	header('Location:afficherticket.php');
?>