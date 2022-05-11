<?php
    include_once '../modal/message.php';
    include_once '../controller/messageC.php';

    $error = "";

    // create ticket
    
    $message=null;
    // create an instance of the controller
    $messageC = new messageC();
    if (
		isset($_POST["id_reclamation"]) &&		
        isset($_POST["text"]) 
		
    ) {
        if (
			!empty($_POST['id_reclamation']) &&
            !empty($_POST["text"]) 
			
        ) {
            
            $message = new message(
				$_POST['id_reclamation'],
                $_POST['text']
            );
            $messageC->modifiermessage($message,$_GET['id']);
            header('Location:affichermessage.php');
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

        <hr>
        
        
			
		<?php
			if (isset($_GET['id'])){
				$message = $messageC->recuperermessage($_GET['id'],"id");
            }
				
		?>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Modifier message</h1>
                            </div>
                            <div class="form-group row">
                            <div id="error">
                    <?php echo $error; ?>
                        </div>
                        </div>
                            <form class="user" method="POST">
                            <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" name="id_reclamation" id="id_reclamation"
                                        value="<?php echo $message['id_reclamation']; ?>" max="999" placeholder="id_reclamation"
                                        >
                                    </div>
                             </div>
                             <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="text"
                                        value="<?php echo $message['text']; ?>" name="text"  placeholder="text"
                                        >
                                   
                                </div>
                                </div>
                               
                                
                                <!-- <a href="http://localhost/projetWEB_2A22/view/afficherticket.php" class="btn btn-primary btn-user btn-block">
                                   
                                </a> -->
                                <input type="submit" value=" Modifer message" class="btn btn-primary btn-user btn-block"> 
                            </form>
                            <hr>
                            <div class="text-center">
    <a class="small" href="affichermessage.php">Retour à la liste des message</a>
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