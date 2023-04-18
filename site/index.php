<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF8" />
<title> Accueil </title>
<link rel="stylesheet" media="screen" href="style/style.css">
</head>
<body>
    <h1>DISTRIBUTICS</h1>
    <ul>
        <ul>
            <li> <a href="index.php">Accueil</a> </li>
            <li> <a href="Distributeur.html">Les Distributeurs</a> </li>
            <li> <a href="Produit.html">Les Produits</a> </li>
            <li> <a href="Demande_produit.html">Demande de produit</a> </li>
            <li> <a href="liste_utilisateur.html">Liste des Utilisateurs</a></li>
            <li> <a href="validation_produit.html">Validation des Produits</a></li>
        </ul>
    </ul> 

    <h2>Connexion</h2>
    <h3> Connectez vous avec vos identifiants :</h3>
    <form method="POST" action="afficherDonnees_1.php" enctype="multipart/form-data"> 
        <fieldset>
            Adresse mail : <input name="adressemail"> <br>
            Mot de passe : <input name="passUser" type="password"/><br>
            <input name="log" type="submit" value="Connexion"/>
        </fieldset>
    </form>
    <?php
    // Si le formulaire de connexion a été soumis alors on verra 
        if(isset($_POST["log"]))
            login();
    ?>
    <h2> Pas de compte ? Inscrivez vous <a href="sign_up.php">ici</a>.</h2>
</body>
</html>

<?php
    function login()
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
            if($_POST['adressemail'] != NULL)
            {
                $requete = "SELECT mail
                            FROM utilisateur 
                            WHERE mail LIKE \"".$_POST['adressemail']."\";";
                $reponse = mysqli_query($connexion,$requete);
                $ligne = mysqli_fetch_array($reponse);
                if($ligne != NULL)
                {
                    echo "<h2> Cette adresse mail est déjà utilisée.</h3>";
                }
                else 
                {
                    // On place la photo dans le répertoire photo/photo_user/
                    $fichier = basename($_FILES['pprofil']['name']);
                    $dossier = 'photo/photo_user/';
                    $resultat = move_uploaded_file($_FILES['pprofil']['tmp_name'], $dossier . $fichier);
                    if($resultat==true) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                    {
                        //echo 'Transfert de la photo effectué avec succès !';
                    }        
                    else //Sinon (la fonction renvoie FALSE).
                    {
                        //echo 'Echec du transfert de la photo !';
                    }
                        
                    // ajout de l'utilisateur' dans la base de donées.
                    $r_ajout="INSERT INTO utilisateur (mail, pass, nom, prenom, typec, photo)
                              VALUES (\"".$_POST['adressemail']."\",\"".$_POST['passUser']."\",\"".$_POST['nomUser']."\",\"".$_POST['prenomUser']."\",\"".$_POST['rangUser']."\",\"".$fichier."\");";
                    $ajout = mysqli_query($connexion,$r_ajout);
                    echo "<h2>L'utilisateur a été inscrit.</h2>";
                }
                mysqli_free_result($reponse);
            }
            else
            {
                echo "<h2>Aucune adresse mail n'a été rentrée.</h2>";
            }
        }
        mysqli_close($connexion);
    }
?>