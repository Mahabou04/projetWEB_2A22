<?php
    include_once '../modal/reclamation.php';
    include_once '../controller/reclamationC.php';

    $error = "";

    // create adherent
    $reclamation = null;

    // create an instance of the controller
    $reclamationC = new reclamationC();
    if (
        isset($_POST["contact"]) &&
		isset($_POST["type"]) &&		
        isset($_POST["destinataire"]) &&
		isset($_POST["statut"]) && 
        isset($_POST["description"])  
        
    ) {
        if (
            !empty($_POST["contact"]) && 
			!empty($_POST["type"]) &&
            !empty($_POST["destinataire"]) && 
			!empty($_POST["statut"]) && 
            !empty($_POST["description"]) 
            
        ) {
            $reclamation = new reclamation(
                $_POST['contact'],
				$_POST['type'],
                $_POST['destinataire'], 
				$_POST['statut'],
                $_POST['description']
                
            );
            $reclamationC->ajouterreclamation($reclamation);
            header('Location:afficherreclamation.php');
            //echo 'inserted succefull';
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Ajouter reclamation</h1>
                            </div>
                            <div class="form-group row">
                            <div id="error">
                    <?php echo $error; ?>
                        </div>
                        </div>
                            <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="contact" id="contact"
                                            placeholder="contact :" max="999" 
                                            >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="type"
                                       name="type"  placeholder="type :" max="999"
                                       
                                       >
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                        name="destinataire"   id="destinataire" placeholder="destinataire"  
                                        
                                        >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                       name="statut" id="statut" placeholder="statut :" 
                                       
                                       >
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="description"
                                    name="description" placeholder="description :">
                                        </div>
                                        

                                </div>
                                <!-- <a href="http://localhost/projetWEB_2A22/view/afficherReservation.php" class="btn btn-primary btn-user btn-block">
                                   
                                </a> -->
                                
                                <input type="submit" value=" Ajouter reclamation" class="btn btn-primary btn-user btn-block"> 
                            </form>
                            <hr>
                            <div class="text-center">
    <a class="small" href="afficherreclamation.php">Retour à la liste des reclamation</a>
        </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <!-- <script src="js/sb-admin-2.min.js"></script> -->


</body>

</html>