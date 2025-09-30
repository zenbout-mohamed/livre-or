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