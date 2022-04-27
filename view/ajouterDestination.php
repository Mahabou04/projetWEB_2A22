<?php
    include_once '../Model/destination.php';
    include_once '../Controller/destinationC.php';
    
    $error = "";

    // create destination
    $destination = null;
    $message=null;
    $ajout=[];
    // create an instance of the controller
    $destinationC = new destinationC();
    if (
        isset($_POST["arrive"]) &&
        isset($_POST["date_limite"]) &&
        isset($_POST["nom_hotel"]) &&
		isset($_POST["place"]) &&		
        isset($_POST["prix"]) 
		
    ) {
        if (
            !empty($_POST["arrive"]) &&
            !empty($_POST["date_limite"]) &&
            !empty($_POST["nom_hotel"]) &&
			!empty($_POST['place']) &&
            !empty($_POST["prix"]) 
			
        ) {
            $destination = new destination(
                $_POST["arrive"],
                $_POST["date_limite"],
                $_POST['prix'],
                $_POST["nom_hotel"],
				$_POST['place']
              
            );
            $ajout=$destinationC->ajouterdestination($destination);
                header('Location:afficherdestination.php');
          
       
       
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
                                <h1 class="h4 text-gray-900 mb-4">Ajouter destination</h1>
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
                                      
                                    <input type="text" class="form-control form-control-user" name="arrive" id="arrive"
                                            placeholder="arrive" maxlength="20"
                                           
                                            >
                                    </div>
                                    </div>
                                    <div class="form-group row"> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      
                                    <input type="date" class="form-control form-control-user" name="date_limite" id="date_limite"
                                            placeholder="date limite" 
                                           
                                            >
                                    </div>
                                    </div>
                                    <div class="form-group row"> 
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="prix"
                                       name="prix"  placeholder="prix"
                                       onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'"
                                       >
                                    </div>
                                    </div>
                                
                                    <div class="form-group row"> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      
                                    <input type="text" class="form-control form-control-user" name="nom_hotel" id="nom_hotel"
                                            placeholder="nom hotel" max="999"
                                           
                                            >
                                    </div>
                                    </div>
                                    <div class="form-group row"> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      
                                    <input type="number" class="form-control form-control-user" name="place" id="place"
                                            placeholder="place" max="999"
                                           
                                            >
                                    </div>
                                    </div>
                             

                                
                                <!-- <a href="http://localhost/projetWEB_2A22/view/afficherdestination.php" class="btn btn-primary btn-reservation btn-block">
                                   
                                </a> -->
                                <input type="submit" value=" Ajouter destination" class="btn btn-primary btn-reservation btn-block"> 
                            </form>
                            <hr>
                            <div class="text-center">
    <a class="small" href="afficherdestination.php">Retour à la liste des destination</a>
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