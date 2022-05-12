<?php
	include '../config.php';
	include_once '../model/commentaire.php';
	class commentaireC {
		function statistiquecommentaires(){
			$sql="SELECT arrive,sum(prix) as prix FROM destination d INNER JOIN commentaire r ON d.id =  GROUP B;";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		
		function affichercommentaires(){
			$sql="SELECT * FROM commentaire";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercommentaire($Idcommentaire){
			$sql="DELETE FROM commentaire WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $Idcommentaire);
			$reqcheck->bindValue(':id', $Idcommentaire);
			try{
				$reqcheck->execute();
				$req->execute();
				
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutercommentaire($commentaire){
			
			$sql="INSERT INTO commentaire ( id_article, email, date,texte)
			VALUES (:id_article,:email,:date,:texte )";
			
			$db = config::getConnexion();
			try{
						$query = $db->prepare($sql);
						$query->execute([
							'id_article' => $commentaire->getid_article(),
							'email' => $commentaire->getemail(),
							'texte' => $commentaire->gettexte(),
                            'date' => date('Y-m-d H:i')
						]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMeesage();
			}			
		}
		
		function recupererAvecDateOuTemps($value,$type){
			if($type=='temps'){
				$sql="SELECT * FROM commentaire WHERE TIME(date)='$value'";;
			}else{
				$sql="SELECT * FROM commentaire WHERE DATE(date)='$value'";
			}
			
			$db = config::getConnexion();
			try{
				
				$liste = $db->query($sql);
				return $liste;
				
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMeesage());
			}
		}

		function filtrecommentaire($value,$type){
           if($type=='email'){$value="'$value'";}
			$sql="SELECT * from commentaire where $type=$value";
			$db = config::getConnexion();
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){	
				die('Erreur:'. $e->getMeesage());
			}
				
			}
		function recuperercommentaire($value,$type){
			if($type=='email'){$value="'$value'";}
			$sql="SELECT * from commentaire where $type=$value";
			$db = config::getConnexion();
			try{
				
				$query=$db->prepare($sql);
				$query->execute();

				$commentaire=$query->fetch();
				return $commentaire;
				
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMeesage());
			}
		}
		
		function modifiercommentaire($commentaire, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE commentaire SET 
						id_article= :id_article, 
						email= :email, 
                        texte = :texte
					WHERE id= :id'
				);
				$query->execute([
					'id' => $id,
					'email' => $commentaire->getemail(),
					'id_article' => $commentaire->getid_article() , 
                    'texte' => $commentaire->gettexte()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMeesage();
			}
		}

	}
?>