<?php
	include '../config.php';
	include_once '../model/reservation.php';
	class reservationC {
		function statistiquereservations(){
			$sql="SELECT arrive,sum(prix) as prix FROM destination d INNER JOIN reservation r ON d.id = r.id_destination GROUP BY id_destination;";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function Userreservation($id){
			$sql="SELECT * FROM Destination d INNER JOIN reservation r ON d.id = r.id_destination where r.id_user=$id;";

			$db = config::getConnexion();
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){	
				die('Erreur:'. $e->getMeesage());
			}
				
			}
		function afficherreservations(){
			$sql="SELECT * FROM reservation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerreservation($Idreservation){
			$sql="DELETE FROM reservation WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $Idreservation);
			try{
				
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterreservation($reservation){
			$sqlcheck="SELECT place from destination where id=:id_destination and place>=:nbr";
			$sql="INSERT INTO reservation ( id_user, id_destination, nbr, date)
			VALUES (:id_user,:id_destination,:nbr, :dates )";
			$sqlupdate="UPDATE  destination SET place=place-:nbr where id=:id_destination and place>=:nbr";
			$db = config::getConnexion();
			try{
				$querycheck = $db->prepare($sqlupdate);
				$querycheck->execute([
					'id_destination' => $reservation->getid_destination(),
					'nbr' => $reservation->getnbr()
				]);	
				$count=$querycheck->rowCount();
					if($count>0){
						$query = $db->prepare($sql);
						$queryupdate = $db->prepare($sqlupdate);
						$query->execute([
							'id_user' => $reservation->getid_user(),
							'id_destination' => $reservation->getid_destination(),
							'nbr' => $reservation->getnbr(),
							'dates' => $reservation->getdate()
						]);	
						$queryupdate->execute([
							'id_destination' => $reservation->getid_destination(),
							'nbr' => $reservation->getnbr()
						]);	
					}
				
			
						
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererAvecDateOuTemps($value,$type){
			if($type=='temps'){
				$sql="SELECT * FROM reservation WHERE TIME(date)='$value'";;
			}else{
				$sql="SELECT * FROM reservation WHERE DATE(date)='$value'";
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

		function filtrereservation($value,$type){
			if($type=='date'){$value="'$value'";}
			$sql="SELECT * from reservation where $type=$value";
			$db = config::getConnexion();
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){	
				die('Erreur:'. $e->getMeesage());
			}
				
			}
		function recupererreservation($value,$type){
			$sql="SELECT * from reservation where $type=$value";
			$db = config::getConnexion();
			try{
				
				$query=$db->prepare($sql);
				$query->execute();

				$reservation=$query->fetch();
				return $reservation;
				
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreservation($reservation, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reservation SET 
						id_user= :id_user, 
						id_destination= :id_destination, 
						nbr= :nbr, 
						date = :dates
					WHERE id= :id'
				);
				$query->execute([
					'id' => $id,
					'id_destination' => $reservation->getid_destination(),
					'nbr' => $reservation->getnbr(),
					'dates' => $reservation->getdate(),
					'id_user' => $reservation->getid_user()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>