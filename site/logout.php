<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF8" />
<title> Déconnexion </title>
<link rel="stylesheet" media="screen" href="style/style.css">
</head>
<body> 
<?php
deco();
?>
</body>
</html>

<?php
    function deco()
    {
        unset($_SESSION['mail']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
        unset($_SESSION['photo']);
        unset($_SESSION['pass']);
        unset($_SESSION['typec']);
        session_destroy();
        echo "<h2>Vous êtes déconnectés, cliquez <a href=index.php>ici</a> pour revenir à l'accueil.</h2>";
    }
?>