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
<title> Accueil </title>
<link rel="stylesheet" media="screen" href="style/style.css">
</head>
<body> 
    <h1>Distributics</h1>
    <ul>
        <li> <a href="index.php">Connexion</a> </li>
        <li> <a href="Distributeur.php">Accueil</a> </li>
        <li> <a href="Produit.php">Les Produits</a> </li>
        <li> <a href="Demande_produit.php">Demande de produit</a> </li>
        <li> <a href="liste_utilisateur.php">Liste des Utilisateurs</a></li>
        <li> <a href="validation_produit.php">Validation des Produits</a></li>
    </ul>
    
    <h2>PAGE DISTRIBUTEURS (ON VA DIRE QUE C'EST L'ACCUEIL PARCE QUE C'EST PLUS SIMPLE).</h2>
    <!-- affichage profil --> 
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
    <!-- distributeurs + état -->
    <?php
    
        $user = 'root';
        $password = 'root';
        $db = 'distributics';
        $host = 'localhost';
        $connexion = mysqli_connect($host, $user, $password, $db);
        if(mysqli_connect_errno())
        {
            echo "Problème de connexion.";
        }
        else 
        {
            echo "Connexion réussie.";
        }

        $requete1 = "SELECT numD, lieuD, etatD 
                    FROM distributeur;";

        $reponse1 = mysqli_query($connexion,$requete1);

        echo "<div class=\"distributeur\">";
        //en-tête tableau
        echo "<table border>";
        echo "<td align=center bgcolor=\"#8331F3\" width=\"1000px\" height=\"10px\" rowspan=\"1\" colspan=\"5\"> <h2>Distributeurs </h2></td>";
        echo "<tr>";
        echo "<td><h3>N° distributeur</h3></td>";
        echo "<td><h3>Lieu</h3></td>";
        echo "<td><h3>Etat</h3></td>";
        echo "</tr>";

        $ligne = mysqli_fetch_array($reponse1);
        $i = 1;
        while ($ligne != NULL)
        {
            echo "<tr><td><h3>Distributeur ".$i."</td>";
            echo "<td><h3>".$ligne["lieuD"]."</h3></td>";
            if ($ligne["etatD"] == 1)
            {
                echo "<td><h3>Marche</h3></td>";
            }
            else
            {
                echo "<td><h3>Arrêt</h3></td>";
            }
            $i = $i + 1;
            $ligne = mysqli_fetch_array($reponse1);
            echo "</tr>";
        }
        echo "</table>";
    ?>

    <!-- sélection du distributeur pour affichage de l'inventaire -->
    <?php
    $requete2="SELECT numD FROM distributeur;";
    $reponse2 = mysqli_query($connexion,$requete2);

    echo "<h1> Sélectionnez un distributeur</h1>";
    echo "<form method=\"post\">";
    echo "<select name=\"menuUser\" id=\"menuUser\">";
    while($ligne = mysqli_fetch_array($reponse2))
        echo "<option value=\"".$ligne['numD']."\">".$ligne['numD']."</option>";

    mysqli_free_result($reponse2);

    echo "</select>";
    echo "<input type=\"submit\" name=\"afficher\"  value=\"Afficher\"/>";
    echo "</form>";


	// Pour éviter l'erreur la première fois où aucun distributeur n'a été encore selectionné
    
	if (isset($_POST['menuUser'])) 
	{
    $selected = $_POST['menuUser'];
	}
	if (empty($selected)) 
	{
         $selected = '';
    }

    echo "<BR><BR>";

    $requete3 = "SELECT marqueP, nomP, prixP, photoP
                 FROM produit, inventaire, distributeur
                 WHERE distributeur.numD = inventaire.numD
                 AND inventaire.numP = produit.numP
                 AND distributeur.numD LIKE \"".$selected."\";";

    $reponse3 = mysqli_query($connexion,$requete3);
    $ligne = mysqli_fetch_array($reponse3);

    echo "<div class=\"inventaire\">";

        echo "<table border>";
        echo "<td align=center bgcolor=\"#8331F3\" width=\"1000px\" height=\"10px\" rowspan=\"1\" colspan=\"5\"> <h2>Inventaire du ".$selected."</h2></td>";
       /* echo "<tr>";
        echo "<td><h3>Marque</h3></td>";
        echo "<td><h3>Nom</h3></td>";
        echo "<td><h3>Prix</h3></td>";
        echo "<td><h3>Photo</h3></td>";
        echo "</tr>"; */
        
        $ligne = mysqli_fetch_array($reponse3);
        if($ligne != NULL)
        {
                while($ligne != NULL)
                {
                    echo "<tr>";
                    if ($ligne != NULL)
                    {
                        echo "<td><img src=photo/photo_produit/".$ligne['photoP']." height=\"200px\" />";
                        echo "<h3>".$ligne['marqueP']."</h3>";
                        echo "<h3>".$ligne['nomP']."</h3>";
                        echo "<h3>".$ligne['prixP']." €</h3></td>";
                    }
                    $ligne = mysqli_fetch_array($reponse3);
                    if ($ligne != NULL)
                    {
                        echo "<td><img src=photo/photo_produit/".$ligne['photoP']." height=\"200px\" />";
                        echo "<h3>".$ligne['marqueP']."</h3>";
                        echo "<h3>".$ligne['nomP']."</h3>";
                        echo "<h3>".$ligne['prixP']." €</h3></td>";
                    }
                    $ligne = mysqli_fetch_array($reponse3);
                    echo "</tr>";
                    
                }
        }
        else
        {
            echo "<tr><td><h3>Aucun produit.</h3></td></tr>";
        }
        mysqli_free_result($reponse3);
        echo "</table>";
        echo "</div>";
    ?>

    <!-- bouton déconnexion -->
    <h1><a href="logout.php">Déconnexion</a> </h1>
</body>
</html>

<?php
    function connexion_bdd()
    {
        $user = 'root';
        $password = 'root';
        $db = 'distributics';
        $host = 'localhost';
        $connexion = mysqli_connect($host, $user, $password, $db);
        if(mysqli_connect_errno())
        {
            echo "Problème de connexion.";
        }
        else 
        {
            echo "Connexion réussie.";
        }
    }
?>