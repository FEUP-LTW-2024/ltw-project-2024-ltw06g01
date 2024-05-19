
<?php
session_start();
include_once("../class/user.php");
if(isset($_POST["User"]) && isset($_POST["pass"]) && isset($_POST["mail"]) && isset($_POST["name"]) && isset($_POST["surname"])){
    $User = $_POST["User"];
    $Mail = $_POST["mail"];
    $Pass = password_hash($_POST["pass"], PASSWORD_BCRYPT, ["cost" => 10]);
    $name = $_POST["name"];
    $sur = $_POST["surname"];
    $db = new PDO('sqlite:../database/database.db');

    if ($db) {
        $user2 = checkUsernameExists($db, $User) ;
        if ($user2){
            $_SESSION['message'] = 'USUARIO JA EXISTE';
            header('Location: ../pages/register.php');
            $db = NULL;
                }
        else{
            $valid =register($db, $User, $Pass,$Mail,$name,$sur); 
            if($valid){
                $_SESSION['login'] = true;
                $_SESSION['user'] = $User;
                $_SESSION['message'] = 'USUARIO REGISTRADO COM SUCESSO!';
                header('Location: ../pages/home.php');
                
            }
            else{
                $_SESSION['message'] = 'ERRO AO REGISTAR USUARIO!';
                header('Location: ../pages/index.php');
            }
            $db = NULL;
        }
    }
    else{
            $_SESSION['message'] = 'ERRO NA BASE DE DADOS';
            header('Location: ../pages/register.php');
            $db = NULL;
        }
}
        else {
    $_SESSION['message'] = 'DADOS INVALIDOS';
    header('Location: ../pages/register.php');
}
?>