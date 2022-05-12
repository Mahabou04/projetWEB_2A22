<?php
include_once '../controller/hotelC.php';



// create an instance of the controller
$HotelC = new HotelC();
$hotel = $HotelC->recupererhotel($_GET['id']);
$error="";
if (
    isset($_POST["nom"]) &&
    isset($_POST["pays"]) &&
    isset($_POST["etoile"])

) {

    if (
        !empty($_POST["nom"]) &&
        !empty($_POST['pays']) &&
        !empty($_POST["etoile"])

    ) {
        $hotel = new Hotel(
            $_POST['nom'],
            $_POST['pays'],
            $_POST['etoile']

        );
        $HotelC->modifierhotel($hotel,$_GET['id']);
        header('Location:afficherHotel.php');
    } else {
        $error = "Missing information";
    }
}


?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin </title>

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
                                <h1 class="h4 text-gray-900 mb-4">Ajouter hotel</h1>
                            </div>
                            <div class="form-group row">
                            <div id="error">
                            <div>
                              
</div>
                        <?php echo $error; ?>
                        </div>
                        </div>
                            <form class="user" method="POST">
                                 <div class="form-group row"> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      
                                    <input type="text" class="form-control form-control-user" name="nom" id="nom"
                                            placeholder="nom" maxlength="20" value=<?php echo $hotel['nom']?>
                                           
                                            >
                                    </div>
                                    </div>
                                    <div class="form-group row"> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      
                                    <input type="text" class="form-control form-control-user" name="pays" id="pays"
                                            placeholder="pays" maxlength="20" value=<?php echo $hotel['pays']?>
                                           
                                            >
                                    </div>
                                    </div>
                                    <div class="form-group row"> 
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="etoile"
                                       name="etoile"  placeholder="etoile" value=<?php echo $hotel['etoile']?>
                                       onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                                       >
                                    </div>
                                    </div>
                                
                                    
                                    

                                
                                <!-- <a href="http://localhost/projetWEB_2A22/view/afficherhotel.php" class="btn btn-primary btn-reservation btn-block">
                                   
                                </a> -->
                                <input type="submit" value=" Modifier hotel" class="btn btn-primary btn-reservation btn-block"> 
                            </form>
                            <hr>
                            <div class="text-center">
    <a class="small" href="afficherhotel.php">Retour à la liste des hotel</a>
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