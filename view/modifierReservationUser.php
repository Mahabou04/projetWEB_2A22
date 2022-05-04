<?php
   include_once '../Model/reservation.php';
   include_once '../Controller/reservationC.php';
   session_start();

   if(!isset($_SESSION['key'])){
       header('Location:connecterUser.php'); 
   }
   else{
       $session=gzinflate($_SESSION['key']);
       $res=json_decode($session,true);
   }
    $error = "";

    // create reservation
    $reservation = null;
    $message=null;
    $reservationC = new reservationC();
    if (isset($_GET['id'])){
        $reservation = $reservationC->recupererreservation($_GET['id'],'id');
     }
    // create an instance of the controller
    
    if (
        isset($_POST["nbr"])  
    ) {
        if (
            !empty($_POST["nbr"]) 
        ) {
            
            $reservation = new Reservation(
				$res['id'],
                $reservation['id_destination'], 
                $_POST["nbr"],
                $reservation['date']
            );
            $reservationC->modifierreservation($reservation,$_GET["id"]);
            $subject = 'reservation';
            $to      = $res['email'];
        $message = 'la modification de votre reservation est reussite';
        $headers = array(
        'From' => 'mohamedaziz.jellazi@esprit.com',
        'Reply-To' => 'mohamedaziz.jellazi@esprit.com',
        '   X-Mailer' => 'PHP/' . phpversion()
        );
        mail($to, $subject, $message, $headers);
            header('Location:profilUser.php');
        }
        else
            $error = "Missing information";
        
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
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="../assets/css/swiper.css" rel="stylesheet">
	<link href="../assets/css/magnific-popup.css" rel="stylesheet">
	<link href="../assets/css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="../assets/../assets/images/favicon.png">
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
        <a class="navbar-brand logo-image" href="index.html"><img src="../assets/../assets/images/logo.svg" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
               
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="deconnexion.php">SE DECONNECTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="profilUser.php">PROFIL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="reserverUser.php">RESERVER</a>
                </li>
               
               

                
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="#your-link">
                        <span class="hexagon"></span>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="#your-link">
                        <span class="hexagon"></span>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->
    
   


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h1>BUSINESS <span id="js-rotating">TEMPLATE, SERVICES, SOLUTIONS</span></h1>
                            <p class="p-heading p-large">Aria is a top consultancy company specializing in business growth using online marketing and conversion optimization tactics</p>
                            <a class="btn-solid-lg page-scroll" href="#intro">DISCOVER</a>
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <div id="reserver" class="form-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <div class="section-title">RESERVER</div>
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
                                <div class="media-body">Don't hesitate to nom_hotel us for any questions or inquiries</div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                
                <div class="col-lg-6">
              
                    <!-- Call Me Form -->
                    <form data-toggle="validator" data-focus="false" method="POST">
                   
                    
                   
                            
                        
                        
                        <div class="form-group">
                        <label class="label-control" for="nbr">Nombre de personnes</label>
                        <br>
                        <br>
                            <input type="number"  value="<?php echo $reservation['nbr'];?>" class="form-control-input" id="nbr" name="nbr" required>
                            <div class="help-block with-errors"></div>
                        </div>
                      
                        
                        
                        
                        <div class="form-group checkbox white">
                            <input type="checkbox" id="lterms" value="Agreed-to-Terms" name="lterms" required>I agree with Aria's stated <a class="white" href="privacy-policy.html">Privacy Policy</a> and <a class="white" href="terms-conditions.html">Terms & Conditions</a>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">MODIFIER</button>
                        </div>
                        <div class="form-message">
                            <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                        <div class="help-block with-errors">
                    <?php echo $error; ?>
                        </div>
                    </form>
                    <!-- end of call me form -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of call me -->
   
    
   


  
        


    


    

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-container about">
                        <h4>Few Words About Aria</h4>
                        <p class="white">We're passionate about delivering the best business growth services for companies just starting out as startups or industry players that have established their market position a long tima ago.</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-md-2">
                    <div class="text-container">
                        <h4>Links</h4>
                        <ul class="list-unstyled li-space-lg white">
                            <li>
                                <a class="white" href="#your-link">startupguide.com</a>
                            </li>
                            <li>
                                <a class="white" href="terms-conditions.html">Terms & Conditions</a>
                            </li>
                            <li>
                                <a class="white" href="privacy-policy.html">Privacy Policy</a>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-md-2">
                    <div class="text-container">
                        <h4>Tools</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="#your-link">businessgrowth.com</a>
                            </li>
                            <li>
                               <a class="white" href="#your-link">influencers.com</a>
                            </li>
                            <li class="media">
                                <a class="white" href="#your-link">optimizer.net</a>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-md-2">
                    <div class="text-container">
                        <h4>Partners</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="#your-link">unicorns.com</a>
                            </li>
                            <li>
                                <a class="white" href="#your-link">staffmanager.com</a>
                            </li>
                            <li>
                                <a class="white" href="#your-link">association.gov</a>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2020 <a href="https://inovatik.com">Template by Inovatik</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="../assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="../assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="../assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="../assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="../assets/js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="../assets/js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="../assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="../assets/js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>