<?php
	include '../config.php';
	include_once '../model/destination.php';
	class destinationC {
		function afficherdestinations(){
			$sql="SELECT * FROM destination";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerdestination($Iddestination){
			$sqlcheck="DELETE FROM reservation WHERE id_destination=:id";
			$sql="DELETE FROM destination WHERE id=:id";
			$db = config::getConnexion();
			$reqcheck=$db->prepare($sqlcheck);
			$req=$db->prepare($sql);
			$reqcheck->bindValue(':id', $Iddestination);
			$req->bindValue(':id', $Iddestination);
			try{
				$reqcheck->execute();
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterdestination($destination){
			
			$sql="INSERT INTO destination (arrive, date_limite,prix,nom_hotel,place)
			VALUES (:arrive, :date_limite,:prix,:nom_hotel, :place)";
			$db = config::getConnexion();
			try{
				$query1 = $db->prepare($sql);
				$query1->execute([
					'arrive' => $destination->getarrive(),
					'prix' => $destination->getprix(),
					'date_limite' => $destination->getdate_limite(),
					'nom_hotel' => $destination->getnom_hotel(),
					'place' => $destination->getplace()

				]);	
				
			}
		
			catch (Exception $e){
				echo 'Erreur: '.$e->getMeessage();
			}			
		}
		function filtredestination($value,$type){
			$sql="SELECT * from destination where $type='$value'";
			$db = config::getConnexion();
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){	
				die('Erreur:'. $e->getMeesage());
			}
				
			}
			
			function afficherdestinationsUser($iduser,$post){
				$currentDateTime = date('Y-m-d ');
				$sql="SELECT * from destination d where $iduser NOT IN (select id_user from reservation r where r.id_destination=d.id) and '$currentDateTime'<=d.date_limite and place>0";
				foreach($post as  $key => $val){
					if(isset($val)){
					if(!empty($val)){
						if($key == "date_limite"){
							$sql.=" and $key<='$val'";
						}
						else{
						$sql.=" and $key = '$val'";
						}
					}
				}
			}
				
				$db = config::getConnexion();
				try{
					$liste = $db->query($sql);
					return $liste;
				}
				catch (Exception $e){
					die('Erreur: '.$e->getMessage());
				}
			}
		function recupererdestination($Iddestination,$type){
			$sql="SELECT * from destination where $type=$Iddestination";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$destination=$query->fetch();
				return $destination;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierdestination($destination, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE destination SET 
						 arrive=:arrive,
						 date_limite=:date_limite,
						 prix=:prix,
						 nom_hotel=:nom_hotel,
						 place=:place
						
					WHERE id= :id'
				);
				$query->execute([
					'arrive' => $destination->getarrive(),
					'prix' => $destination->getprix(),
					'date_limite' => $destination->getdate_limite(),
					'nom_hotel' => $destination->getnom_hotel(),
					'place' => $destination->getplace(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>