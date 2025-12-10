
<?php
$bdd = new PDO('mysql:host=localhost;dbname=links;charset=utf8', 'root', '');

if (!isset($_GET['id_link'])) {
    die("Aucun lien sélectionné.");
}

$id_link = $_GET['id_link'];

$requete = $bdd->prepare("SELECT * FROM link WHERE id_link = :id");
$requete->execute(['id' => $id_link]);
$link = $requete->fetch(PDO::FETCH_ASSOC);

if (!$link) {
    die("Lien introuvable.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">>
    <title>Ajouter un commentaire</title>
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
                <p>
                    <a href="index.php">HOME</a> /
                    <a href="commentairesLien.php?id_link=<?= $id_link ?>"><?= $link['titre'] ?></a> /
                    ajouter un commentaire
                </p>
                <h2>Ajouter un commentaire sur :<br> <?= $link['titre'] ?></h2>
                <p>
                    <a href="<?= $link['url'] ?>" target="_blank"><?= $link['url'] ?></a>
                </p>

                <form method="get" action="traitementAjoutCommentaires.php">
                    <input type="hidden" name="id_link" value="<?= $id_link ?>">
                    <p>
                        <label>Pseudo (*) :</label><br>
                        <input type="text" name="login" required>
                    </p>
                    <p>
                        <label>Commentaire :</label><br>
                        <textarea name="commentaire" required></textarea>
                    </p>
                    <button type="submit">PUBLIER</button>
                </form>
                <div class="connexion">
                    <a href="deconnexion.php">Se déconnecter</a>/<a href="formulaireAuthentification.php">Se connecter</a>
                </div>
            </div>
        </main>
    </body>
</html>


