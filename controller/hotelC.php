<?php

	include_once '../config.php';
	include_once '../model/hotel.php';

class HotelC {

    
	function afficherhotel(){
		$sql="SELECT * FROM hotel";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:'. $e->getmessage());
		}
	}

	function ajouterhotel($hotel){

		$sql="INSERT INTO hotel (nom, pays,etoile) 
			VALUES (:nom,:pays,:etoile)";
			$db = config::getConnexion();
			try{
				
				$query = $db->prepare($sql);
				
				$query->execute([
					'nom' => $hotel->getnom(),
					'pays' => $hotel->getpays(),
					'etoile' => $hotel->getetoile(),
					
				]);	
				//header('Location: afficherhotel.php');
				
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		
	}

	function modifierhotel($hotel,$id){
		$db = config::getConnexion();
		$query = $db->prepare('UPDATE hotel SET nom = :nom, pays = :pays, etoile = :etoile WHERE id= :id');
		try{

	$query->execute([
		'nom'=> $hotel->getnom(),
		'pays'=> $hotel->getpays(),
		'etoile'=> $hotel->getetoile(),
		'id'=> $id
	]);
		} catch (Exception $e){
			$e->getMessage();
	}

		
	}

	function supprimerhotel($id){
        $sqlcheck="DELETE FROM chambre WHERE id_hotel=:id";
		$sql="DELETE FROM hotel WHERE id=:id";
		$db = config::getConnexion();
		$reqcheck=$db->prepare($sqlcheck);
        $req=$db->prepare($sql);
        $reqcheck->bindValue(':id', $id);
		$req->bindValue(':id', $id);
		try{
            $reqcheck->execute();
			$req->execute();
			
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMessage());
		}
	
	}

	function recupererhotel($id){

		$sql="SELECT * from hotel where id=$id";
		$db = config::getConnexion();
		try{
			$query=$db->prepare($sql);
			$query->execute();

			$hotel=$query->fetch();
			return $hotel;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}


    
    function triHotel(){
		$sql="SELECT * FROM hotel order by nom";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:' . $e->getMessage());
		}
	}
	function searchHotel($string,$type){
        if($type!='id' && $type!='etoile'){$string="'$string'";}
		$sql="SELECT * FROM hotel WHERE $type = $string";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:' . $e->getMessage());
		}
	}
	function countEtoile($int){

		$sql="SELECT count(id) FROM rate WHERE etoile=$int " ;
		$db = config::getConnexion();
		try{
			$query = $db->query($sql);
			$query->execute();
			   $prog_number =$query->fetchColumn();
			return $prog_number;
		}
		catch(Exception $e){
			die('Erreur: '.$e->getMessage());
		}   
	}
}
    