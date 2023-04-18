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
<title> Liste des utilisateurs </title>
<link rel="stylesheet" media="screen" href="style/style.css">
</head>
<body> 
    <ul>
        <li> <a href="index.php">Accueil</a> </li>
        <li> <a href="Distributeur.php">Les Distributeurs</a> </li>
        <li> <a href="Produit.php">Les Produits</a> </li>
        <li> <a href="Demande_produit.php">Demande de produit</a> </li>
        <li> <a href="liste_utilisateur.php">Liste des Utilisateurs</a></li>
        <li> <a href="validation_produit.php">Validation des Produits</a></li>
    </ul>
    <h1>DISTRIBUTICS</h1>
    <h2> Recherche d'un utilisateur </h2>
     <form method="POST" action="listeutilisateur.php">
     <fieldset>
        Adresse mail de l'utilisateur : </strong><input name="adressemail"><br>
        <br><input name="listeutilisateur" type="submit" value="Rechercher"/>
    </fieldset>
    </form>
</body>
</html>