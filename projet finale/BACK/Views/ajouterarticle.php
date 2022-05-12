<?php
    //include '../Article.php';
    include '../Controller/ArticleC.php';

    $error = "";

    // create article
    $article = null;

    // create an instance of the controller
    $articleC = new ArticleC();
    if (
        isset($_POST["id_article"]) &&
		isset($_POST["titre"]) &&		
        isset($_POST["contenu"]) 
		)
    {
        if (
            !empty($_POST["id_article"]) && 
			!empty($_POST['titre']) &&
            !empty($_POST["contenu"]) && 
            !empty($_FILES["photo"]["name"])
        ) {
            $fileName = basename($_FILES["photo"]["name"]); 
            $fileType = pathinfo($fileName,PATHINFO_EXTENSION); 
            $image = $_FILES['photo']['tmp_name']; 
            $imgContent = file_get_contents($image); 
            $article = new Article(
                $_POST['id_article'],
				$_POST['titre'],
                $_POST['contenu'], 
				$imgContent);
               
            $articleC->ajouterarticle($article);
            header('Location:afficherListearticle.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">ajouter un article</h1>
                                    </div>
                                    <div id="error">
            <?php echo $error; ?>
        </div>
                                    <form action="" method="POST"enctype="multipart/form-data" class="user" >
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user"
                                                name="id_article" id="id_article" aria-describedby="id_articleHelp"
                                                placeholder="Entrer id de l'article ...">
                                        </div>
                                        
                                        <form class="user">
                                            <div class="form-group"enctype="multipart/form-data" >
                                                <input type="text" class="form-control form-control-user"
                                                name="titre" id="titre" aria-describedby="titreHelp"
                                                    placeholder="Enter le titre...">
                                            </div>
                                      
                                           
                                                
                                                    
                                                        <form class="user"enctype="multipart/form-data" >
                                                            <div class="form-group">
                                                                <input type="text" class="form-control form-control-user"
                                                                name="contenu" id="contenu" aria-describedby="contenuHelp"
                                                                    placeholder="le contenu...">
                                                            </div>
                                                            <form class="user"enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <input type="file" class="form-control form-control-user"
                                                                    name="photo" id="photo"aria-describedby="photoHelp"
                                                                    accept="image/png, image/jpeg">
                                                                </div>
                                                                <td>
                        <input id="Confirm"  class="form-control form-control-user" type="submit" value="ajouter article"> 
                    </td>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="http://localhost/projet/CRUD/Views/afficherListearticle.php">Retour </a>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>