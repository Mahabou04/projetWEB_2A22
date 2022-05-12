<?php

	include_once '../config.php';
	include_once '../model/chambre.php';

class chambreC {

    
	function afficherchambre(){
		$sql="SELECT * FROM chambre";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:'. $e->getmessage());
		}
	}

	function ajouterchambre($chambre){

		$sql="INSERT INTO chambre (type, id_hotel,nbr,prix) 
			VALUES (:type,:id_hotel,:nbr,:prix)";
			$db = config::getConnexion();
			try{
				
				$query = $db->prepare($sql);
				
				$query->execute([
					'type' => $chambre->gettype(),
					'id_hotel' => $chambre->getid_hotel(),
					'nbr' => $chambre->getnbr(),
					'prix' => $chambre->getprix()
				]);	
				//header('Location: afficherchambre.php');
				
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		
	}

	function modifierchambre($chambre,$id){
		$db = config::getConnexion();
		$query = $db->prepare('UPDATE chambre SET type = :type, prix=:prix,id_hotel = :id_hotel, nbr = :nbr WHERE id= :id');
		try{

	$query->execute([
		'type'=> $chambre->gettype(),
		'id_hotel'=> $chambre->getid_hotel(),
		'nbr'=> $chambre->getnbr(),
        'prix' => $chambre->getprix(),
		'id'=> $id
	]);
		} catch (Exception $e){
			$e->getMessage();
	}

		
	}

	function supprimerchambre($id){

		$sql="DELETE FROM chambre WHERE id=:id";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':id', $id);
		try{
			$req->execute();
			
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMessage());
		}
	
	}

	function recupererchambre($id){

		$sql="SELECT * from chambre where id=$id";
		$db = config::getConnexion();
		try{
			$query=$db->prepare($sql);
			$query->execute();

			$chambre=$query->fetch();
			return $chambre;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}


    
    function trichambre(){
		$sql="SELECT * FROM chambre order by type";
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:' . $e->getMessage());
		}
	}
	function searchchambre($string,$type,$optional){
        if($type=='type'){$string="'$string'";}
		$sql="SELECT * FROM chambre WHERE $type = $string";
        if(!empty($optional)){
            $sql.=" and id_hotel=".$optional.";";
        }
		$db = config::getConnexion();
		try{
			$liste = $db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die('Erreur:' . $e->getMessage());
		}
	}
	function countnbr($int){

		$sql="SELECT count(id) FROM rate WHERE nbr=$int " ;
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
    