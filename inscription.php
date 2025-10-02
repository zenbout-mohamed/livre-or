<?php
session_start();
require_once "db.php";

if($_SERVER['REQUEST_METHOD']=== "POST"){
    $login = $_POST['login'];
    $user = $_POST['password'];
    $pass = $_POST['confirm'];
    if ($password === $confirm) {
        $hash = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO utilisateurs (login,password) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$login,$hash]);

        header("location: connexion.php");
        exit;
    }else{
        $error = "Les mots de passes ne correspondent pas.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre D'Or - Page-Inscription</title>
</head>
<body>
    <main>
        <form action="" method="post">
            <input type="text" name ="login" placeholder="Nom D'utilisateur :"required>
            <input type="password" name ="password" placeholder="Mot de Passe"required>
            <input type="password" name= "confirm" placeholder ="Confirmez le mot de passe" required>

            <button type="submit">S'inscrire</button>
        </form>
        <?php if(!empty($error)) echo "<p>$error</p>";?>
    </main>
</body>
</html>