<?php
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header.php");
    include_once("../class/listings.php");
    include_once("../class/user.php");
    $user = get_user($_SESSION['user']);
    if ( $_SESSION['login'] == false){
        $_SESSION['message'] = "Tens de estar loggado!";
        header('Location: index.php');
        die(); 
    }
    print_header();
    $Id = $_GET['id'];
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM LISTINGS WHERE IdListing = :Id");
    $stmt->bindParam(':Id', $Id);
    $stmt->execute();
    $listing = $stmt->fetch(PDO::FETCH_ASSOC);
    print_listing($db,$listing);
    print_footer();