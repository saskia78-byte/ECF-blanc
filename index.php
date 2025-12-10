
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Accueil</title>
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
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=links;charset=utf8', 'root', '');
                $sql = "SELECT l.id_link, l.titre, l.description, l.url, l.date_, COUNT(c.id_comment) AS nbCommentaires FROM link l LEFT JOIN link_comment c ON l.id_link = c.id_link GROUP BY l.id_link ORDER BY l.date_ DESC";
                $requete = $bdd->prepare($sql);
                $requete->execute();
                $links = $requete->fetchAll();
                foreach ($links as $link) {
                    echo "<div>";
                    echo "<h2>".$link['titre']."</h2>";
                    echo "<p>".$link['description']."</p>";
                    echo "<a href='".$link['url']."'>".$link['url']."</a>";
                    echo "<p>Publié le : ".$link['date_']."</p>";
                    echo "<p>
                        <a href='commentairesLien.php?id_link=".$link['id_link']."'>
                        ".$link['nbCommentaires']." commentaire(s).
                        </a>
                        </p>";
                    echo "</div><hr>";
                }
                ?>
            </div>
            <div class="connexion">
                <a href="deconnexion.php">Se déconnecter</a>/<a href="formulaireAuthentification.php">Se connecter</a>
            </div>
        </div>
    </div>
    </main>
</body>
</html>