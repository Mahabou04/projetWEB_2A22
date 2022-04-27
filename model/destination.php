<?php
	class Destination{
		private $arrive=null;
		private $date_limite=null;
		private $nom_hotel=null;
		private $prix=null;
		private $place=null ;
		
		function __construct( $arrive, $date_limite,$prix,$nom_hotel, $place){		
			$this->arrive=$arrive;
			$this->date_limite=$date_limite;
			$this->prix=$prix;
			$this->nom_hotel=$nom_hotel;
			$this->place=$place;
		
			
		}
		
		function getarrive(){
			return $this->arrive;
		}
		function getdate_limite(){
			return $this->date_limite;
		}
		function getprix(){
			return $this->prix;
		}
		function getnom_hotel(){
			return $this->nom_hotel;
		}function getplace(){
			return $this->place;
		}
		
		function setarrive(string $arrive){
			$this->arrive=$arrive;
		}
		function setdate_limite(string $date_limite){
			$this->date_limite=$date_limite;
		}
		
		
	}


?>