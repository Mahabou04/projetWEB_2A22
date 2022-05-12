<?php
	class Article{
		private $id_article=null;
		private $titre=null;
		private $contenu=null;
		private $image=null;
		
		
		
		
		function __construct($id_article, $titre, $contenu, $image){
			$this->id_article=$id_article;
			$this->titre=$titre;
			$this->contenu=$contenu;
			$this->image=$image;
			
		}
		function getid_article(){
			return $this->id_article;
		}
		function gettitre(){
			return $this->titre;
		}
		function getcontenu(){
			return $this->contenu;
		}
		function getimage(){
			return $this->image;
		}
		
		
		function setid_article(string $id_article){
			$this->id_article=$id_article;
		}
		function settitre(string $titre){
			$this->titre=$titre;
		}
		function setcontenu(string $contenu){
			$this->contenu=$contenu;
		}
		function setimage(string $image){
			$this->image=$image;
		}
		
		
	}


?>