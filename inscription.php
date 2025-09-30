<?php
session_start();
require_once "db.php";

if($_SERVER['REQUEST_METHOD']=== "POST"){
    $login = $_POST['login'];
    $user = $_POST['passwrod'];
    $pass = $_POST['confirm'];
    if ($password === $confirm) {
        $hash = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO utilisateurs (login,password) VALUE (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$login,$hash]);

        header("location: connexion.php");
        exit;
    }else{
        $error = "Les mots de passes ne correspondent pas.";
    }
}





?>