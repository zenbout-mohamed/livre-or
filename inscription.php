<?php
session_start();
require_once "db.php";

if($_SERVER['REQUEST_METHOD']=== "POST"){
    $login = $_POST['login'];
    $user = $_POST['passwrod'];
    $pass = $_POST['confirm'];
}





?>