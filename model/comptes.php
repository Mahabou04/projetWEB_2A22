<?php
class Comptes{
private $id=null;
private $nom=null;
private $prenom=null;
private $datenai=null;
private $email=null;
private $password=null;
private $types=null;
private $key=null;
function __construct( $nom, $prenom, $datenai, $email, $password, $types ){
    $this->nom=$nom;
    $this->prenom=$prenom;
    $this->datenai=$datenai;
    $this->email=$email;
    $this->password=$password;
    $this->types=$types;
   

}
function getId(){
    return $this->id;
}
function getNom(){
    return $this->nom;
}
function getPrenom(){
    return $this->prenom;
}
function getDatenai(){
    return $this->datenai;
}
function getEmail(){
    return $this->email;
}
function getPassword(){
    return $this->password;
}
function getTypes(){
    return $this->types;
}
function getKey(){
    return $this->key;
}
function setKey(string $key){
    $this->key=$key;
}
function setNom(string $nom){
    $this->nom=$nom;
}
function setPrenom(string $prenom){
    $this->prenpm=$prenom;
}
function setDatenai(string $Datenai){
    $this->Datenai=$Datenai;
}
function setEmail(string $email){
    $this->email=$email;
}
function setPassword(string $password){
    $this->password=$password;
}
function setTypes(string $types){
    $this->types=$types;
}
}


?>