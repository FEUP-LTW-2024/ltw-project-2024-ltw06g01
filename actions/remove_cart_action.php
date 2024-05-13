<?php
include_once("../class/user.php");
include_once("../class/cart.php");
session_start();
if(isset($_GET['IdListing'])){
    $db = new PDO('sqlite:../database/database.db');
    $user = get_user($_SESSION['user']);
    if(!$db){
        header('Location: ../pages/shopping_cart.php');
        $_SESSION['message'] = 'ERRO AO CONECTAR Á DATABASE';
        exit();
    }
    $listing_id = $_GET['IdListing'];
    if(remove_cart($db,$user->IdUser,$listing_id)){
        header('Location: ../pages/shopping_cart.php');
        exit();
    }
    else{
        header('Location: ../pages/shopping_cart.php');
        exit();
    }
}

?>