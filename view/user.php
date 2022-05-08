<?php

include_once '../Model/comptes.php';
include_once '../Controller/ComptesC.php';

session_start();
if(empty($_SESSION['e']) )
{ 
    header('Location:login.php');
}
   $id= $_SESSION['id'];

   $email= $_SESSION['e'];

    // create adherent
    $ComptesC = new ComptesC();
    $error = "";

    // create an instance of the controller
   
   

    if (		
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["datenai"]) && 
        isset($_POST["email"])  && 
        isset($_POST["passworduser"]) &&
       isset($_POST["confirmation"])
    ) {
        if (
			!empty($_POST["nom"]) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["datenai"]) && 
            !empty($_POST["email"])  && 
            !empty($_POST["passworduser"])  &&
            !empty($_POST["confirmation"])
        ) {
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
        }
        else
        {
            $error = "Missing information";
        }
    }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Aria is a business focused HTML landing page template built with Bootstrap to help you create lead generation websites for companies and their services.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Aria - Business HTML Landing Page Template</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="../assets/front/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/front/css/fontawesome-all.css" rel="stylesheet">
    <link href="../assets/front/css/swiper.css" rel="stylesheet">
	<link href="../assets/front/css/magnific-popup.css" rel="stylesheet">
	<link href="../assets/front/css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.svg" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="profilUser.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#intro">INTRO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#callMe">CALL ME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#projects">PROJECTS</a>
                </li>

                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">ABOUT</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">TERMS CONDITIONS</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="privacy-policy.html"><span class="item-text">PRIVACY POLICY</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">CONTACT</a>
                </li>
            </ul>
          
          
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->



    <!-- Call Me -->
   
        
 <div id="callMe" class="form-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <div class="section-title">Profile </div>
                        <h2 class="white">Have Us Contact You By Filling And Submitting The Form</h2>
                        <p class="white">You are just a few steps away from a personalized offer. Just fill in the form and send it to us and we'll get right back with a call to help you decide what service package works.</p>
                        <ul class="list-unstyled li-space-lg white">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">It's very easy just fill in the form so we can call</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">During the call we'll require some info about the company</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Don't hesitate to email us for any questions or inquiries</div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                <div class="col-lg-6">
                <div id="error"> <?php echo $error; ?> </div>
                <?php    $Comptes = $ComptesC->recupererUtilisateur($id);  ?> 
      
                    <!--connection -->
                    <form id="callMeForm" action="" method="POST" > 
                        <div class="form-group">
                            <input  class="form-control-input"  type="text" name="nom" id="nom" maxlength="20" value = "<?php echo $Comptes['nom']; ?>">
                         
                        </div>
                        <div class="form-group">
                            <input class="form-control-input" type="text" name="prenom" id="prenom" maxlength="20" value = "<?php echo $Comptes['prenom']; ?>">
                           
                        </div>
                        <div class="form-group">
                            <input  class="form-control-input" type="date" name="datenai" id="datenai" value = "<?php echo $Comptes['datenai']; ?>">
                            
                        </div>
                        <div class="form-group">
                            <input class="form-control-input"  type="email" name="email" id="email" value = "<?php echo  $Comptes['email']; ?>">
                           
                        </div>
                        <div class="form-group">
                            <input class="form-control-input" type="password" name="passworduser" id="passworduser" placeholder = "password" value = "">
                           
                        </div>
                        <div class="form-group">
                            <input class="form-control-input" type="password" name="confirmation" id="confirmation" placeholder = "confirmation " value = "" >
                           
                        </div>
                      
                       
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">Modifier</button>
                        </div>
                       
                        
                    </form>
                    <!-- end of call me form -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of call me -->
    <div class="form-group">
                            <button type="submit" class="form-control-submit-button" ><a href="Deconnexion.php">Deconnexion</a></button>
                        </
   

    <!-- Team -->
  

    
    <!-- Scripts -->
    <script src="../assets/front/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="../assets/front/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="../assets/front/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="../assets/front/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="../assets/front/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="../assets/front/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="../assets/front/js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="../assets/front/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="../assets/front/js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>