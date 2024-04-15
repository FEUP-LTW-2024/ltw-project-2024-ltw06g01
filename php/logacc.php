<?php
if(isset($_GET["Username"])&& isset($_GET["Password"])){
    $Username = $_GET["Username"];
    $Password = $_GET["Password"];
    $Username = htmlspecialchars($Username);
    $Password = htmlspecialchars($Password);
    $db = new PDO('sqlite:../database/listings.db');
    if (!$db) {
        header('Location: login.php');
        $_SESSION['message'] = 'ERRO NO BANCO DE DADOS';
    } else {
 
        $query = "SELECT * FROM user";
        $result = $db->query($query);

        if ($result) {
            $users = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($users as $user) {
                if($Username == $user['User']){
                    if($Password == $user['PassWord']){
                        session_start();
                        $_SESSION['login'] = true;
                        header('Location: home.php');
                    }
                    else{
                        header('Location: login.php');
                        $_SESSION['message'] = 'DADOS INVALIDOS';
                    }
                }
                }
        } else {
            header('Location: login.php');
            $_SESSION['message'] = 'ERRO NA CONSULTA';
        }

        $db = null;
    }
}
?>