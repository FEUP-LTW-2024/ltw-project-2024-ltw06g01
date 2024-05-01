
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
            $_SESSION['message'] = 'USUARIO JA EXISTE';
            header('Location: register.php');
            $db = NULL;
                }
        else{
            $valid =register($db, $User, $Pass,$Mail,$name,$sur); 
            if($valid){
                $_SESSION['login'] = true;
                $_SESSION['user'] = $User;
                $_SESSION['message'] = 'USUARIO REGISTRADO COM SUCESSO!';
                header('Location: home.php');
                
            }
            else{
                $_SESSION['message'] = 'ERRO AO REGISTAR USUARIO!';
                header('Location: index.php');
            }
            $db = NULL;
        }
    }
    else{
            $_SESSION['message'] = 'ERRO NA BASE DE DADOS';
            header('Location: register.php');
            $db = NULL;
        }
}
        else {
    $_SESSION['message'] = 'DADOS INVALIDOS';
    header('Location: register.php');
}
?>