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
        $stmt->execute([]);
    }
}






?>