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

        <?php foreach ($commentaires as $comm):
            
        ?>
    </main>
</body>
</html>