<?php
	include '../controller/reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimerreclamation($_GET["id"]);
	header('Location:afficherreclamation.php');
?>