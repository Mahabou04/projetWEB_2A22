<?php
	include '../config.php';
	include_once '../model/reclamation.php';
	class reclamationC {
		function statistiquereclamations(){
			$sql="SELECT email,COUNT(*)as nombre_de_reclamation from reclamation group by email;";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		
		function afficherreclamations(){
			$sql="SELECT * FROM reclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerreclamation($Idreclamation){
			$sqlcheck="DELETE FROM reponse WHERE id_rec=:id";
			$sql="DELETE FROM reclamation WHERE id=:id";
			$db = config::getConnexion();
			$reqcheck=$db->prepare($sqlcheck);
			$req=$db->prepare($sql);
			$req->bindValue(':id', $Idreclamation);
			$reqcheck->bindValue(':id', $Idreclamation);
			try{
				$reqcheck->execute();
				$req->execute();
				
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterreclamation($reclamation){
			
			$sql="INSERT INTO reclamation (  email,sujet,message,date)
			VALUES (:email, :sujet,:message,:date)";
			
			$db = config::getConnexion();
			try{
						$query = $db->prepare($sql);
						$query->execute([
							
							'email' => $reclamation->getemail(),
							'sujet' => $reclamation->getsujet(),
							'message' => $reclamation->getmessage(),
                            'date' => date('Y-m-d H:i')
						]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function recupererAvecDateOuTemps($value,$type){
			if($type=='temps'){
				$sql="SELECT * FROM reclamation WHERE TIME(date)='$value'";;
			}else{
				$sql="SELECT * FROM reclamation WHERE DATE(date)='$value'";
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

		function filtrereclamation($value,$type){
			if($type!='id'  ){$value="'$value'";}
			$sql="SELECT * from reclamation where $type=$value";
			$db = config::getConnexion();
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){	
				die('Erreur:'. $e->getMeesage());
			}
				
			}
		function recupererreclamation($value,$type){
            if($type!='id'  ){$value="'$value'";}
			$sql="SELECT * from reclamation where $type=$value";
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
					'UPDATE reclamation SET  
						email= :email, 
						sujet = :sujet,
                        message = :message
					WHERE id= :id'
				);
				$query->execute([
					'id' => $id,
					'email' => $reclamation->getemail(),
					'sujet' => $reclamation->getsujet(),
                    'message' => $reclamation->getmessage()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
       

	}
?>