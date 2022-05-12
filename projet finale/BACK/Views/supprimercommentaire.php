<?php
	include '../Controller/commentaireC.php';
	$commentaireC=new commentaireC();
	$commentaireC->supprimercommentaire($_GET["id_commentaire"]);
	header('Location:afficherListearticle.php');
?>