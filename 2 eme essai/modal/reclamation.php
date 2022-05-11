<?php
	class reclamation{
		private $contact=null;
		private $type=null;
		private $destinataire=null;
		private $statut=null;
		private $description=null;
		
		
		
		function __construct($contact, $type, $destinataire, $statut, $description){
			$this->contact=$contact;
			$this->type=$type;
			$this->destinataire=$destinataire;
			$this->statut=$statut;
			$this->description=$description;
			
		}
		function getcontact(){
			return $this->contact;
		}
		function gettype(){
			return $this->type;
		}
		function getdestinataire(){
			return $this->destinataire;
		}
		function getstatut(){
			return $this->statut;
		}
		function getdescription(){
			return $this->description;
		}
	}	

?>