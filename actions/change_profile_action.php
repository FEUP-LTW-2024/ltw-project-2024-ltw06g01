
<?php
session_start();
include_once("../class/user.php");
if(isset($_POST["Username"]) && isset($_POST["Password"]) && isset($_POST["Confirm_Password"])&& isset($_POST["Email"]) && isset($_POST["Name"]) && isset($_POST["Surname"]) ){
    $User = $_SESSION['user'];
    $New_user = htmlspecialchars($_POST["Username"]);
    $Mail = htmlspecialchars($_POST["Email"]);
    $Password = password_hash($_POST["Password"], PASSWORD_BCRYPT, ["cost" => 10]);
    $name = htmlspecialchars($_POST["Name"]);
    $sur = htmlspecialchars($_POST["Surname"]);
    if($_POST["Confirm_Password"] != $_POST["Password"]){
        header('Location: ../pages/edit_profile.php');
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
                    header('Location: ../pages/edit_profile.php');
                    $db = NULL;
                }
            }
            if($_POST["Password"] != ""){
                if ($_POST["Password"] != $_POST["Confirm_Password"]){
                    $_SESSION['message'] = 'ERRO AO MUDAR A PASSWORD';
                    header('Location: ../pages/edit_profile.php');
                    $db = NULL;
                    exit();
                }
                change_pass($db, $User, $Password);
                }
            if($Mail != ""){
                if(!change_email($db, $User, $Mail)){
                    $_SESSION['message'] = 'ERRO AO MUDAR O E-MAIL';
                    header('Location: ../pages/edit_profile.php');
                    $db = NULL;
                }
            }
            if($sur != ""){
                if(!change_surname($db, $User, $sur) ){
                    $_SESSION['message'] = 'ERRO AO MUDAR O APELIDO';
                    header('Location: ../pages/edit_profile.php');
                    $db = NULL;
                }
            }
            if($New_user != ""){
                if(!change_user($db, $User, $New_user)){
                    $_SESSION['message'] = 'ERRO AO MUDAR O USERNAME';
                    header('Location: ../pages/edit_profile.php');
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
            header('Location: ../pages/edit_profile.php');
            $db = NULL;
            exit();
        }
}

?>