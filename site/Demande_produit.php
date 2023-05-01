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
<title> Demande_Produit </title>
<link rel="stylesheet" media="screen" href="style/style.css">
</head>
<?php 
require 'header.php'; 
?>
<body> 
<h3> Veuillez renseigner les champs suivants : </h3>
        <form method="POST" enctype="multipart/form-data">
            <fieldset>
                Marque : </strong><input name="marque_produit"><br>
                Nom produit : <input name="nom_produit"> <br>
                Type de produit :
                    <select name="type_produit">
                    <option value="1"> Nourriture </option>
                    <option value="2"> Boisson chaude </option>
                    <option value="3"> Boisson froide </option>
                    </select>
                    <br>
                Prix estimé : <input name="prix_produit"> <br>
                Photo : <input type="file" name="photo_produit"/><br>
                <input name="Soumettre" type="submit" value="Terminer"/>
            </fieldset>
            </form> 
            <?php
            // Si le formulaire de soumission d'idée du produit a été soumis alors on appel la fonction addideeproduit()
            if(isset($_POST["Soumettre"]))
                addideeproduit();
            ?>
</body>
</html>

<?php
    function addideeproduit()
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
            //création de l'idip (identifiant du produit avec la fonction de création de chaine de caractères aléatoires random_string)
            $idip = random_string($length=10);
            echo "Connexion réussie.";
            if($_POST['marque_produit'] != NULL)
            {
                $requete = "SELECT marqueiP, nomiP
                            FROM idee_produit 
                            WHERE marqueiP LIKE \"".$_POST['marque_produit']."\" AND nomiP LIKE \"".$_POST['nom_produit']."\";";
                $reponse = mysqli_query($connexion,$requete);
                $ligne = mysqli_fetch_array($reponse);
                if($ligne != NULL)
                {
                    echo "<h2> Ce produit est déjà soumis à une demande d'ajout.</h3>";
                }
                else 
                {
                    // On place la photo dans le répertoire photo/photo_user/
                    $fichier = basename($_FILES['photo_produit']['name']);
                    $dossier = 'photo/photo_produit/';
                    $resultat = move_uploaded_file($_FILES['photo_produit']['tmp_name'], $dossier . $fichier);
                    if($resultat==true) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                    {
                        echo 'Transfert de la photo effectué avec succès !';
                    }        
                    else //Sinon (la fonction renvoie FALSE).
                    {
                        echo 'Echec du transfert de la photo !';
                    }
                        
                    // ajout de l'utilisateur' dans la base de donées.
                    $r_ajout="INSERT INTO idee_produit (idip, marqueiP, nomiP, typeiP, prixiP, photoiP, mail)
                              VALUES (\"".$idip."\",\"".$_POST['marque_produit']."\",\"".$_POST['nom_produit']."\",\"".$_POST['type_produit']."\",\"".$_POST['prix_produit']."\",\"".$fichier."\",\"".$_SESSION['mail']."\");";
                    $ajout = mysqli_query($connexion,$r_ajout);
                    echo "<h2>La demande est enregistrée.</h2>";
                }
                mysqli_free_result($reponse);
            }
            else
            {
                echo "<h2>Aucune demande n'a été rentrée.</h2>";
            }
        }
        mysqli_close($connexion);
    }
?>

<?php
function random_string($length=10)
{
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i=0; $i<$length; $i++)
    {
        $string .= $chars[rand(0, strlen($chars)-1)];
    }
    return $string;
}

?>