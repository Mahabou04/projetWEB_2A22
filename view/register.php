<?php
   include_once '../Model/comptes.php';
  include_once '../Controller/ComptesC.php';

    $error = "";

    $Comptes = null;

    // create an instance of the controller
    $ComptesC = new ComptesC();
    if (		
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["datenai"]) && 
        isset($_POST["email"]) && 
        isset($_POST["passworduser"]) && 
        isset($_POST["confirmation"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["datenai"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["passworduser"]) && 
            !empty($_POST["confirmation"])
        ) {
            $sql="SELECT * FROM comptes where email = :email ";
            $db = config::getConnexion();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':email', $_POST['email']);
            $stmt->execute();
            $count=$stmt->rowCount();
            if ($count == 0) {
                $sql1="SELECT * FROM comptes where passworduser = :passworduser";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindValue(':passworduser', $_POST['passworduser']);
                $stmt1->execute();
                $count1=$stmt->rowCount();
                if ($count1 == 0) {
                    if($_POST['passworduser'] == $_POST['confirmation']){
                        $longueurkey = 15;
                        $key = "";
                        for($i=1;$i<$longueurkey;$i++)
                        {
                            $key .= mt_rand(0,9) ;

                        }
                        $password= $_POST['passworduser'];
								$hash = password_hash($password, PASSWORD_DEFAULT);
                        $Comptes = new Comptes(
            
                            $_POST['nom'],
                            $_POST['prenom'], 
                            $_POST['datenai'],
                            $_POST['email'],
                            $hash,
                           0,
                           $key
                        );
                        $ComptesC->ajouterUtilisateur($Comptes);
                            header('Location:profilUser.php');
                            
                            
                            $header="MIME-Version: 1.0 \r\n";
                            $header.='From:"Fly Away Travel "<support@FlyAway.com>'."\n";
                            $header.='Content-Type:text/html; charset="uft-8"'."\n";
                            $header.='Content-Transfer-Encoding: 8bit';
                            
                            $message='
                            <html>
                                <body>
                                    <div align="center">
                                        
                                        <a href="http://localhost/template/GestionCompte/view/mail_config.php?nom='.urlencode($_POST['nom']).' &key='.$key.'">confirmez votre compte</a>
                                        
                                    </div>
                                </body>
                            </html>
                            ';
                            
                            mail($_POST['email'], "Confirmation compte", $message, $header);
                   
                   
                  
                  
                    }
                    else
                    {
                        $error= "Veuillez vérifier que les deux mots de passe sont les mêmes.";
                    }
                    //
                }
                else 
                {
                    $error= "mot de passe existe déjà";
                }
            }
            else
            {
                $error= "Email existe déjà";
            }
       
    }
    else 
    {
    $error= "Missing information";
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


		<div class="user-modal-container">
			<ul class="switcher">
				<li><a href="#0">Sign in</a></li>
				<li><a class="selected" href="#0">New account</a></li>
			</ul>
		
			
				<form class="form" method="post" action="">
				<p class="fieldset">
						<label class="image-replace username" >Name</label>
						<input class="full-width has-padding has-border" type="text" id="nom" name="nom" placeholder="Name" required minlength="3" maxlength="30">
						<span class="error-message">Your username can only contain  alphabetic symbols!</span>
					</p>
                    <p class="fieldset">
						<label class="image-replace username" >FIRST NAME</label>
						<input class="full-width has-padding has-border"  type="text"  id="prenom" name="prenom"  placeholder="FIRST NAME" required minlength="3" maxlength="30">
						<span class="error-message">Your username can only contain  alphabetic symbols!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace " >Birth date</label>
						<input class="full-width has-padding has-border" type="date"   id="datenai" name="datenai" required>
						
					</p>
                    <p class="fieldset">
						<label class="image-replace email" for="signin-email">E-mail</label>
						<input class="full-width has-padding has-border" id="email" name="email" placeholder="@gmail.com" required minlength="5" maxlength="30" >
						<span class="error-message">An account with this email address does not exist!</span>
					</p>


					<p class="fieldset">
						<label class="image-replace password" for="signup-password">Password</label>
						<input class="full-width has-padding has-border" id="passworduser" name="passworduser" placeholder="Password" required minlength="4" maxlength="40">
						<a href="#0" class="hide-password">Show</a>
						
					</p>

					<p class="fieldset">
						<label class="image-replace password" for="signup-password">Confirmation Password</label>
						<input class="full-width has-padding has-border" id="confirmation" name="confirmation" placeholder="confirmation">
						<a href="#0" class="hide-password">Show</a>
					
					</p>
                    <div><p style="color:red;"><?php echo $error;?></p></div>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Create account">
					</p>
                 

					
				</form>
				
				<p class="form-bottom-message"><a href="#0">Forgot your password?</a></p>
</div>		<!-- <a href="#0" class="close-form">Close</a> -->


			
				
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../assets/script.js"></script>

</body>
</html>
