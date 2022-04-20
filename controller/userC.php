<?php
	include '../config.php';
	include_once '../model/user.php';
    class userC {
function connectuser($email,$password){
    $sql="SELECT * from user where email='" .$email. "' ";
    $db = config::getConnexion();
    try{
        
        $query=$db->prepare($sql);
        $query->execute();
        $count=$query->rowCount();
        if($count==0){
            $msg="email est incorrect";
        }
        else{
            $info=$query->fetch();
            if(password_verify($password,$info['password'])){
                $encoded=json_encode($info);
                $compressed=gzdeflate($encoded, 9);
                $msg=$compressed;
            }
            else{
                $msg="mot de passe est incorrect";
            }
        }
        return $msg;
        
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
    function inscriptionuser($user){
        $sqlcheck="SELECT * from user where email='" .$user->getemail(). "' ";
        $sql="INSERT INTO user ( nom, prenom, dateN, email , password)
        VALUES (:nom, :prenom,:dateN, :email , :password )";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sqlcheck);
            $query->execute();
            $count=$query->rowCount();
            if($count>0){
            $msg="email existant";
            }else{
            $msg='compte cree';
            $query1 = $db->prepare($sql);
            $query1->execute([
                'nom' => $user->getnom(),
                'prenom' => $user->getprenom(),
                'dateN' => $user->getdateN(),
                'email' => $user->getemail(),
                'password' =>  password_hash($user->getpassword(), PASSWORD_BCRYPT)
            ]);	
        }
        return $msg;		
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
}


?>