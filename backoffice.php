<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: formulaireAuthentification.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="container">
            <nav class="header-nav">
                <h1>SHARE MY LINKS</h1>
            </nav>
        </div>
    </header>
    <main>
    <div class="main-container">
        <div class="flexbox">
            <div class="corps">
                <a href="formulaireCreation.php">Ajouter un lien</a><br>
                <p class="p">Modifier/Supprimer un link</p>
            </div>
            <?php
                $bdd= new PDO('mysql:host=localhost;dbname=links;charset=utf8', 'root', '');
                $requete= $bdd -> prepare("SELECT  titre, id_link FROM link");
                $requete-> execute();
                foreach($requete as $link) {
                    echo "<p class='titre'>".$link['titre']."</p>
                    <p><a href='formulaireModification.php?id_link=".$link['id_link']."'>Modifier</a>/
                    <a href='Supprimer.php?id_link=".$link['id_link']." ' onclick='return confirm(\"Supprimer cette ville ?\");'>Supprimer</a></p>";
                }
                ?>
            <div class="connexion">
                <a href="deconnexion.php">Admin / Se déconnecter</a>
            </div>
        </div>
    </div>
    </main>
</body>
</html>