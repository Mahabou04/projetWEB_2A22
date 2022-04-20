<?php
    include_once '../Model/reservation.php';
    include_once '../Controller/reservationC.php';

    $error = "";

    // create reservation
    $reservation = null;
    $message=null;
    // create an instance of the controller
    $reservationC = new reservationC();
    if (
		isset($_POST["id_user"]) &&		
        isset($_POST["nom_hotel"]) &&
		isset($_POST["duree"]) && 
        isset($_POST["nbr"]) && 
        isset($_POST["date"]) &&
        isset($_POST["temps"])
    ) {
        if (
			!empty($_POST['id_user']) &&
            !empty($_POST["nom_hotel"]) && 
			!empty($_POST["duree"]) && 
            !empty($_POST["nbr"]) && 
            !empty($_POST["date"]) &&
            !empty($_POST["temps"])
        ) {
            
            $reservation = new Reservation(
				$_POST['id_user'],
                $_POST['nom_hotel'], 
				$_POST['duree'],
                $_POST['nbr'],
                $_POST['date'] . " " . $_POST['temps']
            );
            $reservationC->modifierreservation($reservation,$_GET["id"]);
            header('Location:afficherReservation.php');
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
				$reservation = $reservationC->recupererreservation($_GET['id'],'id');
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
                                <h1 class="h4 text-gray-900 mb-4">Modifier reservation</h1>
                            </div>
                            <div class="form-group row">
                            <div id="error">
                    <?php echo $error; ?>
                        </div>
                        </div>
			
                            <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" name="id_user" id="id_user"
                                        value="<?php echo $reservation['id_user']; ?>"  max="999" placeholder="Id_user"
                                        onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="nom_hotel"
                                        value="<?php echo $reservation['nom_hotel'];?>" max="999" name="nom_hotel"  placeholder="nom_hotel"
                                        >
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user"
                                        name="duree" value="<?php echo $reservation['duree'];?>"  max="12" id="duree" placeholder="Duree(mois)"
                                        onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user"
                                       name="nbr"  value="<?php echo $reservation['nbr'];?>" max="10" id="nbr" placeholder="Nombre de personnes"
                                       onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="date" class="form-control form-control-user" id="date"
                                    name="date" value="<?php $date = new DateTime($reservation['date']);
                                    echo $result = $date->format('Y-m-d');?>" placeholder="Date">
                                        </div>
                                        <div class="col-sm-6">
                                    <input type="time" class="form-control form-control-user" id="temps"
                                    name="temps" value="<?php $date = new DateTime($reservation['date']);
                                    echo $result = $date->format('H:i:s');?>" placeholder="Temps">
                                        </div>

                                </div>
                                <!-- <a href="http://localhost/projetWEB_2A22/view/afficherReservation.php" class="btn btn-primary btn-user btn-block">
                                   
                                </a> -->
                                <input type="submit" value=" Modifer reservation" class="btn btn-primary btn-user btn-block"> 
                            </form>
                            <hr>
                            <div class="text-center">
    <a class="small" href="afficherReservation.php">Retour à la liste des reservation</a>
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