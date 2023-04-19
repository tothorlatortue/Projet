<?php
session_start();
if(isset($_SESSION["nom"]))
{
    header("Location: Distributeur.php");
    exit(); 
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF8" />
<title> Connexion </title>
<link rel="stylesheet" media="screen" href="style/style.css">
</head>
<body>
    <h1>DISTRIBUTICS</h1>
    <ul>
        <li> <a href="index.php">Connexion</a> </li>
        <li> <a href="Distributeur.php">Accueil</a> </li>
        <li> <a href="Produit.php">Les Produits</a> </li>
        <li> <a href="Demande_produit.php">Demande de produit</a> </li>
        <li> <a href="liste_utilisateur.php">Liste des Utilisateurs</a></li>
        <li> <a href="validation_produit.php">Validation des Produits</a></li>
    </ul>

    <h2>Connexion</h2>
    <h3> Connectez vous avec vos identifiants :</h3>
    <form method="POST" enctype="multipart/form-data"> 
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
        }

        if (isset($_POST['adressemail']))
        {
            $mail = stripslashes($_REQUEST['adressemail']);
            $mail = mysqli_real_escape_string($connexion, $mail);
            $mdp = stripslashes($_REQUEST['passUser']);
            $mdp = mysqli_real_escape_string($connexion, $mdp);

            $requete = "SELECT mail, pass, nom, prenom, typec, photo
                        FROM utilisateur 
                        WHERE mail like \"".$mail."\" and pass = \"".$mdp."\";";

            $reponse = mysqli_query($connexion,$requete);
            $ligne = mysqli_fetch_array($reponse);
            if($ligne !== NULL)
            {
                $_SESSION['nom'] = $ligne['nom'];
                $_SESSION['prenom'] = $ligne['prenom'];
                $_SESSION['mail'] = $ligne['mail'];
                $_SESSION['pass'] = $ligne['pass'];
                $_SESSION['typec'] = $ligne['typec'];
                $_SESSION['photo'] = $ligne['photo'];
                header("Location: Distributeur.php");
            }
            else
            {
                echo "Le mail de l'utilisateur ou le mot de passe est incorrect.";
            } 
            mysqli_free_result($reponse);
        }
        mysqli_close($connexion);
    }
?>