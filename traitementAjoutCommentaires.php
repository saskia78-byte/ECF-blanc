<?php
$bdd = new PDO('mysql:host=localhost;dbname=links;charset=utf8', 'root', '');

$requete = $bdd->prepare("INSERT INTO link_comment (login, commentaire, date_, heure, id_link)
    VALUES (:login, :commentaire, CURDATE(), CURTIME(), :id)");
$requete->bindValue(':login', $_GET['login'], PDO::PARAM_STR);
$requete->bindValue(':commentaire', $_GET['commentaire'], PDO::PARAM_STR);
$requete->bindValue(':id', $_GET['id_link'], PDO::PARAM_INT);

$requete->execute();

echo "Commentaire ajouté !<br>";
echo "<a href='commentairesLien.php?id_link=".$_GET['id_link']."'>Retour au lien</a>";
