<?php
	class message{
		private $id_reclamation=null;
		private $text=null;
		
		
		function __construct( $id_reclamation,  $text){		
			$this->id_reclamation=$id_reclamation;
			$this-> text= $text;
			
		}
		
		function getid_reclamation(){
			return $this->id_reclamation;
		}
		function gettext(){
			return $this->text;
		}
		
		
		
		
	}


?>