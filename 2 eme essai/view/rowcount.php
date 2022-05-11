<?php
$pdo = new PDO('mysql:host=localhost;dbname=reclamation', 'root', '');
function rowCount($pdo,$query)
{
    $stmt=$pdo->prepare($query);
    $stmt->execute();
    return $stmt->rowCount();
}
$count=rowCount($pdo,"select * from rec ");




?>
<h1> all user =<?php  echo $count ?></h1>