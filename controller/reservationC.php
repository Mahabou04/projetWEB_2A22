<?php
	include '../config.php';
	include_once '../model/reservation.php';
	class reservationC {
		function statistiquereservations(){
			$sql="SELECT r.nom_hotel,sum(prix) as prix FROM ticket t INNER JOIN reservation r ON r.id = t.id_reservation GROUP BY nom_hotel;";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
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
			$sqlcheck="DELETE FROM ticket WHERE id_reservation=:id";
			$sql="DELETE FROM reservation WHERE id=:id";
			$db = config::getConnexion();
			$reqcheck=$db->prepare($sqlcheck);
			$req=$db->prepare($sql);
			$reqcheck->bindValue(':id', $Idreservation);
			$req->bindValue(':id', $Idreservation);
			try{
				$reqcheck->execute();
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterreservation($reservation){
			$sql="INSERT INTO reservation ( id_user, nom_hotel, duree, nbr, date)
			VALUES (:id_user,:nom_hotel, :duree,:nbr, :dates )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_user' => $reservation->getid_user(),
					'nom_hotel' => $reservation->getnom_hotel(),
					'duree' => $reservation->getduree(),
					'nbr' => $reservation->getnbr(),
					'dates' => $reservation->getdate()
				]);			
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
						nom_hotel= :nom_hotel, 
						duree= :duree, 
						nbr= :nbr, 
						date = :dates
					WHERE id= :id'
				);
				$query->execute([
					'id' => $id,
					'nom_hotel' => $reservation->getnom_hotel(),
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