<?php
	include '../config.php';
	include_once '../model/reservation.php';
	class reservationC {
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
			$sql="INSERT INTO reservation ( id_user, id_hotel, duree, nbr, date)
			VALUES (:id_user,:id_hotel, :duree,:nbr, :dates )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_user' => $reservation->getid_user(),
					'id_hotel' => $reservation->getid_hotel(),
					'duree' => $reservation->getduree(),
					'nbr' => $reservation->getnbr(),
					'dates' => $reservation->getdate()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreservation($Idreservation,$type){
			$sql="SELECT * from reservation where $type=$Idreservation";
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
						id_hotel= :id_hotel, 
						duree= :duree, 
						nbr= :nbr, 
						date = :dates
					WHERE id= :id'
				);
				$query->execute([
					'id' => $id,
					'id_hotel' => $reservation->getid_hotel(),
					'duree' => $reservation->getduree(),
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