<?php
	class Destination{
		private $nom=null;
		private $prenom=null;
		private $nom_hotel=null;
		private $prix=null;
		private $place=null ;
		
		function __construct( $nom, $prenom,$prix,$nom_hotel, $place){		
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->prix=$prix;
			$this->nom_hotel=$nom_hotel;
			$this->place=$place;
		
			
		}
		
		function getnom(){
			return $this->nom;
		}
		function getprenom(){
			return $this->prenom;
		}
		function getprix(){
			return $this->prix;
		}
		function getnom_hotel(){
			return $this->nom_hotel;
		}function getplace(){
			return $this->place;
		}
		
		function setnom(string $nom){
			$this->nom=$nom;
		}
		function setprenom(string $prenom){
			$this->prenom=$prenom;
		}
		
		
	}


?>