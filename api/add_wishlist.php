<?php
session_start();
include_once("../class/wishlist.php");

$rawData = file_get_contents('php://input');

if (json_decode($rawData, true) === null) {
  $_SESSION['message'] = 'Invalid data format';
  header('Location: ../pages/home.php');
  exit();
}

$dataObject = json_decode($rawData, true); 

$IdListing = isset($dataObject['IdListing']) ? $dataObject['IdListing'] : null;
$IdUser = isset($dataObject['IdUser']) ? $dataObject['IdUser'] : null;

if (!$IdListing || !$IdUser) {
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

if (check_wishlist($db, $IdUser, $IdListing)) {
  $_SESSION['message'] = 'ITEM JÁ ESTÁ NA WISHLIST';
} else {
  if (add_wishlist($db, $IdUser, $IdListing)) {
    $_SESSION['message'] = 'PRODUTO ADICIONADO Á WISHLIST';
  } else {
    $_SESSION['message'] = 'ERRO AO ADICIONAR PRODUTO Á WISHLIST';
  }
}

header('Location: ../pages/home.php');
exit();
?>
