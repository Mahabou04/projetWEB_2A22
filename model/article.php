<?php
	class Article{
		private $image=null;
		private $texte=null;
		
		
		
		
		
		function __construct($image, $texte){
			$this->image=$image;
			$this->texte=$texte;
			
			
		}
		function getimage(){
			return $this->image;
		}
		function gettexte(){
			return $this->texte;
		}
		
		
		
		function setimage(string $image){
			$this->image=$image;
		}
		function settexte(string $texte){
			$this->texte=$texte;
		}
		
		
	}


?>