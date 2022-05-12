<?php
	include '../Controller/CommentaireC.php';
	$CommentaireC=new CommentaireC();
	$listecommentaires=$CommentaireC->affichercommentaires(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajoutercommentaire.php">Ajouter un commentaire</a></button>
		<center><h1>Liste des commentaires</h1></center>
		<table border="1" align="center">
			<tr>
				<th>id_commentaire</th>
				<th>id_article</th>
				<th>nom</th>
				<th>email</th>
				<th>comments</th>
				<th>Date</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listecommentaires as $Commentaire){
			?>
			<tr>
				<td><?php echo $Commentaire['id_commentaire']; ?></td>
				<td><?php echo $Commentaire['id_article']; ?></td>
				<td><?php echo $Commentaire['nom']; ?></td>
				<td><?php echo $Commentaire['email']; ?></td>
				<td><?php echo $Commentaire['comments']; ?></td>
				<td><?php echo $Commentaire['date']; ?></td>
				<td>
				<a href="modifiercommentaire.php?id_commentaire=<?php echo $Commentaire['id_commentaire']; ?>">Modifier</a>
				</td>
				<td>
					<a href="supprimercommentaire.php?id_commentaire=<?php echo $Commentaire['id_commentaire']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
