<?php
include_once("../class/user.php");
session_start();
if(isset($_POST["Username"])&& isset($_POST["Password"])){
    $Username = $_POST["Username"];
    $Password = ($_POST["Password"]);
    $db = new PDO('sqlite:../database/database.db');
    if (!$db) {
        header('Location: ../pages/login.php');
        $_SESSION['message'] = 'ERRO NO BANCO DE DADOS';
    } 
    else{
    $user = login($db, $Username, $Password);
    if ($user) {
        $_SESSION['login'] = true;
        $_SESSION['user'] = $Username;
        header('Location: ../pages/home.php');
        exit(); 
    } else {
        $_SESSION['message'] = 'Dados Inválidos';
        header('Location: ../pages/login.php');
        exit(); 
    }
    }
}
?>