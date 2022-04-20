<?php
	class Reservation{
		
		private $id_user=null;
		private $nom_hotel=null;
		private $duree=null;
		private $nbr=null;
		private $date;
		
		private $password=null;
		function __construct( $id_user, $nom_hotel, $duree, $nbr, $date){
			
			$this->id_user=$id_user;
			$this->nom_hotel=$nom_hotel;
			$this->duree=$duree;
			$this->nbr=$nbr;
			$this->date=$date;
		}
	
		function getid_user(){
			return $this->id_user;
		}
		function getnom_hotel(){
			return $this->nom_hotel;
		}
		function getduree(){
			return $this->duree;
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
		function setnom_hotel(string $nom_hotel){
			$this->nom_hotel=$nom_hotel;
		}
		function setduree(string $duree){
			$this->duree=$duree;
		}
		function setnbr(string $nbr){
			$this->nbr=$nbr;
		}
		function setdate(string $date){
			$this->date=$date;
		}
		
	}


?>