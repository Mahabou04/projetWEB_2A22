<?php
	include '../Controller/destinationC.php';
	$destinationC=new destinationC();
	$destinationC->supprimerdestination($_GET["id"]);
	header('Location:afficherdestination.php');
?>