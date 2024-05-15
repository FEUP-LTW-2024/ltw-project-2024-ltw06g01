<?php 
include_once("../class/cart.php");
include_once("../class/user.php");
include_once("../class/listings.php");

session_start();
$user = get_user($_SESSION['user']);
if( isset($_POST['country']) && isset($_POST['NIF']) && isset($_POST['Address']) && isset($_POST['PostalCode']) && isset($_POST['Location'])
&& isset($_POST['card_name']) && isset($_POST['card_num']) && isset($_POST['exp_date']) && isset($_POST['cvc'])) {
    $_SESSION['country'] = $_POST['country'];
    $_SESSION['NIF'] = $_POST['NIF'];
    $_SESSION['Address'] = $_POST['Address'];
    $_SESSION['PostalCode'] = $_POST['PostalCode'];
    $_SESSION['Location'] = $_POST['Location'];
    $_SESSION['card_name'] = $_POST['card_name'];
    $_SESSION['card_num'] = $_POST['card_num'];
    $_SESSION['exp_date'] = $_POST['exp_date'];
    $_SESSION['cvc'] = $_POST['cvc'];
    clean_cart($user->IdUser);
    header('Location: ../pages/shipping-form.php');
    die();
}