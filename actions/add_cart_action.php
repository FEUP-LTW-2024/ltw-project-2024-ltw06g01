<?php 
session_start();
include_once("../class/cart.php");
if (isset($_POST["IdListing"]) && isset($_POST["IdUser"])) {
        $IdListing = $_POST["IdListing"];
        $IdUser = $_POST["IdUser"];
        $db = new PDO('sqlite:../database/database.db');
        if(!$db){
            $_SESSION['message'] = 'ERRO NO BANCO DE DADOS';
            header('Location: ../pages/home.php');
            exit();
        }
        if(check_cart($db,$IdUser,$IdListing)){
            $_SESSION['message'] = 'ITEM JÁ ESTÁ NO CART';
            header('Location: ../pages/home.php');
            exit();
        }
        else{
            if(add_cart($db, $IdUser, $IdListing)){
                $_SESSION['message'] = 'PRODUTO ADICIONADO AO CART';
                header('Location: ../pages/home.php');
                exit();
            }
            else {
                $_SESSION['message'] = 'ERRO AO ADICIONAR PRODUTO AO CART';
                header('Location: ../pages/home.php');
                exit();
            }
        }
        
}?>