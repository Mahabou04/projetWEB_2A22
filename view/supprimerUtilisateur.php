<?php
	include '../Controller/ComptesC.php';
	$ComptesC=new ComptesC();
	$ComptesC->supprimeUtilisateur($_GET["id"]);
	header('Location:afficherListeUtilisateurs.php');
?>