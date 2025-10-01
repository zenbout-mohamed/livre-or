<?php
if(session_status() === PHP_SESSION_NONE){
session_start();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre D'Or</title>
</head>
<body>
    <header>
         <h1>Livre d'Or</h1>
        <p>Ici, vous laissez vos avis, ainsi</p>

        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="livre-or.php">Voir le livre d'or</a></li>
                <?php if(isset($_SESSION['id'])): ?>
                    <li><a href="profil.php">Mon profil</a></li>
                    <li><a href="commentaire.php">Ajouter un commentaire</a></li>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                <?php endif;?>
            </ul>
        </nav>
    </header>
<main>

  