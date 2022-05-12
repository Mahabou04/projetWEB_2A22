<?php
class Chambre
{
   
    private $type;
    private $prix;
    private $nbr;
    private $id_hotel;
   
 
   
       
   
        function __construct(  $type,$prix,$nbr,$id_hotel){
     
        $this->prix=$prix;
        $this->type=$type;
        
        $this->nbr=$nbr;
        $this->id_hotel=$id_hotel;
        }
     
   
           
    
 
   
 
    function gettype(){
        return $this->type;
    }
   
    function getprix(){
        return $this->prix;
    }
    function getnbr(){
        return $this->nbr;
    }
    function getid_hotel(){
        return $this->id_hotel;
    }
 
   
 
    function settype(string $type){
        $this->type=$type;
    }
 
    function setprix(string $prix){
        $this->prix=$prix;
    }
 
    function setnbr(string $nbr){
        $this->nbr=$nbr;
    }
    function setid_hotel(string $id_hotel){
        $this->id_hotel=$id_hotel;
    }
 
 

}
?>