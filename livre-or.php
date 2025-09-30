<?php
session_start();
require_once "db.php";

$sql = "SELECT commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires
        JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.date DESC";

$stmt = $pdo->query($sql);
$commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre D'Or</title>
</head>
<body>
    <main>
        <h1>Livre d'Or</h1>

        <?php foreach ($commentaires as $comm):?>
            <p>Posté le <?= date('d/m/Y H:i' , strtotime($comm['date'])) ?> par <?= htmlspecialchars($comm['login']) ?></p>
            <p><?= nl2br(htmlspecialchars($comm['commentaire'])) ?></p>
            <hr>
        <?php endforeach;?>


        <?php if(isset($_SESSION['id'])):?>
            <a href="commentaire.php">Ajouter un commentaire</a>
        <?php endif;?>
    </main>
</body>
</html>