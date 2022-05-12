<?php
	include '../config.php';
	include_once '../model/message.php';
	class messageC {
		function statistiquemessages(){
			$sql="SELECT arrive,sum(prix) as prix FROM destination d INNER JOIN message r ON d.id =  GROUP B;";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		
		function affichermessages(){
			$sql="SELECT * FROM message";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimermessage($Idmessage){
			$sql="DELETE FROM message WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $Idmessage);
			$reqcheck->bindValue(':id', $Idmessage);
			try{
				$reqcheck->execute();
				$req->execute();
				
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutermessage($message){
			
			$sql="INSERT INTO message ( id_rec, email, date,texte)
			VALUES (:id_rec,:email,:date,:message )";
			
			$db = config::getConnexion();
			try{
						$query = $db->prepare($sql);
						$query->execute([
							'id_rec' => $message->getid_rec(),
							'email' => $message->getemail(),
							'message' => $message->getmessage(),
                            'date' => date('Y-m-d H:i')
						]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function recupererAvecDateOuTemps($value,$type){
			if($type=='temps'){
				$sql="SELECT * FROM message WHERE TIME(date)='$value'";;
			}else{
				$sql="SELECT * FROM message WHERE DATE(date)='$value'";
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

		function filtremessage($value,$type){
            if($type!='id' && $type!='id_rec' ){$value="'$value'";}
			$sql="SELECT * from message where $type=$value";
			$db = config::getConnexion();
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){	
				die('Erreur:'. $e->getMeesage());
			}
				
			}
		function recuperermessage($value,$type){
            if($type!='id' && $type!='id_rec' ){$value="'$value'";}
			$sql="SELECT * from message where $type=$value";
			$db = config::getConnexion();
			try{
				
				$query=$db->prepare($sql);
				$query->execute();

				$message=$query->fetch();
				return $message;
				
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiermessage($message, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE message SET 
						id_rec= :id_rec, 
						email= :email, 
                        texte = :message
					WHERE id= :id'
				);
				$query->execute([
					'id' => $id,
					'email' => $message->getemail(),
					'id_rec' => $message->getid_rec() , 
                    'message' => $message->getmessage()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>