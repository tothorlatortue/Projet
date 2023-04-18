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
<title> Distributeur </title>
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
    <h1>Distributics</h1>
    <h2>PAGE DISTRIBUTEURS (ON VA DIRE QUE C'EST L'ACCUEIL PARCE QUE C'EST PLUS SIMPLE).</h2>
    <?php
        echo "<table border>";
        echo "<tr><td align=center bgcolor=\"#8331F3\" width=\"200px\" height=\"10px\" rowspan=\"1\" colspan=\"5\"> <h2>Profil </h2></td></tr>";
        if ($_SESSION['photo'])
        {
            echo "<tr><td><img src=photo/photo_user/".$_SESSION['photo']." height=\"200px\" width=\"200px\" /></td></tr>";
        }
        else
        {
            echo "<tr><td><img src=photo/photo_user/anonyme.png height=\"200px\" width=\"200px\" /></td></tr>";
        }
        echo "<tr><td><h3><b>Nom :</b> ".$_SESSION['nom']."</h3></td></tr>";
        echo "<tr><td><h3><b>Prenom :</b> ".$_SESSION['prenom']."</h3></td></tr>";
        echo "<tr><td><h3><b>Mail :</b> ".$_SESSION['mail']."</h3></td></tr>";
        echo "<tr><td><h3><b>Mdp :</b> ".$_SESSION['pass']."</h3></td></tr>";
        echo "<tr><td><h3><b>Catégorie :</b> ".$_SESSION['typec']."</h3></td></tr>";
        echo "</table>";
    ?>
    <h1><a href="logout.php">Déconnexion</a> </h1>
</body>
</html>