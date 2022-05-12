<?php
	include '../controller/chambreC.php';
	$chambreC=new chambreC ();
    $chambre = $chambreC->recupererchambre($_GET['id']);
	$chambreC->supprimerchambre($_GET["id"]);
	header('Location:afficherchambrehotel.php?idh='.$chambre['id_hotel']);
?>