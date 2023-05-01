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
<h1> <center>Liste des utilisateurs</center></h1>
<?php
$user = 'root';
    $password = 'root';
    $db = 'distributics';
    $host = 'localhost';
    $connexion = mysqli_connect($host, $user, $password, $db);
    mysqli_set_charset($connexion, "utf8");
    if(mysqli_connect_errno())
    {
        echo "Problème de connexion.";
    }
    else 
    {
        echo "Connexion réussie.";
    }

    $requete="SELECT mail, pass, nom, prenom, typec, photo FROM utilisateur;";

    $reponse = mysqli_query($connexion, $requete);
	if($reponse)
		echo "Exécution réussie" ;
	else
		echo "Exécution non réussie" ;
	
	$datas = mysqli_fetch_all($reponse);

    echo "<table border>";
    echo "<tr>";
    echo "<td><h2>Mail</h2></td>";
    echo "<td><h2>Mot de passe</h2></td>";
    echo "<td><h2>Nom</h2></td>";
    echo "<td><h2>Prenom</h2></td>";
    echo "<td><h2>Catégorie</h2></td>";
	echo "<td><h2>Photo</h2></td>";
    echo "</tr>";

	foreach($datas as $ligne)
    {
        echo "<tr>";
        echo "<td><h3>".$ligne['0']."</h3></td>";
        echo "<td><h3>".$ligne['1']."</h3></td>";
        echo "<td><h3>".$ligne['2']."</h3></td>";
        echo "<td><h3>".$ligne['3']."</h3></td>";
        if ($ligne['4']==1 )
        echo "<td><h3>Etudiant</h3></td>";
        if ($ligne['4']==2 )
        echo "<td><h3>Personnel</h3></td>";  
        if ($ligne['4']==3 )
        echo "<td><h3>Enseignant</h3></td>";
        if ($ligne['4']==4 )
        echo "<td><h3>Doctorant</h3></td>";                  
		if ($ligne['5'])
			echo "<td><img src=photo/photo_user/".$ligne['5']." height=\"100px\" width=\"100px\"/></td>";
		else
			echo "<td><img src=photo/photo_user/anonyme.png".$ligne['5']." height=\"100px\" width=\"100px\"/></td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_free_result($reponse);

    mysqli_close($connexion);
    ?>
</body>
</html>