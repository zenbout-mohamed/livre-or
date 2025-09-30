<?php
session_start();
require_once "db.php";

$sql = "SELECT commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires
        JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.date DESC";



?>