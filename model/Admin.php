<?php
class Admin{
private $cinA=null;
private $nomA=null;
private $prenomA=null;
private $dateA=null;
private $emailA=null;
private $passwordA=null;

function __construct( $cinA, $nomA, $prenomA, $dateA, $emailA, $passwordA){
    $this->cinA=$cinA;
    $this->nomA=$nomA;
    $this->prenomA=$prenomA;
    $this->dateA=$dateA;
    $this->emailA=$emailA;
    $this->passwordA=$passwordA;
}
function getCinA(){
    return $this->cinA;
}
function getNomA(){
    return $this->nomA;
}
function getPrenomA(){
    return $this->prenomA;
}
function getDateA(){
    return $this->dateA;
}
function getEmailA(){
    return $this->emailA;
}
function getPasswordA(){
    return $this->passwordA;
}
function setNomA(string $nomA){
    $this->nom=$nomA;
}
function setPrenomA(string $prenomA){
    $this->prenom=$prenomA;
}
function setDateA(string $DateA){
    $this->DateA=$DateA;
}
function setEmailA(string $emailA){
    $this->email=$emailA;
}
function setPasswordA(string $passwordA){
    $this->password=$passwordA;
}

}


?>