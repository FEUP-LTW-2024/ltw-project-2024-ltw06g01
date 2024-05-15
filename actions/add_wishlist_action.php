<?php 
session_start();
include_once("../class/wishlist.php");
if (isset($_POST["IdListing"]) && isset($_POST["IdUser"])) {
        $IdListing = $_POST["IdListing"];
        $IdUser = $_POST["IdUser"];
        $db = new PDO('sqlite:../database/database.db');
        if(!$db){
            $_SESSION['message'] = 'ERRO NO BANCO DE DADOS';
            header('Location: ../pages/home.php');
            exit();
        }
        if(check_wishlist($db,$IdUser,$IdListing)){
            $_SESSION['message'] = 'ITEM JÁ ESTÁ NA WISHLIST';
            header('Location: ../pages/home.php');
            exit();
        }
        else{
            if(add_wishlist($db, $IdUser, $IdListing)){
                $_SESSION['message'] = 'PRODUTO ADICIONADO Á WISHLIST';
                header('Location: ../pages/home.php');
                exit();
            }
            else {
                $_SESSION['message'] = 'ERRO AO ADICIONAR PRODUTO Á WISHLIST';
                header('Location: ../pages/home.php');
                exit();
            }
        }
        
}?>