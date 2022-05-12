<?php
	include '../controller/HotelC.php';
	$HotelC=new HotelC ();
	$HotelC->supprimerhotel($_GET["id"]);
	header('Location:afficherHotel.php');
?>