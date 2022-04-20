<?php
	class User{
		
		private $nom=null;
		private $prenom=null;
		private $dateN=null;
		private $email=null;
		private $password=null;
		function __construct($nom, $prenom, $dateN, $email,$password){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->dateN=$dateN;
			$this->email=$email;
            $this->password=$password;
		}
	
		
		function getnom(){
			return $this->nom;
		}
		function getprenom(){
			return $this->prenom;
		}
		function getdateN(){
			return $this->dateN;
		}
		function getemail(){
			return $this->email;
		}
        function getpassword(){
			return $this->password;
		}
		
		function setnom(string $nom){
			$this->nom=$nom;
		}
		function setprenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setdateN(string $dateN){
			$this->dateN=$dateN;
		}
		function setemail(string $email){
			$this->email=$email;
		}
		
	}


?>