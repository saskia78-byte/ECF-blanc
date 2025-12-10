<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: formulaireAuthentification.php");
    exit;
}
?>

<form method="GET" action="destinationCreation.php">
    <input type="date" name="date" placeholder="date" id="date"><br>
    <input type="text" name="description" placeholder="description"><br>
    <input type="text" name="titre" placeholder="titre"><br>
    <input type="text" name="url" placeholder="url"><br>
    <input type="submit" value="Envoyer">
</form>