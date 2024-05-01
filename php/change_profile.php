
<?php
session_start();
include_once("../class/user.php");
if(isset($_GET["Username"]) && isset($_GET["Password"]) && isset($_GET["Confirm_Password"])&& isset($_GET["Email"]) && isset($_GET["Name"]) && isset($_GET["Surname"])){
    $User = $_SESSION['user'];
    $New_user = $_GET["Username"];
    $Mail = $_GET["Email"];
    $Password = md5($_GET["Password"]);
    $Confirm_Password = md5($_GET["Password"]); 
    $name = $_GET["Name"];
    $sur = $_GET["Surname"];
    if($Password != $Confirm_Password){
        header('Location: account.php');
        $_SESSION['message'] = 'ERRO NA CONFIRMAÇÃO DA PASSWORD';
    }
    $db = new PDO('sqlite:../database/database.db');
    if ($db) {
        $user2 = checkUsernameExists($db, $New_user) ;
        if ($user2){
            header('Location: account.php');
            $_SESSION['message'] = 'USUARIO JA EXISTE';
            $db = NULL;
            exit();
        }
        else{
            if(!change_user($db, $User, $New_user)){
                header('Location: account.php');
                $_SESSION['message'] = 'ERRO AO MUDAR A PASSWORD';
                $_SESSION['user'] = $New_user;
                $db = NULL;
                exit();
            }
            if(!change_pass($db, $User, $Password)){
                header('Location: account.php');
                $_SESSION['message'] = 'ERRO AO MUDAR A PASSWORD';
                $db = NULL;
                exit();
            }
            if(!change_email($db, $User, $Mail) ){
                header('Location: account.php');
                $_SESSION['message'] = 'ERRO AO MUDAR O E-MAIL';
                $db = NULL;
            }
            if(!change_name($db, $User, $name) ){
                header('Location: account.php');
                $_SESSION['message'] = 'ERRO AO MUDAR O NOME';
                $db = NULL;
                exit();
            }
            if(!change_surname($db, $User, $sur) ){
                header('Location: account.php');
                $_SESSION['message'] = 'ERRO AO MUDAR O APELIDO';
                $db = NULL;
                exit();
            }
            header('Location: account.php');
            $_SESSION['message'] = 'DADOS ALTERADOS COM SUCESSO';
            $db = NULL;
            exit();
        }
        
    }
    else{
            header('Location: account.php');
            $_SESSION['message'] = 'ERRO NA BASE DE DADOS';
            $db = NULL;
            exit();
        }
}

?>