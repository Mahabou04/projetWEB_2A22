<?php
	class Ticket{
		private $id_reservation=null;
		private $prix=null;
		
		
		function __construct( $id_reservation, $prix){		
			$this->id_reservation=$id_reservation;
			$this->prix=$prix;
			
		}
		
		function getid_reservation(){
			return $this->id_reservation;
		}
		function getprix(){
			return $this->prix;
		}
		
		function setid_reservation(string $id_reservation){
			$this->id_reservation=$id_reservation;
		}
		function setprix(string $prix){
			$this->prix=$prix;
		}
		
		
	}


?>