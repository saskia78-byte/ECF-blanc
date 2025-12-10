<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: formulaireAuthentification.php");
    exit;
}
?>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=links;charset=utf8', 'root', '');
$id = $_GET['id_link'];

$requete = $bdd->prepare("SELECT * FROM link WHERE id_link = :id");
$requete->execute(['id' => $id]);
$link = $requete->fetch(PDO::FETCH_ASSOC);

?>

<form action="destinationModifier.php" method="GET">
    <input type="hidden" name="id_link" value="<?php echo $id ?>">

    <input type="date" name="date" value="<?php echo $link['date_'] ?>">
    <br>

    <input type="text" name="titre" value="<?php echo $link['titre'] ?>">
    <br>

    <input type="text" name="description" value="<?php echo $link['description'] ?>">
    <br>

    <input type="text" name="url" value="<?php echo $link['url'] ?>">
    <br>

    <input type="submit" value="Mettre à jour">
</form>
