<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: formulaireAuthentification.php");
    exit;
}
?>
<?php
$bdd= new PDO('mysql:host=localhost;dbname=links;charset=utf8', 'root', '');
if(!empty($_GET['date']) && !empty($_GET['description']) && !empty($_GET['titre']) && !empty($_GET['url'])){
    $requete= $bdd-> prepare('INSERT INTO link (date_, description, titre, url) VALUES (:date, :description, :titre, :url)');
    $requete-> bindValue(':date', $_GET['date'], PDO::PARAM_STR);
    $requete-> bindValue(':description', $_GET['description'], PDO::PARAM_STR);
    $requete-> bindValue(':titre', $_GET['titre'], PDO::PARAM_STR);
    $requete-> bindValue(':url', $_GET['url'], PDO::PARAM_STR);
    $requete-> execute();
    echo "<p>Lien ajouté avec succès!</p>".
    "<p><a href='index.php'>Retour à la page d'accueil</a></p>";
}else{
    echo "<p>Formulaire incomplet.</p>".
    "<p><a href='formulaire.php'>Retour au formulaire</a></p>";
}
?>