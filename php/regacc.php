
<?php
session_start();
if(isset($_POST["User"]) && isset($_POST["pass"]) && isset($_GET["mail"]) && isset($_GET["name"]) && isset($_GET["surname"])){
    $User = $_GET["User"];
    $Mail = $_GET["mail"];
    $Pass = md5($_GET["pass"]);
    $name = $_GET["name"];
    $sur = $_GET["surname"];
    $db = new PDO('sqlite:../database/listings.db');

    if ($db) {
        $query = "SELECT * FROM user WHERE user = :username";
        $result = $db->query($query);
        $result->bindParam(':username', $User);
        $result->execute();
        $user2 = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($user2){
            header('Location: register.php');
            $_SESSION['message'] = 'USUARIO JA EXISTE';
            $db = NULL;
                }
        else{
            $stmt= $db->prepare('INSERT INTO USER (Email,User,PassWord) VALUES (?,?,?)');
            $stmt->execute([$Mail,$User, $Pass]);
            $query = "SELECT * FROM user WHERE user = :username";
            $result = $db->query($query);
            $result->bindParam(':username', $User);
            header('Location: home.php');
            $_SESSION['login'] = true;
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