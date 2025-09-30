<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"]=== "POST") {
   $login = $_POST['login'];
   $password =$_POST['password'];

   $sql = "SELECT * FROM utilisateurs WHERE login = ?";
   $stmt = $pdo->prepare($sql)



}else{

}

?>