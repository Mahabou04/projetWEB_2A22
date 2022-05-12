<?php

//include '../Controller/articleC.php';
$connection = config::getConnexion();
$sql = 'SELECT * FROM article ';
$statement = $connection->prepare($sql);
$statement->execute();
$listeArticles = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <style>
        table{
            width: 100%;
            border-width:1px; 
 border-style:solid; 
 border-color:green;
 
        }
        h1{
            font-family : arial;
            color:black;
        }
        p{
            font-family : arial;
            color:green;
        }
        
        
        td { 
 border-width:1px;
 border-style:solid; 
 border-color:green;
 width:50%;
 }
 .logo{
    margin-left:10px;
    margin-top:5px;
    width:100px;
    length:600px;
 }
    </style>
</head>
<body>  <!--  style="background-image:url('back.jpg');"-->
    <table >
        <th><H1>FLY AWAY TRAVEL</H1></th>
    <th><img class="logo" src="img/logo.png" alt=""></th>
    <th><p style='margin-top:30px;'><?php 
$DateAndTime = date('m-d-Y h:i:s', time());  
echo "The Download PDF date $DateAndTime.";?></p>
      <p></p>
</th>
</table>
    



    

    <h1>Liste des Articles</h1>
    

    <table>
    <tbody>
          <tr>
          <th>id_article</th>
                                            <th>Titre</th>
                                            <th>Contenus</th>
                                            
                                            <th>photo</th>
                                           
                                            <th>Commentaires</th>
         
         
          
          
        </tr>
        <?php
				foreach($listeArticles as $article){
			?>
                                        <tr>
										<td><?=$article->id_article ?></td>
				<td><?=$article->titre ?></td>
				<td><?=$article->contenu ?></td>
				<td><?=$article->photo ?></td>
                                          
                                          
                                        <td>
                                            
                                       <?php
                                       $id=$article->id_article ;
                                       
                                       
                                       $sql="SELECT * FROM commentaire where id_article=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
		    $req->execute();
            $comm = $req->fetchAll(PDO::FETCH_OBJ);
           
      
                                       ?>
                                         <?php foreach($comm as $pr):?>
                                      <li><?= $pr->comments ?></li> 
                                       <?php endforeach;?>
                                          </td>

                                          <?php } ?>
        </tbody>
    </table>
</body>
</html>