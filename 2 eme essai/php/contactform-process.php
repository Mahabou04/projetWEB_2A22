
<?php
//include_once '../config.php';

//include_once '../php/reclamation.php';
    
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
            header('Location:index.html');
            //echo 'inserted succefull';
        }
        else
            $error = "Missing information";
    }

    
?>




