<?php
session_start();
include_once("../class/cart.php");
include_once("../class/listings.php");
include_once("../class/wishlist.php");

$rawData = file_get_contents('php://input');

if (json_decode($rawData, true) === null) {
  $_SESSION['message'] = 'Invalid data format';
  header('Location: ../pages/home.php');
  exit();
}

$dataObject = json_decode($rawData, true); 

$IdListing = isset($dataObject['IdListing']) ? $dataObject['IdListing'] : null;

if (!$IdListing ) {
  $_SESSION['message'] = 'Missing required data';
  header('Location: ../pages/home.php');
  exit();
}

$db = new PDO('sqlite:../database/database.db');
if (!$db) {
  $_SESSION['message'] = 'ERRO NO BANCO DE DADOS';
  header('Location: ../pages/home.php');
  exit();
}

if(remove_listing($db,$IdListing) && remove_listing_cart($db,$IdListing) && remove_listing_wishlist($db,$IdListing)){
    header('Location: ../pages/account.php');
    exit();
}
else{
    header('Location: ../pages/account.php');
    exit();
}

header('Location: ../pages/home.php');
exit();
?>
