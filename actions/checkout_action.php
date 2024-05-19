<?php 
include_once("../class/cart.php");
include_once("../class/user.php");
include_once("../class/listings.php");
include_once("../class/transactions.php");
session_start();
if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = generate_random_token();
  };
$user = get_user($_SESSION['user']);
if ($_SESSION['csrf'] !== $_POST['csrf']) {
    $_SESSION['message'] = 'Erro ao verificar transação!';
    header('Location: ../pages/home.php');
    exit();
  }
if( isset($_POST['country']) && isset($_POST['NIF']) && isset($_POST['Address']) && isset($_POST['PostalCode']) && isset($_POST['Location'])
&& isset($_POST['card_name']) && isset($_POST['card_num']) && isset($_POST['exp_date']) && isset($_POST['cvc'])) {
    $country = $_POST['country'];
    $address = $_POST['Address'];
    $NIF = $_POST['NIF'];
    $postalCode = $_POST['PostalCode'];
    $Location = $_POST['Location'];
    $IdTransaction = insert_transaction($country, $address, $NIF, $postalCode, $Location,$user->IdUser);
    change_sold_state($user->IdUser);
    header('Location: ../pages/shipping-form.php?IdTransaction=' . $IdTransaction);
    die();
}