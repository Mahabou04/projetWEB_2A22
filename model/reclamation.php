<?php
	class Reclamation{
	
		private $email=null;
		private $sujet=null;
		private $message=null;
        

        
		
		function __construct( $sujet,$email, $message){		
			
			$this->sujet=$sujet;
			$this->email=$email;
			$this->message=$message;
		
			
		}
		
		function getnom(){
			return $this->nom;
		}
		function getprenom(){
			return $this->prenom;
		}
		function getsujet(){
			return $this->sujet;
		}
		function getemail(){
			return $this->email;
		}function getmessage(){
			return $this->message;
		}
		
		function setnom(string $nom){
			$this->nom=$nom;
		}
		function setprenom(string $prenom){
			$this->prenom=$prenom;
		}
		
		
	}


?>