<?php
	include '../config.php';
	include_once '../Model/comptes.php';
	class ComptesC {
		function afficherUtilisateur($var,$search){
			
			$sql="SELECT * FROM comptes order by $var";
			if($search!="")
			$sql="SELECT * FROM comptes where nom like '%$search%' order by $var";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimeUtilisateur($id){
			$sql="DELETE FROM comptes WHERE id=:id";
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
		function ajouterUtilisateur($Comptes){
			$sql="INSERT INTO comptes (Nom, Prenom, datenai, email, passworduser, types, confirmkey) 
			VALUES (:Nom,:Prenom, :datenai,:Email, :passworduser, :types, :key)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'Nom' => $Comptes->getNom(),
					'Prenom' => $Comptes->getPrenom(),
					'datenai' => $Comptes->getDatenai(),
					'Email' => $Comptes->getEmail(),
					'passworduser' => $Comptes->getPassword(),
					'types' => $Comptes->getTypes(),
					'key' => $Comptes->getKey()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function modifierUtilisateur($Comptes, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE comptes SET 
						nom = :nom, 
						prenom = :prenom,
						datenai = :datenai,
						email = :email,
						passworduser = :passworduser
					WHERE id = :id'
				);
				$query->execute([
					'nom' => $Comptes->getNom(),
					'prenom' => $Comptes->getPrenom(),
					'datenai' => $Comptes->getDatenai(),
					'email' => $Comptes->getEmail(),
					'passworduser' => $Comptes->getPassword(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererUtilisateur($id){
			$sql="SELECT * from comptes where id = :id ";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':id', $id);
				$query->execute();
				$count=$query->rowCount();
						if ($count > 0) 
						{
							$Comptes=$query->fetch();
							return $Comptes;
						}
						else return FALSE;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	

		function recupererUtilisateur1( $email, $password1){
			$sql=" SELECT * from comptes where email= :email AND passworduser= :password1  ";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':email', $email);
				$query->bindValue(':password1', $password1);
				$query->execute();
				$count=$query->rowCount();
						if ($count > 0) 
						{
							$Comptes=$query->fetch();
							return $Comptes;
						}
						else return "pseudo ou le mot de passe est incorrect";
			
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	

		function verif_address($email){
			$sql="SELECT * from comptes where email = :email ";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':email', $email);
				$query->execute();
				$count=$query->rowCount();
						if ($count > 0) 
						{
							$Comptes=$query->fetch();
							return $Comptes;
						}
						else return "adresse email introuvable";
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}
	function nbr_admin(){
		$sql="SELECT * from comptes where types = :types";
		$db = config::getConnexion();
		try{
			$query=$db->prepare($sql);
			$query->bindValue(':types', 1);
			$query->execute();
			$count=$query->rowCount();
					if ($count > 0) 
					{
						return $count;
					}
					else return "aucun admin";
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
}

}
?>