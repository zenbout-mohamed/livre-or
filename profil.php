<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['id'])) {
    header("Location : index.php");
    exit;
}

$message = "";








?>