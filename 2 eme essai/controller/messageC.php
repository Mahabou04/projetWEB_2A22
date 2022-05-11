<?php
	include '../config.php';
	include_once '../modal/message.php';
	class messageC {
        function ajoutermessage($message){
			$id=$message->getid_reclamation();
			$sqlr="SELECT * from rec where id='$id'";
			$sql="INSERT INTO mess ( id_reclamation,text)
			VALUES (:id_reclamation,:text)";
			$db = config::getConnexion();
			try{
				$liste=$db->query($sqlr);
				if($liste){
					foreach($liste as $keys ){

					if($keys['id']==$id){
				$query1 = $db->prepare($sql);
				$query1->execute([
					'id_reclamation' => $message->getid_reclamation(),
					'text' => $message->gettext()
					
				]);	
				return $liste;
				}
			}
		}
				
					
				  
			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

        function affichermessage(){
			$sql="SELECT * FROM mess";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
        function filtremessage($value,$type){
			$sql="SELECT * from mess where $type=$value";
			$db = config::getConnexion();
			try{
				
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){	
				die('Erreur:'. $e->getMessage());
			}
				
			}


            function supprimermessage($Idmessage){
                $sql="DELETE FROM mess WHERE id=:id";
                $db = config::getConnexion();
                $req=$db->prepare($sql);
                $req->bindValue(':id', $Idmessage);
                try{
                    $req->execute();
                }
                catch(Exception $e){
                    die('Erreur:'. $e->getMessage());
                }
            }

            function modifiermessage($message, $id){
                try {
                    $db = config::getConnexion();
                    $query = $db->prepare(
                        'UPDATE mess SET 
                            id_reclamation= :id_reclamation, 
                           text= :text
                            
                        WHERE id= :id'
                    );
                    $query->execute([
                        'id' => $id,
                        'text' => $message->gettext(),
                        'id_reclamation' => $message->getid_reclamation()
                    ]);
                    echo $query->rowCount() . " records UPDATED successfully <br>";
                } catch (PDOException $e) {
                    $e->getMessage();
                }
            }

            function recuperermessage($Idmessage,$type){
                $sql="SELECT * from mess where $type=$Idmessage";
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
    
		

	}
?>