<?php
session_start();
include_once("../class/cart.php");

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

if (check_cart($db, $IdUser, $IdListing)) {
  $_SESSION['message'] = 'ITEM JÁ ESTÁ NO CARRINHO';
} else {
  if (add_cart($db, $IdUser, $IdListing)) {
    $_SESSION['message'] = 'PRODUTO ADICIONADO AO CARRINHO';
  } else {
    $_SESSION['message'] = 'ERRO AO ADICIONAR PRODUTO AO CARRINHO';
  }
}

header('Location: ../pages/home.php');
exit();
?>
