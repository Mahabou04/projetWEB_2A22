<?php
	class Reservation{
		
		private $id_user=null;
		private $id_destination=null;
		private $nbr=null;
		private $date;
		
		private $password=null;
		function __construct( $id_user, $id_destination, $nbr, $date){
			
			$this->id_user=$id_user;
			$this->id_destination=$id_destination;
			$this->nbr=$nbr;
			$this->date=$date;
		}
	
		function getid_user(){
			return $this->id_user;
		}
		function getid_destination(){
			return $this->id_destination;
		}
		function getnbr(){
			return $this->nbr;
		}
		function getdate(){
			return $this->date;
		}
		function setid_user(string $id_user){
			$this->id_user=$id_user;
		}
		function setid_destination(string $id_destination){
			$this->id_destination=$id_destination;
		}
		function setnbr(string $nbr){
			$this->nbr=$nbr;
		}
		function setdate(string $date){
			$this->date=$date;
		}
		
	}


?>