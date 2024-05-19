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
            $filter_name = htmlspecialchars($_POST["filter_name"]);
            $stmt = $db->prepare("INSERT INTO $filter ($filter) VALUES (:filter_name)");
            $stmt->bindParam(':filter_name', $filter_name);
            $stmt->execute();
            header('Location: ../pages/admin_page.php');
            $_SESSION['message'] = 'FILTRO ADICIONADO';
            exit();
        }
}
?>