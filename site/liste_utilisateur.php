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
<title> Liste des utilisateurs </title>
<link rel="stylesheet" media="screen" href="style/style.css">
</head>
<?php 
require 'header.php'; 
?>
<body> 
    <h2> Recherche d'un utilisateur </h2>
     <form method="POST" action="listeutilisateur.php">
     <fieldset>
        Adresse mail de l'utilisateur : </strong><input name="adressemail"><br>
        <br><input name="listeutilisateur" type="submit" value="Rechercher"/>
    </fieldset>
    </form>
</body>
</html>