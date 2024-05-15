<?php 
include_once("../class/cart.php");
include_once("../class/user.php");
include_once("../class/listings.php");
include_once("../class/transactions.php");
session_start();
$user = get_user($_SESSION['user']);
if( isset($_POST['country']) && isset($_POST['NIF']) && isset($_POST['Address']) && isset($_POST['PostalCode']) && isset($_POST['Location'])
&& isset($_POST['card_name']) && isset($_POST['card_num']) && isset($_POST['exp_date']) && isset($_POST['cvc'])) {
    $name  = $user->name;
    $surname  = $user->surName;
    $country = $_POST['country'];
    $address = $_POST['Address'];
    $NIF = $_POST['NIF'];
    $postalCode = $_POST['PostalCode'];
    $Location = $_POST['Location'];
    insert_transaction($name, $surname, $country, $address, $NIF, $postalCode, $Location,$user->IdUser);
    change_sold_state($user->IdUser);
    header('Location: ../pages/shipping-form.php');
    die();
}