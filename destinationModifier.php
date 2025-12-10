<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: formulaireAuthentification.php");
    exit;
}
?>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=links;charset=utf8', 'root', '');

$requete = $bdd->prepare(" UPDATE link SET date_ = :date, description = :description, titre = :titre, url = :url WHERE id_link = :id");
$requete -> bindValue(':id', $_GET['id_link'], PDO::PARAM_INT);
$requete -> bindValue(':date', $_GET['date'], PDO::PARAM_STR );
$requete -> bindValue(':description', $_GET['description'], PDO::PARAM_STR);
$requete -> bindValue(':titre', $_GET['titre'], PDO::PARAM_STR);
$requete -> bindValue(':url', $_GET['url'], PDO::PARAM_STR);
$requete->execute();

echo "Mise à jour réussie !<br>";
echo "<a href='backoffice.php'>Retour</a>";
