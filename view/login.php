<?php
session_start();
include_once '../Model/comptes.php';
include_once '../Controller/ComptesC.php';
$message="";
$userC = new  ComptesC();
if (isset($_POST['email']) && isset($_POST['passworduser'])) {
    if (!empty($_POST['email']) &&
        !empty($_POST['passworduser']))
    {   $Comptes=$userC->verif_address( $_POST['email']);
        if ($Comptes!="adresse email introuvable" )
		{	
			if (password_verify($_POST['passworduser'] , $Comptes['passworduser']))
			{
				session_regenerate_id();
			$_SESSION['e'] = $_POST['email'];
			$_SESSION['id'] = $Comptes['id'];
			if($Comptes['types']== 1)
			{
				header('Location:profileAdmin.php');
			}else
			{
				header('Location:profilUser.php');
			}
			}else
			{
				$message="mot de passe incorrecte";
			}
          }
        else{
            $message = $Comptes;
        }
	}
    else
        $message = "Missing information";} // header('Location:profilUser.php');
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
				<li><a class="selected"href="#0">Sign in</a></li>
				<li><a href="register.php" style="z-index:1;">New account</a></li>
			</ul>
			<div id="error">
            <?php echo $message ; ?>
        </div>
			
				<form class="form" method="post" action="">
				
					<p class="fieldset">
						<label class="image-replace email" for="signin-email">E-mail</label>
						<input class="full-width has-padding has-border" name="email" type="email" placeholder="E-mail">
						
					</p>

					<p class="fieldset">
						<label class="image-replace password" for="signin-password">Password</label>
						<input class="full-width has-padding has-border"  name="passworduser"  id="signin-password" type="password"  placeholder="Password">
						<a href="#0" class="hide-password">Show</a>
						
					</p>

					<p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">Remember me</label>
					</p>

					<p class="fieldset">
						<input class="full-width" type="submit" value="Login">
					</p>
				</form>
				
				<p class="form-bottom-message"><a href="reccuperation_mdp.php">Forgot your password?</a></p>
</div>		<!-- <a href="#0" class="close-form">Close</a> -->


			
				
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../assets/script.js"></script>

</body>
</html>
