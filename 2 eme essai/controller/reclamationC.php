<?php
	include '../config.php';
	include_once '../modal/reclamation.php';
	class reclamationC {
        function ajouterreclamation($reclamation){
			$sql="INSERT INTO rec (contact, type, destinataire, statut, description) 
			VALUES (:contact, :type, :destinataire, :statut, :description)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'contact' => $reclamation->getcontact(),
					'type' => $reclamation->gettype(),
					'destinataire' => $reclamation->getdestinataire(),
					'statut' => $reclamation->getstatut(),
					'description' => $reclamation->getdescription()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function afficherreclamation(){
			$sql="SELECT * FROM rec";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerreclamation($id){
			$sql="DELETE FROM rec WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}

		

		function recupererreclamation($value,$type){
			$sql="SELECT * from rec where $type=$value";
			$db = config::getConnexion();
			try{
				
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
				
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreclamation($reclamation, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE rec SET 
						contact=:contact, 
						type=:type, 
						destinataire=:destinataire, 
						statut=:statut, 
						description=:description
					WHERE id=:id'
				);
				$query->execute([
					'id' => $id,
					'contact' => $reclamation->getcontact(),
					'type' => $reclamation->gettype(),
					'destinataire' => $reclamation->getdestinataire(),
					'statut' => $reclamation->getstatut(),
					'description' => $reclamation->getdescription()
					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		
		
		


		
		
		
    }	
	
?>