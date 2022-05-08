<?php
include_once '../Model/comptes.php';
include '../config.php';
$bdd = config::getConnexion();
 if (isset($_GET['nom'], $_GET['key']) AND !empty($_GET['nom']) AND !empty($_GET['key']))
 {
     $nom = htmlspecialchars(urldecode($_GET['nom']));
     $key = htmlspecialchars($_GET['key']);
     
     $requser = $bdd->prepare("SELECT * FROM comptes WHERE nom = ? AND confirmkey = ?");
     $requser->execute(array($nom, $key));
     $userexist = $requser->rowCount();
     if($userexist == 1)
     {
            $user = $requser->fetch();
            if($user['confirm'] == 0){
                $update = $bdd->prepare("UPDATE comptes SET confirm = 1 WHERE nom = ? AND confirmkey = ? ");
                $update->execute(array($nom, $key));
                echo "votre compte a bien ete confirme";
            }else{
                echo "votre compte a deja ete confirme !";
            }
     }else{
         echo "utilisateur n'existe pas !";
     }
 } 

?>