<?php
	class Commentaire{
		
		private $id_article=null;
		private $email=null;
		private $texte=null;
	
		
		
		function __construct( $id_article, $email, $texte){
			$this->id_article=$id_article;
			$this->email=$email;
			$this->texte=$texte;
		}
		function getid_article(){
			return $this->id_article;
		}
		function getemail(){
			return $this->email;
		}
		function gettexte(){
			return $this->texte;
		}
		
		function setid_article(string $id_article){
			$this->id_article=$id_article;
		}
		function setemail(string $email){
			$this->email=$email;
		}
		function settexte(string $texte){
			$this->texte=$texte;
		}
	
		
	}


?>