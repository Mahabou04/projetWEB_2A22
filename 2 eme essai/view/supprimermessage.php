<?php
	include '../controller/messageC.php';
	$messageC=new messageC();
	$messageC->supprimermessage($_GET["id"]);
	header('Location:affichermessage.php');
?>