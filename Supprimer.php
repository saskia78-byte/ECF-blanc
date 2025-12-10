<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: formulaireAuthentification.php");
    exit;
}
?>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=links;charset=utf8', 'root', '');
if (!empty($_GET['id_link'])) {

    $requete = $bdd->prepare("DELETE FROM link WHERE id_link = :id");
    $requete->bindValue(':id', $_GET['id_link'], PDO::PARAM_INT);
    if ($requete->execute(array('id'=> $_GET['id_link']))) {
        echo "Lien supprimé avec succès !<br>";
        echo "<a href='index.php'>Retour</a>";
    } else {
        echo "Erreur lors de la suppression.";
    }
} else {
    echo "Aucun ID fourni.";
}
?>
