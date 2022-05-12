<?php
	include '../config.php';
	include_once '../model/article.php';
	class articleC {
		function statistiquearticles(){
			$sql="SELECT image,COUNT(*)as nombre_de_article from article group by image;";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		
		function afficherarticles(){
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
		function supprimerarticle($Idarticle){
			$sqlcheck="DELETE FROM reponse WHERE id_article=:id";
			$sql="DELETE FROM article WHERE id=:id";
			$db = config::getConnexion();
			$reqcheck=$db->prepare($sqlcheck);
			$req=$db->prepare($sql);
			$req->bindValue(':id', $Idarticle);
			$reqcheck->bindValue(':id', $Idarticle);
			try{
				$reqcheck->execute();
				$req->execute();
				
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterarticle($article){
			
			$sql="INSERT INTO article (  image,texte,date)
			VALUES (:image, :texte,:date)";
			
			$db = config::getConnexion();
			try{
						$query = $db->prepare($sql);
						$query->execute([
							
							'image' => $article->getimage(),
							'texte' => $article->gettexte(),
                            'date' => date('Y-m-d H:i')
						]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function recupererAvecDateOuTemps($value,$type){
			if($type=='temps'){
				$sql="SELECT * FROM article WHERE TIME(date)='$value'";;
			}else{
				$sql="SELECT * FROM article WHERE DATE(date)='$value'";
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

		function filtrearticle($value,$type){
			if($type!='id'  ){$value="'$value'";}
			$sql="SELECT * from article where $type=$value";
			$db = config::getConnexion();
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){	
				die('Erreur:'. $e->getMessage());
			}
				
			}
		function recupererarticle($value,$type){
            if($type!='id'  ){$value="'$value'";}
			$sql="SELECT * from article where $type=$value";
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
		
		function modifierarticle($article, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE article SET  
						image= :image, 
						texte = :texte,
                        message = :message
					WHERE id= :id'
				);
				$query->execute([
					'id' => $id,
					'image' => $article->getimage(),
					'texte' => $article->gettexte(),
                    'message' => $article->getmessage()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
       

	}
?>