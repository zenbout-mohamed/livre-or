<?php
session_start();
require_once "db.php";

if(!isset($_SESSION['id'])){
    header("Location : connexion.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $commentaire = $_POST['commentaire'];
    $id_user = $_POST['id'];

    $sql = "INSERT INTO commentaires (commentaire,id_utilisateur) VALUE (?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($commentaire, $id_user);

    header("Location: livre-or.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre D'Or - Page-Connexion</title>
</head>
<body>
    <main>
        <form action="" method="post">
            <textarea name="commentaire" required></textarea>
            <button type="submit">Publier</button>
        </form>
    </main>
</body>
</html>