
<?php
session_start();
include_once("../class/user.php");
if(isset($_GET["Username"]) && isset($_GET["Password"]) && isset($_GET["Confirm_Password"])&& isset($_GET["Email"]) && isset($_GET["Name"]) && isset($_GET["Surname"]) ){
    $User = $_SESSION['user'];
    $New_user = $_GET["Username"];
    $Mail = $_GET["Email"];
    $Password = hash(sha_256,($_GET["Password"]));
    $Confirm_Password = hash(sha_256,($_GET["Confirm_Password"]));
    $name = $_GET["Name"];
    $sur = $_GET["Surname"];
    if($Password != $Confirm_Password){
        header('Location: ../pages/account.php');
        $_SESSION['message'] = 'ERRO NA CONFIRMAÇÃO DA PASSWORD';
        die();
    }
    $db = new PDO('sqlite:../database/database.db');
    if ($db) {
        $user2 = checkUsernameExists($db, $New_user) ;
        if ($user2){
            $_SESSION['message'] = 'USUARIO JA EXISTE';

            header('Location: ../pages/account.php');
            $db = NULL;
            exit();
        }
        else{
            if($name != ""){
                if(!change_name($db, $User, $name)){
                    $_SESSION['message'] = 'ERRO AO MUDAR O NOME';
                    header('Location: ../pages/account.php');
                    $db = NULL;
                }
            }
            if($Password != md5("")){
                if(!change_pass($db, $User, $Password)){
                    $_SESSION['message'] = 'ERRO AO MUDAR A PASSWORD';
                    header('Location: ../pages/account.php');
                    $db = NULL;
                }
            }
            if($Mail != ""){
                if(!change_email($db, $User, $Mail)){
                    $_SESSION['message'] = 'ERRO AO MUDAR O E-MAIL';
                    header('Location: ../pages/account.php');
                    $db = NULL;
                }
            }
            if($sur != ""){
                if(!change_surname($db, $User, $sur) ){
                    $_SESSION['message'] = 'ERRO AO MUDAR O APELIDO';
                    header('Location: ../pages/account.php');
                    $db = NULL;
                }
            }
            if($New_user != ""){
                if(!change_user($db, $User, $New_user)){
                    $_SESSION['message'] = 'ERRO AO MUDAR A PASSWORD';
                    header('Location: ../pages/account.php');
                    $db = NULL;
                }
                $_SESSION['user'] = $New_user;
            }
            $_SESSION['message'] = 'DADOS ALTERADOS COM SUCESSO';
            header('Location: ../pages/account.php');
            $db = NULL;
            exit();
        }   
}
    else{
            $_SESSION['message'] = 'ERRO NA BASE DE DADOS';
            header('Location: ../pages/account.php');
            $db = NULL;
            exit();
        }
}

?>