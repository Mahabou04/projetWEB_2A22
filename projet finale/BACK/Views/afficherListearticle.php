<?php
	include '../Controller/articleC.php';
	$articleC=new ArticleC();
    $listeArticles=$articleC->afficherarticle(); 


    //pagination
    //count nbarticle
    $connection = config::getConnexion();
    $sql = 'SELECT count(id_article) as cpt  FROM article';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $nbrarticle = $statement->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['page'])){
    $page=(int)$_GET['page'] ;
    }else{
    $page=1;
    }
    $nbr_ele_par_page=3;
    $nbr_page=ceil($nbrarticle[0]['cpt']/$nbr_ele_par_page);
    $debut=$nbr_ele_par_page*($page-1);
    
    
    $sql = 'SELECT * FROM article LIMIT :debut,:nbr_ele_par_page; ';
    $statement = $connection->prepare($sql);
    $statement->bindValue(':debut' ,$debut , PDO::PARAM_INT);
    $statement->bindValue(':nbr_ele_par_page' , $nbr_ele_par_page , PDO::PARAM_INT);
    
    
    
    $statement->execute();
    $listeArticles = $statement->fetchAll(PDO::FETCH_OBJ);
  
  


















//***********************stat******************** */
    $titre=new ArticleC();
    $titr=$titre->affichertitre(); 
  
    $tit=$_POST['tit'] ?? '';
  
    if($tit){
      $pdo = config::getConnexion();
              $query = $pdo -> prepare('SELECT count(id_commentaire) as cpt FROM commentaire WHERE id_article = :tit');
        
              $query -> execute(['tit' => $tit]);
          $nbr= $query-> fetchAll(PDO::FETCH_ASSOC);
        
  
      
  
    }
    /* count commentaires*/
    $pdo = config::getConnexion();
    $query = $pdo -> prepare('SELECT count(id_article) as cpt FROM article ');
        

$nbrar= $query-> fetchAll(PDO::FETCH_ASSOC);
    $query = $pdo -> prepare('SELECT count(id_commentaire) as cpt FROM commentaire ');
   
    $query -> execute();
$nbrcomm= $query-> fetchAll(PDO::FETCH_ASSOC);
/* count articles */

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Statistique</title>

    <!-- Custom fonts for this template -->
    <link href="all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="ajouterarticle.php">Ajouter</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
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
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ranim Midouni</span>
                               
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"> Statistique</h1>
                    <form action="" method="POST">
                    <select name="tit" id="">
              <?php
				foreach($titr as $ti) {
          ?>
     <option value="<?php echo $ti['id_article']; ?>"><?php echo $ti['titre']; ?></option>
     <?php  }?>
     

     
              </select>
              <div class="row">
              <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Le nombre des commentaires par  article </div>
                                                <?php
         if(isset($nbr)){ ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbr[0]["cpt"]; ?></div>
                                            <?php  };?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Le nombre des commentaires  </div>
                                                <?php
                                if(isset($nbrcomm)){ ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrcomm[0]["cpt"]; ?></div>
                                            <?php  };?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Le nombre des articles  </div>
                                                <?php
                                if(isset($nbrarticle)){ ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrarticle[0]["cpt"]; ?></div>
                                            <?php  };?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>

                        
                        <button type="submit"class="btn btn-small btn-primary">Statistique</button>

        

              </form>


             <br>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PDF genération</h6>
                            <br>
                            <a href="genpdf.php" class="btn btn-small btn-primary">PDF</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <br>
                           <a href="recherche.php"class="btn btn-small btn-primary">recherche</a>
                            <br>
                            <br>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id_article</th>
                                            <th>titre</th>
                                            <th>contenu</th>
                                            <th>photo</th>
                                            
                                            <th>Action</th>
                                           
                                            <th>Commentaires</th>

                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id_article</th>
                                            <th>titre</th>
                                            <th>contenu</th>
                                            
                                            <th>photo</th>
                                            <th>Actionr</th>
                                          
                                            <th>Commentaires</th>
                                        </tr>

                                    </tfoot>
                                    <tbody>
									<?php
				foreach($listeArticles as $article){
			?>
                                        <tr>
										<td><?=$article->id_article ?></td>
				<td><?=$article->titre ?></td>
				<td><?=$article->contenu ?></td>
			
                <td><img style="width: 500px; height: 250px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($article->photo); ?>" ></td>
                                            <td class="align-middle">
                                                <form method="POST" action="modifierarticle.php?id_article=<?=$article->id_article ?>">
                                                  <input class="btn bg-gradient-primary mt-4 w-100"  type="submit" name="Modifier" value="Modifier"         >
                                                  <input type="hidden" value=<?=$article->id_article ?> >
                                                  <a class="btn bg-gradient-primary mt-4 w-100"   href="supprimerarticle.php?id_article=<?=$article->id_article ?>">Supprimer</a>
                                              </form>
                                              </td>
                                              
                                         
                                          
                                        <!--  <td>
                                            
                                       <?php
                                     /*  $id=$article['id_article'];
                                       
                                       $sql="SELECT * FROM commentaire where id_article=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
		    $req->execute();
            $comm = $req->fetchAll(PDO::FETCH_OBJ);*/
      
                                       ?>
                                         <?php //foreach($comm as $pr):?>
                                      <li><?php //$pr->comments ?></li> 
                                       <?php //endforeach;?>
                                          </td>--> 

                                          <td>
                                          <a class="btn bg-gradient-primary mt-4 w-100"  href="afficherListecomm.php?id_article=<?=$article->id_article ?>">VOIR</a>
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
                    
                  
                </form>

                <!--********************************PAGINATION********************************************-->                        
<div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <?php
                                        
                                        for($i=1 ; $i<=$nbr_page ; $i++) : ?>
                                    <li class="page-item "><a class="page-link" style="background-color:orange;color:white;" href="?page=<?= $i?>"><?php echo $i ?></a></li>
                                          <?php  endfor ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>  
    <!--********************************END PAGINATION********************************************-->   
            </div>
        </div>
    </div>
</section>
                </form>
            </div>
            
            </div>
        </div>
    </div>
</section>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>ranim midouni &copy; copyrights</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>