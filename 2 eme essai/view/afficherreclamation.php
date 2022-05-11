<?php
	include '../controller/reclamationC.php';
    
    
	$reclamationC=new reclamationC();
	$listereclamation=$reclamationC->afficherreclamation(); 
    

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

            <!-- Nav Item - reservation -->
            <li class="nav-item">
                <a class="nav-link" href="ajouterreclamation.php" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span > reclamation</span></a>
            </li>
             <!-- Nav Item - ticket -->
             <!-- Nav Item - ticket -->
             <li class="nav-item">
                <a class="nav-link" href="affichermessage.php" >
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span >message</span></a>
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
                   
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>contact</th>
                                            <th>type</th>
                                            <th>destinataire</th>
                                            <th>statut</th>
                                            <th>description</th>
                                        </tr>
                                </thead>
                                    <?php
				foreach($listereclamation as $reclamation){
			?>
			<tr>
				<td><?php echo $reclamation['id']; ?></td>
				<td><?php echo $reclamation['contact']; ?></td>
				<td><?php echo $reclamation['type']; ?></td>
				<td><?php echo $reclamation['destinataire']; ?></td>
				<td><?php echo $reclamation['statut']; ?></td>
				<td><?php echo $reclamation['description']; ?></td>
				<td>
                <a href="modifierreclamation.php?id=<?php echo $reclamation['id']; ?>">Modifier</a>
				</td>
				<td>
					<a href="supprimerreclamation.php?id=<?php echo $reclamation['id']; ?>">Supprimer</a>
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
                    <form action="pdf.php" method="POST">
                    <button type="submit" class="btn btn-success" name="btn_pdf">PDF</button>
                    </form>
                   

                    
                    <a href="http://localhost/2%20eme%20essai/view/ajouterreclamation.php" class="btn btn-primary ">
                                    Ajouter reclamation
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