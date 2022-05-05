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
			$sqlcheck="UPDATE destination d SET place=place+(SELECT nbr FROM reservation r WHERE r.id=:id) WHERE d.id=(SELECT id_destination FROM reservation r WHERE r.id=:id)";
			$sql="DELETE FROM reservation WHERE id=:id";
			$db = config::getConnexion();
			$reqcheck=$db->prepare($sqlcheck);
			$req=$db->prepare($sql);
			$req->bindValue(':id', $Idreservation);
			$reqcheck->bindValue(':id', $Idreservation);
			try{
				$reqcheck->execute();
				$req->execute();
				
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterreservation($reservation){
			$sqlcheck="SELECT place from destination where id=:id_destination and place>=:nbr";
			$sql="INSERT INTO reservation ( id_user, id_destination, nbr, date,payement)
			VALUES (:id_user,:id_destination,:nbr, :dates,:payement )";
			$sqlupdate="UPDATE  destination SET place=place-:nbr where id=:id_destination and place>=:nbr";
			$db = config::getConnexion();
			try{
				$querycheck = $db->prepare($sqlcheck);
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
							'dates' => $reservation->getdate(),
							'payement' => "no"
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
		function ajouterreservationPay($reservation){
			$sqlcheck="SELECT place from destination where id=:id_destination and place>=:nbr";
			$sql="INSERT INTO reservation ( id_user, id_destination, nbr, date,payement)
			VALUES (:id_user,:id_destination,:nbr, :dates,:payment )";
			$sqlupdate="UPDATE  destination SET place=place-:nbr where id=:id_destination and place>=:nbr";
			$db = config::getConnexion();
			try{
				$querycheck = $db->prepare($sqlcheck);
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
							'dates' => $reservation->getdate(),
							'payment' => "yes"
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