<?php
	include_once '../config.php';
	include '../Model/article.php';


	class ArticleC {
		function afficherarticle(){
			$sql="SELECT * FROM article";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerarticle($id_article){
			$sql="DELETE FROM article WHERE id_article=:id_article";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_article', $id_article);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimercommentairepararticle($id_article){
			$sql="DELETE FROM commentaire WHERE id_article=:id_article";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_article', $id_article);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
			
		}
		function ajouterarticle($article){
			$sql="INSERT INTO article (id_article, titre, contenu, photo) 
			VALUES (:id_article,:titre,:contenu, :photo)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_article' => $article->getid_article(),
					'titre' => $article->gettitre(),
					'contenu' => $article->getcontenu(),
					'photo' => $article->getimage(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererarticle($id_article){
			$sql="SELECT * from article where id_article=$id_article";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$article=$query->fetch();
				return $article;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierarticle($article, $id_article){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE article SET 
						titre= :titre, 
						contenu= :contenu, 
						photo= :photo
						
					WHERE id_article= :id_article'
				);
				$query->execute([
					 
					'titre' => $article->gettitre(),
					'contenu' => $article->getcontenu(),
					'photo' => $article->getimage(),
					'id_article' =>$id_article
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


		function affichertitre(){
			$sql="SELECT * FROM article";
			$db = config::getConnexion();
			try{
				$titre = $db->query($sql);
				return $titre;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}



		function afficher_commentaire($id_article) 
 {


	$sql="SELECT * FROM commentaire where id_article=$id_article";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}

	
		}

	}
?>