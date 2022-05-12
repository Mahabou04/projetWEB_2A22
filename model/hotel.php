<?php
class Hotel
{
   
    private $pays;
    private $nom;
    private $etoile;
        function __construct(  $nom,$pays,$etoile){
     
     $this->nom=$nom;
     $this->pays=$pays;
     $this->etoile=$etoile;
    
  

        
 }

 
 function getnom(){
     return $this->nom;
 }

 function getpays(){
     return $this->pays;
 }

 function getetoile(){
     return $this->etoile;
 }



 function setnom(string $nom){
     $this->nom=$nom;
 }

 function setpays(string $pays){
     $this->pays=$pays;
 }

 function setetoile(string $etoile){
     $this->etoile=$etoile;
 }










}




?>
