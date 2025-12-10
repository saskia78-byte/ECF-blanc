
<?php
$bdd = new PDO('mysql:host=localhost;dbname=links;charset=utf8', 'root', '');
$id_link = $_GET['id_link'];

$requeteLink = $bdd->prepare("SELECT * FROM link WHERE id_link = :id");
$requeteLink->execute(['id' => $id_link]);
$link = $requeteLink->fetch(PDO::FETCH_ASSOC);

$requeteComments = $bdd->prepare("SELECT * FROM link_comment WHERE id_link = :id ORDER BY date_ ASC, heure ASC");
$requeteComments->execute(['id' => $id_link]);
$commentaires = $requeteComments->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Commentaires lien</title>
</head>
    <body>
        <header>
            <h1>SHARE MY LINKS</h1>
        </header>

        <main>
            <p><a href="index.php">HOME</a> / <?= $link['titre'] ?></p>

            <h2><?= $link['titre'] ?></h2>
            <p><?= $link['description'] ?></p>
            <a href="<?= $link['url'] ?>"><?= $link['url'] ?></a>
            <p>Publié le : <?= $link['date_'] ?></p>

            <hr>

            <h3>Commentaires</h3>

            <?php if (count($commentaires) > 0): ?>
                
                <?php foreach ($commentaires as $com): ?>
                    <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
                        <p><?= $com['commentaire'] ?></p>
                        <p><em>Publié par <?= $com['login'] ?> le <?= $com['date_'] ?> à <?= $com['heure'] ?></em></p>
                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <p>Aucun commentaire pour ce lien.</p>
            <?php endif; ?>

            <p>
                <a href="ajoutCommentaire.php?id_link=<?= $id_link ?>">Ajouter un commentaire</a>
            </p>

            <div class="connexion">
                <a href="deconnexion.php">Se déconnecter</a>/<a href="formulaireAuthentification.php">Se connecter</a>
            </div>

        </main>

    </body>
</html>
