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
    echo "<h1> Trier par :</h1>";
    echo "<form method=\"post\">";
    echo "<select name=\"menutri\" id=\"menutri\">";
    echo "<option value=\"SELECT * from produit\">Pas de tri</option>";
    echo "<option value=\"SELECT * from produit where typeP = 1 \">Nourriture</option>";
    echo "<option value=\"SELECT * from produit where typeP = 2 \">Boisson Chaude</option>";
    echo "<option value=\"SELECT * from produit where typeP = 3 \">Boisson Froide</option>";
    echo "<option value=\"SELECT * from produit Order by prixP Desc\">Trié par prix décroissant</option>";
    echo "</select>";
    echo "<input type=\"submit\" name=\"afficher\"  value=\"Afficher\"/>";
    echo "</form>";


    if (isset($_POST['menutri'])) 
    {
        $requete1 = $_POST['menutri'];
    }
    if (empty($selected)) 
    {
         $selected = '';
    }
    $reponse1 = mysqli_query($connexion,$requete1);
    


    $ligne = mysqli_fetch_array($reponse1);
        if($ligne != NULL)
        {echo "<table border>";
            echo "<tr>";
            echo "<td><h2>Photo</h2></td>";
            echo "<td><h2>Marque</h2></td>";
            echo "<td><h2>Nom</h2></td>";
            echo "<td><h2>Type</h2></td>";
            echo "<td><h2>Prix</h2></td>";
            echo "</tr>";
                while($ligne != NULL)
                {
                    echo "<tr>";
                
                        echo "<td><img src=photo/photo_produit/".$ligne['photoP']." height=\"200px\" /></td>";
                        echo "<td><h3>".$ligne['marqueP']."</h3></td>";
                        echo "<td><h3>".$ligne['nomP']."</h3></td>";
                        if ($ligne['typeP']==1 )
                        echo "<td><h3>Nourriture</h3></td>";
                        if ($ligne['typeP']==2 )
                        echo "<td><h3>Boisson Chaude</h3></td>";
                        if ($ligne['typeP']==3 )
                        echo "<td><h3>Boisson Froide</h3></td>";
                        echo "<td><h3>".$ligne['prixP']." €</h3></td>";
                    
                    $ligne = mysqli_fetch_array($reponse1);
                    echo "</tr>";
                    
                }
        }
        else
        {
            echo "<tr><td><h3>Aucun produit.</h3></td></tr>";
        }
    mysqli_free_result($reponse1);

    mysqli_close($connexion);
  ?>
    </body>
</html>