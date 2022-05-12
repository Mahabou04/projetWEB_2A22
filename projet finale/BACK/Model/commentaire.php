<?php
	class Commentaire{
		private $id_commentaire=null;
		private $id_article=null;
		private $nom=null;
		private $email=null;
		private $comments=null;
		private $date;
		
		
		function __construct($id_commentaire, $id_article, $nom, $email, $comments, $date){
			$this->id_commentaire=$id_commentaire;
			$this->id_article=$id_article;
			$this->nom=$nom;
			$this->email=$email;
			$this->comments=$comments;
			$this->date=$date;
		}
		function getid_commentaire(){
			return $this->id_commentaire;
		}
		function getid_article(){
			return $this->id_article;
		}
		function getnom(){
			return $this->nom;
		}
		function getemail(){
			return $this->email;
		}
		function getcomments(){
			return $this->comments;
		}
		function getdate(){
			return $this->date;
		}
		function setid_article(string $id_article){
			$this->id_article=$id_article;
		}
		function setnom(string $nom){
			$this->nom=$nom;
		}
		function setemail(string $email){
			$this->email=$email;
		}
		function setcomments(string $comments){
			$this->comments=$comments;
		}
		function setdate(string $date){
			$this->date=$date;
		}
		
	}


?>