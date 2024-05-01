
<?php
session_start();
include_once("../class/user.php");
if(isset($_GET["User"]) && isset($_GET["pass"]) && isset($_GET["mail"]) && isset($_GET["name"]) && isset($_GET["surname"])){
    $User = $_GET["User"];
    $Mail = $_GET["mail"];
    $Pass = md5($_GET["pass"]);
    $name = $_GET["name"];
    $sur = $_GET["surname"];
    $db = new PDO('sqlite:../database/database.db');
    $user = new User($Mail,$User,$Pass,$name,$sur,"false");

    if ($db) {
        $user2 = checkUsernameExists($db, $User) ;
        if ($user2){
            header('Location: register.php');
            $_SESSION['message'] = 'USUARIO JA EXISTE';
            $db = NULL;
                }
        else{
            $valid =register($db, $User, $Pass,$Mail,$name,$sur); 
            if($valid){
                header('Location: home.php');
                $_SESSION['login'] = true;
                $_SESSION['user'] = $User;
                $_SESSION['message'] = 'USUARIO REGISTRADO COM SUCESSO!';
            }
            else{
                $_SESSION['message'] = 'ERRO AO REGISTAR USUARIO!';
                header('Location: index.php');
            }
            $db = NULL;
        }
    }
    else{
            header('Location: register.php');
            $_SESSION['message'] = 'ERRO NA BASE DE DADOS';
            $db = NULL;
        }
}
        else {
    header('Location: register.php');
    $_SESSION['message'] = 'DADOS INVALIDOS';
}
?>