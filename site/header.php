<header>
    <h1>DISTRIBUTICS</h1>
    <!-- affichage profil -->
    <?php
        echo "<table id=\"profil\" border>";
        if ($_SESSION['photo'])
        {
            echo "<tr id=\"hprofil\"><td><img id=\"pdp\" src=photo/photo_user/".$_SESSION['photo']." height=\"80px\" width=\"80px\" /></td>";
        }
        else
        {
            echo "<tr><td><img id=\"pdp\" src=photo/photo_user/anonyme.png height=\"80px\" width=\"80px\" /></td>";
        }
        echo "<td><h3 class=\"np\">".$_SESSION['nom']."</h3>";
        echo "<h3 class=\"np\">".$_SESSION['prenom']."</h3>";
        //bouton déconnexion
        echo "<h3><a id=\"deco\" href=\"logout.php\">Déconnexion</a></h3></td>";
        echo "</tr>";
        echo "</table>";
    ?>
    <ul>
            <li> <a href="index.php">Connexion</a> </li>
            <li> <a href="Distributeur.php">Accueil</a> </li>
            <li> <a href="Produit.php">Les Produits</a> </li>
            <li> <a href="Demande_produit.php">Demande de produit</a> </li>
            <li> <a href="liste_utilisateur.php">Liste des Utilisateurs</a></li>
            <li> <a href="validation_produit.php">Validation des Produits</a></li>
    </ul>
</header>