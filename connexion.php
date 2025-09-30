<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"]=== "POST") {
   $login = $_POST['login'];
   $password =$_POST['password'];

    $sql = "SELECT * FROM utilisateurs WHERE login = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['login']);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['login'];

        header("Location: index.php");
        exit();
    }else{
        $error ="E-mail ou mot de passe incorrect.";
    }

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
            <input type="text" name ="login" placeholder="Nom d'utilisateur :" required>
            <input type="password" name ="password" placeholder="NMot de passe :" required>
            <button type="submit">Connexion</button>
        </form>
        <?php if(!empty($error)) echo "<p>$error</p>";?>
    </main>
</body>
</html>