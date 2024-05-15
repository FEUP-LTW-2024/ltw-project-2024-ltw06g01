<?php 
include_once("../class/cart.php");
include_once("../class/user.php");
include_once("../class/listings.php");

session_start();
$user = get_user($_SESSION['user']);
if( isset($_POST['country']) && isset($_POST['NIF']) && isset($_POST['Address']) && isset($_POST['PostalCode']) && isset($_POST['Location'])
&& isset($_POST['card_name']) && isset($_POST['card_num']) && isset($_POST['exp_date']) && isset($_POST['cvc'])) {
    change_sold_state($user->IdUser);
    header('Location: ../pages/shipping-form.php');
    die();
}