
<?php
	include '../Controller/CommentaireC.php';
    include '../Controller/articleC.php';
	$CommentaireC=new CommentaireC();
	$listecommentaires=$CommentaireC->affichercommentairesid($_GET["id"]); 
    $articleC=new ArticleC();
	$article=$articleC->recupererarticle($_GET["id"]); 
  
?>

<?php
    

    $error = "";

    // create commentaire
    $commentaire = null;

    // create an instance of the controller
    $commentaireC = new commentaireC();
    if (
        isset($_POST["id_commentaire"]) &&
			
        isset($_POST["nom"]) &&
		isset($_POST["email"]) && 
        isset($_POST["comments"]) 
        //isset($_POST["date"])
    ) {
        if (
            !empty($_POST["id_commentaire"]) && 
			
            !empty($_POST["nom"]) && 
			!empty($_POST["email"]) && 
            !empty($_POST["comments"]) 
           // !empty($_POST["date"])
        ) {
            $commentaire = new Commentaire(
                $_POST['id_commentaire'],
				$_GET['id'],
                $_POST['nom'], 
				$_POST['email'],
                $_POST['comments']
              //  $_POST['date']
            );
            $commentaireC->ajoutercommentaire($commentaire);
            header('Location:index.php');
        }
        else
            $error = "Missing information";
    }

    
?>

<!DOCTYPE html><meta charset="utf-8">
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
    <title>Privacy Policy - Aria - Business HTML Landing Page Template</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
	
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
                    <a class="nav-link page-scroll" href="index.html#header">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.html#intro">INTRO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.html#services">SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.html#callMe">CALL ME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.html#projects">PROJECTS</a>
                </li>

                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="index.html#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">ABOUT</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">TERMS CONDITIONS</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="commentaire.html"><span class="item-text">commentaire</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.html#contact">CONTACT</a>
                </li>
            </ul>
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
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Article</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.php">Home</a><i class="fa fa-angle-double-right"></i><span>Article</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->

    <div id="intro" class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <div class="section-title">Article</div>
                        <h2><?PHP echo $article['titre']; ?></h2>
                        <p><?PHP echo $article['contenu']; ?><p>
                        
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="image-container">
                        <img class="img-fluid" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($article['photo']); ?>" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of intro -->
    <!-- Privacy Content -->
    <div class="ex-basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   
                    <nav class="navbar navbar-expand-sm navbar-dark"> <img src="https://i.imgur.com/CFpa3nK.jpg" width="20" height="20" class="d-inline-block align-top rounded-circle" alt=""> <a class="navbar-brand ml-2" href="#" data-abc="true">Rib Simpson</a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="end">
                            <div class="collapse navbar-collapse" id="navbarColor02">
                                <ul class="navbar-nav">
                                    <li class="nav-item"> <a class="nav-link" href="#" data-abc="true">Work</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#" data-abc="true">Capabilities</a> </li>
                                    <li class="nav-item "> <a class="nav-link" href="#" data-abc="true">Articles</a> </li>
                                    <li class="nav-item active"> <a class="nav-link mt-2" href="#" data-abc="true" id="clicked">Contact<span class="sr-only">(current)</span></a> </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- Main Body -->
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-5 col-md-6 col-12 pb-4">
                                    <h1>Comments</h1>
                                    <?php
				foreach($listecommentaires as $Commentaire){
			?>
            <div>
                                    <div class="comment mt-4 text-justify "> <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
                                        <h4><?php echo $Commentaire['nom']; ?></h4> <span><?php echo $Commentaire['date']; ?></span> / <span><?php echo $Commentaire['email']; ?></span>
                                        <p><?php echo $Commentaire['comments']; ?></p>
                                       
                                    </div>

                                    </div>
                                   
                                    <?php
				}
			?>
                                  
                                </div>
                                <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                                     
        <div id="error">
            <?php echo $error; ?>
        </div>
                                    <form id="algin-form" method="post">
                                        <div class="form-group">
                                            <h4>Leave a comment</h4> <label for="comments">Commentaire</label> <textarea name="comments" id="" msg cols="30" rows="5" class="form-control" style="background-color: black;"></textarea>
                                        </div>
                                        <div class="form-group"> <label for="id_commentaire">id commentaire</label> <input type="number" name="id_commentaire" id="fullname" class="form-control"> </div>
                                        <div class="form-group"> <label for="name">Name</label> <input type="text" name="nom" id="fullname" class="form-control"> </div>
                                        <div class="form-group"> <label for="email">Email</label> <input type="text" name="email" id="email" class="form-control"> </div>
                                    <!--    <div class="form-group"> <label for="date">Date</label> <input type="date" name="date" id="date" class="form-control"> </div>-->
                                        <div class="form-group">
                                            <p class="text-secondary">If you have a <a href="#" class="alert-link">gravatar account</a> your address will be used to display your profile picture.</p>
                                        </div>
                                        <div class="form-inline"> <input type="checkbox" name="check" id="checkbx" class="mr-1"> <label for="subscribe">Subscribe me to the newlettter</label> </div>
                                        <div class="form-group"> <button type="submit" id="post" class="btn">Post Comment</button> </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>

                </div> <!-- end of col-->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-2 -->
    <!-- end of privacy content -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a><i class="fa fa-angle-double-right"></i><span>commentaire</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->
<html lang="en">
<head>
    

    
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-container about">
                        <h4>Few Words About Aria</h4>
                        <p class="white">We're passionate about creating the best mobile apps for personal develop passionate about creating the best mobile apps for. Personal develop passionate about creating the best mobile apps.</p>
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
                                <a class="white" href="commentaire.html">commentaire</a>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-md-2">
                    <div class="text-container">
                        <h4>Tools</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="#your-link">startupguide.com</a>
                            </li>
                            <li>
                                <a class="white" href="terms-conditions.html">Terms & Conditions</a>
                            </li>
                            <li class="media">
                                <a class="white" href="commentaire.html">commentaire</a>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-md-2">
                    <div class="text-container">
                        <h4>Partners</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="#your-link">startupguide.com</a>
                            </li>
                            <li>
                                <a class="white" href="terms-conditions.html">Terms & Conditions</a>
                            </li>
                            <li>
                                <a class="white" href="commentaire.html">commentaire</a>
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
                    <p class="p-small">ranim midouni <a href="https://inovatik.com">groupe</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->

    
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>