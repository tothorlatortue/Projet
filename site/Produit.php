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
<title> Produit </title>
<link rel="stylesheet" media="screen" href="style/style.css">
</head>
<?php 
require 'header.php'; 
?>
<body>
    <h2>LISTE DES PRODUITS.</h2>

    <h3>TEST COULEUR</h3>
</body>
</html>