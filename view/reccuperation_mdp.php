<?php 
session_start();
include '../config.php';
include_once '../Model/comptes.php';
$message="";
$db = config::getConnexion();
if(isset($_POST['verif_submit'],$_POST['verif_code']))
{
    if(!empty($_POST['verif_code']))
    {
        $verif_code= htmlspecialchars($_POST['verif_code']);
        $verif_req=$db->prepare('SELECT * from recuperation where mail = ? AND code = ?');
        $verif_req->execute(array($_SESSION['recup_mail'], $verif_code));
        $verif_count= $verif_req->rowCount();
        if($verif_count == 1 )
        {
            $del_req= $db ->prepare('DELETE from recuperation where mail = ? ');
            $del_req-> execute(array($_SESSION['recup_mail']));
            header('Location:http://localhost/template/GestionCompte/view/reccuperation_mdp.php?section=changemdp');
        }else{
            $message = "code invalide"; 
        }
    }else{
        $message = "veuillez entrer votre code de confirmation";
    }

}
if(isset($_GET['section']))
{
    $section = htmlspecialchars($_GET['section']);
    
}else{
    $section="";
}

 if(isset($_POST['recup_submit'], $_POST['recup_mail']))
{
    if(!empty($_POST['recup_mail']))
    {
       $mail = htmlspecialchars($_POST['recup_mail']);
       if(filter_var($mail,FILTER_VALIDATE_EMAIL))
       {
        $db = config::getConnexion();
           $mailexist= $db->prepare('SELECT id , nom from comptes where email = ?');
           $mailexist->execute(array($mail));
           $count= $mailexist->rowCount();
        
           if($count == 1 )
           {
               $nom= $mailexist->fetch();
               $nom= $nom['nom'];
               var_dump($nom);
                $_SESSION['recup_mail'] = $mail;
                $recup_code="";
                for($i=0;  $i < 8 ; $i++)
                {
                    $recup_code .= mt_rand(0,9);

                }
              
                $mail_recup_exist = $db->prepare('SELECT id from recuperation where mail = ?');
                $mail_recup_exist->execute(array($mail));
                $mail_recup_exist = $mail_recup_exist->rowCount();
                if($mail_recup_exist ==   1)
                {
                    $recup_insert=$db->prepare('UPDATE  recuperation  SET code = ? where mail = ?');
                   $recup_insert->execute(array( $recup_code, $mail));
                }else
                {
                    $recup_insert=$db->prepare('INSERT into recuperation(mail,code) values (? , ?)');
                   $recup_insert->execute(array($mail , $recup_code));
                } 
                               
                                $header="MIME-Version: 1.0 \r\n";
                                $header.='From:"Fly Away Travel "<support@FlyAway.com>'."\n";
                                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                                $header.='Content-Transfer-Encoding: 8bit';

                                $message='
                                <html>
                                <head>
                                <title>Recuperation de mot de passe</title>
                                <meta charset="utf-8" />
                                </head>
                                    <body>
                                        <div align="center">
                                           BONJOUR <b>'.$nom.'</b>,
                                           voici votre code  de reccuperation :<b>'.$recup_code.'</b> <br/> <br/> 
                                        </div><br/>
                                        Cliquez <a href="http://localhost/template/GestionCompte/view/reccuperation_mdp.php?section=code&code='.$recup_code.'">ici</a> pour reinitialiser votre mot de pass.A bientot<br/>
                                            
                                        </body>
                                </html>
                                ';

                                mail($mail, "Recuperation mot de passe !", $message, $header);
                                header("Location:http://localhost/template/GestionCompte/view/reccuperation_mdp.php?section=code");
                            
                               
                  }else
           {
            $message= " adresse mail n_est pas enregistree";
           }
       }else
       {
        $message= " adresse mail invalide";
       }

    }else 
    {
        $message= "veuillez entrer votre adresse mail";
    }


}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login and Registration Form Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'><link rel="stylesheet" href="../assets/style1.css">

</head>
<body>
<!-- partial:index.partial.html -->

		<div class="user-modal-container" >
			 
			<?php 
             if($section == 'code'){ ?>
             <br/>
             <br/>
               <a> Recuperation de mot de passe pour </a><?= $_SESSION['recup_mail'] ?>
                <form class="form" method="post" action="">
			
					<p class="fieldset">
						<label class="image-replace email" for="signin-email"></label>
						<input class="full-width has-padding has-border" name="verif_code" type="number" placeholder="Code de verification">
						
					</p>
                    <p class="fieldset">
						<input class="full-width" type="submit" value="Valider" name="verif_submit">
					</p>
					
				</form>
                <?php } elseif($section == 'changemdp'){ ?>
                    <br/>
             <br/>
                    <a> changer de mot de passe pour </a>
                        <?= $_SESSION['recup_mail'] ?>
                            <form class="form" method="post" action="">
                        
                                <p class="fieldset">
                                    <label class="image-replace email" for="signin-email"></label>
                                    <input class="full-width has-padding has-border" name="passworduser" type="password" placeholder="nouveau mot de passe">
                                    
                                </p>
                                <p class="fieldset">
                                    <label class="image-replace email" for="signin-email"></label>
                                    <input class="full-width has-padding has-border" name="confirmation" type="password" placeholder="confirmer votre mot de passe ">
                                    
                                </p>
                                <p class="fieldset">
                                    <input class="full-width" type="submit" value="Valider" name="change_submit">
                                </p>
                                
                            </form>
                <?php } else{ ?>
				<form class="form" method="post" action="">
				
					<p class="fieldset">
						<label class="image-replace email" for="signin-email">E-mail</label>
						<input class="full-width has-padding has-border" name="recup_mail" type="email" placeholder="Votre adresse mail">
						
					</p>
                    <p class="fieldset">
						<input class="full-width" type="submit" value="Valider" name="recup_submit">
					</p>
					
				</form>
                <?php } ?>
                <div id="error">
            <?php echo $message ; ?>
        </div>
				
				
</div>		<!-- <a href="#0" class="close-form">Close</a> -->


			
				
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../assets/script.js"></script>

</body>
</html>
<?php 
if(isset($_POST['change_submit']))
{
    if(isset($_POST['passworduser'],$_POST['confirmation']))
    { $mdp = htmlspecialchars($_POST['passworduser']);
        $mdpc = htmlspecialchars($_POST['confirmation']);
                if(!empty($mdp)  AND !empty($mdpc))
                {
                         if($mdp == $mdpc)
                         {
                           $hash = password_hash($mdp, PASSWORD_DEFAULT);
                           $modif_membre = $db->prepare('UPDATE comptes SET passworduser = ? where email = ?');
                           $modif_membre->execute(array($hash,$_SESSION['recup_mail']));
                           $modif_count= $modif_membre->rowCount();
                           if($modif_count == 1 )
                                {
                                header('Location:http://localhost/template/GestionCompte/view/login.php');
                                }else{
                                    $message ="error";
                                }
                         }else{
                            $message ="vos mots de passe ne correspondent pas ";
                         }
                }else{
                    $message ="Veuillez remplir les champs";
                }
    }else{
        $message ="Veuillez remplir les champs";
    }
}




?>