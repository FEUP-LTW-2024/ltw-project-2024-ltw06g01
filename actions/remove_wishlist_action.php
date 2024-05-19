<?php
include_once("../class/user.php");
include_once("../class/wishlist.php");
session_start();
if(isset($_POST['IdListing'])){
    $db = new PDO('sqlite:../database/database.db');
    $user = get_user($_SESSION['user']);
    if(!$db){
        header('Location: ../pages/account.php');
        $_SESSION['message'] = 'ERRO AO CONECTAR Á DATABASE';
        exit();
    }
    $listing_id = $_POST['IdListing'];
    if(remove_wishlist($db,$user->IdUser,$listing_id)){
        header('Location: ../pages/account.php');
        exit();
    }
    else{
        header('Location: ../pages/account.php');
        exit();
    }
}
?>