<?php
session_start();
require_once "db.php";

if(!isset($_SESSION['id'])){
    header("Location : connexion.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $commentaire = $_POST['commentaire'];
    $id_user = $_POST['id_user']

}



?>