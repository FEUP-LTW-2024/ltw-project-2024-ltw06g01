<?php 
include_once("../class/user.php");
session_start();
$db = new PDO('sqlite:../database/database.db');
if(!$db){
        header('Location: ../pages/admin_page.php');
        $_SESSION['message'] = 'ERRO AO CONECTAR Á DATABASE';
        exit();
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["promote"])) {
            $username = $_POST["username"];
            if(checkUsernameExists($db, $username)){
                if(promote_admin($db, $username)){
                    header('Location: ../pages/admin_page.php');
                    $_SESSION['message'] = 'USUÁRIO PROMOVIDO A ADMIN';
                    exit();
                }
                else{
                    header('Location: ../pages/admin_page.php');
                    $_SESSION['message'] = 'ERRO AO PROMOVER O USUARIO A ADMIN';
                    exit();
                }
            }
            else{
                header('Location: ../pages/admin_page.php');
                $_SESSION['message'] = 'USUARIO NÃO ENCONTRADO';
                exit();
            }
        }

        if (isset($_POST["addFilter"])) {
            $filter = $_POST["filter"];
        }
}
?>