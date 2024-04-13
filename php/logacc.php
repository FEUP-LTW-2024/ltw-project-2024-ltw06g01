<?php
if(isset($_GET["Username"])&& isset($_GET["Password"])){
    $User = 'sus';
    $Pass = '123';
    $Username = $_GET["Username"];
    $Password = $_GET["Password"];
    $Username = htmlspecialchars($Username);
    $Password = htmlspecialchars($Password);
    if($Username == $User && $Password == $Pass){
        session_start();
        $_SESSION['login'] = true;
        header('Location: home.php');
    }
    else{
        header('Location: login.php');
        echo 'Dados Invalidos';
    }
}
?>