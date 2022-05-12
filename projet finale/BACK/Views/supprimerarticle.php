<?php
	include '../Controller/ArticleC.php';
	
	$articleC=new ArticleC();
	$articleC->supprimercommentairepararticle($_GET["id_article"]);

	$articleC->supprimerarticle($_GET["id_article"]);
	header('Location:afficherListearticle.php');
?>