<?php
session_start();
if(!isset($_SESSION["nom"]))
{
    header("Location: index.php");
    exit(); 
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF8" />
<title> Validation produits </title>
<link rel="stylesheet" media="screen" href="style/style.css">
</head>
<body> 
    <ul>
        <li> <a href="index.php">Connexion</a> </li>
        <li> <a href="Distributeur.php">Accueil</a> </li>
        <li> <a href="Produit.php">Les Produits</a> </li>
        <li> <a href="Demande_produit.php">Demande de produit</a> </li>
        <li> <a href="liste_utilisateur.php">Liste des Utilisateurs</a></li>
        <li> <a href="validation_produit.php">Validation des Produits</a></li>
    </ul>
    <h1>Distributics</h1>
    <h2>Page d'accueil mgl.</h2>

</body>
</html>