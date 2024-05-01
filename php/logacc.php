<?php
session_start();
if(isset($_GET["Username"])&& isset($_GET["Password"])){
    $Username = $_GET["Username"];
    $Password = md5($_GET["Password"]);
    $db = new PDO('sqlite:../database/listings.db');
    if (!$db) {
        header('Location: login.php');
        $_SESSION['message'] = 'ERRO NO BANCO DE DADOS';
    } 
    else{
    $query = "SELECT * FROM user WHERE User = :username AND PassWord = :password";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $Username);
    $stmt->bindParam(':password', $Password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $_SESSION['login'] = true;
        header('Location: home.php');
        exit(); 
    } else {
        $_SESSION['message'] = 'Dados Inválidos';
        header('Location: login.php');
        exit(); 
    }
    }
}
?>