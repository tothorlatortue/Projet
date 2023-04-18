<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF8" />
<title> Inscription </title>
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
    <h3> Veuillez renseigner les champs suivants : </h3>
        <form method="POST" enctype="multipart/form-data">
            <fieldset>
                Nom : </strong><input name="nomUser"><br>
                Prenom : <input name="prenomUser"> <br>
                Adresse mail : <input name="adressemail"> <br>
                Vous êtes :
                    <select name="rangUser">
                    <option value="1"> un Etudiant </option>
                    <option value="2"> un Enseignant </option>
                    <option value="3"> un Doctorant </option>
                    <option value="4"> Membre du Personnel </option>
                    <option value="5"> Autre </option>
                    </select>
                    <br>
                Mot de passe : <input name="passUser" type="password"/><br>
                <!-- Répétez votre mot de passe : <input name="passUser" type="password"/><br> -->
                Photo : <input type="file" name="pprofil"/><br>
                <input name="inscription" type="submit" value="Terminer"/>
            </fieldset>
            </form> 
            <?php
            // Si le formulaire d'inscription d'un utilisateur a été soumis alors on appel la fonction addUser()
            if(isset($_POST["inscription"]))
                addUser();
            ?>
</body>
</html>

<?php
    function addUser()
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
                    echo "<h2>Cliquez <a href=\"index.php\" >ici< </a> pour vous connecter.</h2>";
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