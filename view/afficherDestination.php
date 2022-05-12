<?php
	include '../controller/destinationC.php';
	$destinationC=new destinationC();
	$listedestinations=$destinationC->afficherdestinations(); 
    if(isset($_POST["recherche"]) && isset($_GET["recherche"]))
    {
        if(!empty($_POST["recherche"]) && !empty($_GET["recherche"]) )
            {
            
                
                $listedestinations=$destinationC->filtredestination($_POST["recherche"],$_GET["recherche"]);
                if(empty($listedestinations)){
                    $listedestinations=[];  
                }
                
            }
            else
            $listedestinations=$destinationC->afficherdestinations();
                
              
        
    } 
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - destination -->
            <li class="nav-item">
                <a class="nav-link" href="afficherReservation.php" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Reservation</span></a>
            </li>
             <!-- Nav Item - destination -->
             <li class="nav-item">
                <a class="nav-link" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Destination</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherHotel.php" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Hotel</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherReclamationBack.php" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Reclamation</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="afficherArticleBack.php" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Article</span></a>
            </li>
            <!-- Nav Item - destination -->
            <li class="nav-item">
                <a class="nav-link" href="afficherStatistique.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Statistique</span></a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <div class="dropdown mb-2">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <?php 
                                            if(isset($_GET["recherche"]))
                                            {
                                                echo "Recherche par ".$_GET['recherche'];
                                            }
                                            else {
                                                echo "Recherche par";
                                            }
                                           
                                            ?>
                                        </button>
                                        <div class="dropdown-menu animated--fade-in"
                                            aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="afficherdestination.php?recherche=<?php echo "id"; ?>" >id</a>
                                            <a class="dropdown-item" href="afficherdestination.php?recherche=<?php echo "arrive"; ?>" >arrive</a>
                                            <a class="dropdown-item" href="afficherdestination.php?recherche=<?php echo "date_limite"; ?>" >date_limite</a>
                                            <a class="dropdown-item" href="afficherdestination.php?recherche=<?php echo "prix"; ?>" >prix</a> 
                                            <a class="dropdown-item" href="afficherdestination.php?recherche=<?php echo "nom_hotel"; ?>" >nom_hotel</a>
                                            <a class="dropdown-item" href="afficherdestination.php?recherche=<?php echo "place"; ?>" >nombre de place</a> 
                                        </div>
                                    </div>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search " method='POST'>
                        <div class="input-group">
                        <?php 
                            if(isset($_GET['recherche']) && $_GET['recherche']=="date_limite"){
                                echo '<input type="date" class="form-control bg-light border-0 small" 
                                name="recherche" aria-label="Search" aria-describedby="basic-addon2">';
                            }
                            else 
                            echo ' <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..."
                            name="recherche" aria-label="Search" aria-describedby="basic-addon2">';
                                ?>
                           
                               <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" value="Rechercher" >
                                
                               
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                         

                      
                          
                       

                     
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des destinations</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Arrive</th>
                                            <th>Date_limite</th>
                                            <th>Prix</th>
                                            <th>Nom hotel</th>
                                            <th>Nombre de place</th>
                                        </tr>
                                </thead>
                                    <?php
				foreach($listedestinations as $destination){
			?>
			<tr>
				<td><?php echo $destination['id']; ?></td>
				<td><?php echo $destination['arrive']; ?></td>
                <td><?php echo $destination['date_limite']; ?></td>
				<td><?php echo $destination['prix']; ?></td>
                <td><?php echo $destination['nom_hotel']; ?></td>
                <td><?php echo $destination['place']; ?></td>
				<td>
                <a href="modifierdestination.php?id=<?php echo $destination['id']; ?>">Modifier</a>
				</td>
				<td>
					<a href="supprimerdestination.php?id=<?php echo $destination['id']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a href="http://localhost/projetWEB_2A22/view/ajouterdestination.php" class="btn btn-primary ">
                                    Ajouter destination
</a>
                </div>
                <!-- /.container-fluid -->
               
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    

    
                 
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugins -->
    <!-- <script src="../assets/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables/dataTables.bootstrap4.min.js"></script> -->
    <!-- Custom scripts for all pages-->
    <!-- <script src="js/sb-admin-2.min.js"></script> -->

</body>

</html>