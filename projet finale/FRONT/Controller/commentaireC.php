<?php
	include '../config.php';
	include_once '../Model/commentaire.php';
	class CommentaireC {
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
		function affichercommentairesid($id_article){
			$sql="SELECT * FROM commentaire where id_article='$id_article'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercommentaire($id_commentaire){
			$sql="DELETE FROM commentaire WHERE id_commentaire=:id_commentaire";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_commentaire', $id_commentaire);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
			
		}
		
		function ajoutercommentaire($commentaire){
			$sql="INSERT INTO commentaire (id_commentaire, id_article, nom,  email, comments/*,date*/) 
			VALUES (:id_commentaire,:id_article,:nom, :email,:comments/*, :date*/)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_commentaire' => $commentaire->getid_commentaire(),
					'id_article' => $commentaire->getid_article(),
					'nom' => $commentaire->getnom(),
					'email' => $commentaire->getemail(),
					'comments' => $commentaire->getcomments()
				//	'date' => $commentaire->getdate()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperercommentaire($id_commentaire){
			$sql="SELECT * from commentaire where id_commentaire='$id_commentaire'";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$commentaire=$query->fetch();
				return $commentaire;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiercommentaire($commentaire, $id_commentaire){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE commentaire SET 
						id_article= :id_article, 
						nom= :nom, 
						email= :email, 
						comments= :comments
					/*	date= :date*/
					WHERE id_commentaire= :id_commentaire'
				);
				$query->execute([
					'id_article' => $commentaire->getid_article(),
					'nom' => $commentaire->getnom(),
					'email' => $commentaire->getemail(),
					'comments' => $commentaire->getcomments(),
				//	'date' => $commentaire->getdate(),
					'id_commentaire' => $id_commentaire
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>