<?php
	include '../config.php';
	include_once '../model/ticket.php';
	class ticketC {
		function affichertickets(){
			$sql="SELECT * FROM ticket";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerticket($Idticket){
			$sql="DELETE FROM ticket WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $Idticket);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterticket($ticket){
			$sql="INSERT INTO ticket ( id_reservation,prix)
			VALUES (:id_reservation,:prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_reservation' => $ticket-> getid_reservation(),
					'prix' => $ticket->getprix()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function filtreticket($value,$type){
			$sql="SELECT * from ticket where $type=$value";
			$db = config::getConnexion();
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){	
				die('Erreur:'. $e->getMeesage());
			}
				
			}
		function recupererticket($Idticket,$type){
			$sql="SELECT * from ticket where $type=$Idticket";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$ticket=$query->fetch();
				return $ticket;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierticket($ticket, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE ticket SET 
						id_reservation= :id_reservation, 
						prix= :prix
						
					WHERE id= :id'
				);
				$query->execute([
					'id' => $id,
					'prix' => $ticket->getprix(),
					'id_reservation' => $ticket->getid_reservation()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>