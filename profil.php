<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['id'])) {
    header("Location : index.php");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newLogin=$_POST['login'];
    $newPassword = $_POST['password'];
    $confirm_Pass = $_POST['confirm'];

    if (!empty($newPassword)) {
        if ($newPassword === $confirm_Pass) {
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE utilisateurs SET login = ?,password = ?, WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$newLogin, $hash,$_SESSION['id']]);
            $_SESSION['login'] = $newLogin;
            $message = "Profil mis à our avec succès.";
        } else {
            $message = "Le mot de passe ne correspond pas.";
        }
    } else {
        $sql = "UPDATE utilisateurs SET login = ?,WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$newLogin,$_SESSION['id']]);
        $message = "Nom d'utilisateur mis à jour avec succès";
    }
}


$sql = "SELECT login FROM utilisateurs WHER id = ? ";
$stmt = $pdo->prepare($sql);
$stmt->execute($_SESSION['id']);
$user = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
    <main>
        <h1>Modifier un profil</h1>
        <?php if(!empty($message)) echo "<p>$message</p>"; ?>
        <form method="post">
            <label>Nom d'utilisateur</label>
            <input type="text" name ="login" placeholder="Nom d'utilisateur :" value ="<?php echo htmlspecialchars($user['login']) ?>" required>

            <label>Nouveau mot de Passe : </label>
            <input type="text" name="password" placeholder="Entrez votre nouveau mot de passe : ">

            <label>Confirmation nouveau mot de passe :</label>
            <input type="text" name ="confirm_Pass" placeholder ="Confirmez votre nouveau mot de passe :">


            <button type="submit">Mettre à jour</button>
        </form>

        <p><a href="index.php">Retour à l'accueil</a></p>
    </main>
</body>
</html>