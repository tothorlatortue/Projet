<?php
session_start();
if(!isset($_SESSION["username"]))
{
    header("Location: index.php");
    exit(); 
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF8" />
<title> Produit </title>
<link rel="stylesheet" media="screen" href="style/style.css">
</head>
<body>
    <ul>
        <li> <a href="index.php">Accueil</a> </li>
        <li> <a href="Distributeur.html">Les Distributeurs</a> </li>
        <li> <a href="Produit.html">Les Produits</a> </li>
        <li> <a href="Demande_produit.html">Demande de produit</a> </li>
        <li> <a href="liste_utilisateur.html">Liste des Utilisateurs</a></li>
        <li> <a href="validation_produit.html">Validation des Produits</a></li>
</ul> 
    <h1>Distributics</h1>
    <h2>Page d'accueil mgl.</h2>

</body>
</html>