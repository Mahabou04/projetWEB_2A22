<?php
    include_once '../Controller/commentaire.php';
    include_once '../Controller/commentaireC.php';

    $error = "";

    // create commentaire
    $commentaire = null;

    // create an instance of the controller
    $commentaireC = new commentaireC();
    if (
        isset($_POST["id_commentaire"]) &&
		isset($_POST["id_article"]) &&		
        isset($_POST["nom"]) &&
		isset($_POST["email"]) && 
        isset($_POST["comments"]) 
       // isset($_POST["date"])
    ) {
        if (
            !empty($_POST["id_commentaire"]) && 
			!empty($_POST['id_article']) &&
            !empty($_POST["nom"]) && 
			!empty($_POST["email"]) && 
            !empty($_POST["comments"]) 
            //!empty($_POST["date"])
        ) {
            $commentaire = new commentaire(
                $_POST['id_commentaire'],
				$_POST['id_article'],
                $_POST['nom'], 
				$_POST['email'],
                $_POST['comments']
               // $_POST['date']
            );
            $commentaireC->modifiercommentaire($commentaire, $_GET["id_commentaire"]);
            header('Location:afficherListecommentaire.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherListecommentaire.php">Retour à la liste des commentaires</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_GET['id_commentaire'])){
				$commentaire = $commentaireC->recuperercommentaire($_GET['id_commentaire']);
            
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_commentaire">identifiant de commentaire:
                        </label>
                    </td>
                    <td><input type="text" name="id_commentaire" id="id_commentaire" value="<?php echo $commentaire['id_commentaire']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="id_article">id_article:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="id_article" value="<?php echo $commentaire['id_article']; ?>" id="id_article">
                    </td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $commentaire['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Adresse mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php echo $commentaire['email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="comments">comments:
                        </label>
                    </td>
                    <td><input type="text" name="comments" id="comments" value="<?php echo $commentaire['comments']; ?>" maxlength="20"></td>
                </tr>
                
               
               <!-- <tr>
                    <td>
                        <label for="date">Date :
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date" id="date" value="<?php// echo $commentaire['date']; ?>">
                    </td>
                </tr>    -->          
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>