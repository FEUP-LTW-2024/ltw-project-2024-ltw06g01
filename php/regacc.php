<?php
if(isset($_GET["Username"])&& isset($_GET["Password"])){

    $User = $_GET["User"];
    $Mail = $_GET["mail"];
    $Pass = $_GET["pass"];
    $name = $_GET["name"];
    $sur = $_GET["surname"];

    $User = htmlspecialchars($User);
    $Mail = htmlspecialchars($Mail);
    $Pass = htmlspecialchars($Pass);
    $name = htmlspecialchars($name);
    $sur = htmlspecialchars($sur);

    $id = 2;
    $db = new PDO('sqlite:../database/listings.db');

    $data = [
        ':idshoppingcart' => $id,
        ':idlisting' => 1
    ];

    $sql = "INSERT INTO SHOPPINGCART(IdShoppingCart, IdListing) VALUES (:idshoppingcart, :idlisting);";
    $stmt= $db->prepare($sql);
    $stmt->execute($data);

    $data = [
        ':iduser' => $id,
        ':email' => $mail,
        ':user' => $user,
        ':idshoppingcart' => $id,
        ':password' => $pass
    ];

    $sql = "INSERT INTO USER (IdUser,Email,User,IdShoppingCart,PassWord) VALUES (:iduser,:email,:user,:idshoppingcart,:password)";
    $stmt= $db->prepare($sql);
    $stmt->execute($data);

    session_start();
    $_SESSION['login'] = true;
    header('Location: home.php');
    $db = null;
    
        /*
    if (!$db) {
        $query = "SELECT * FROM user";
        $result = $db->query($query);
        if ($result){
            $users = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($users as $user2) {
                if ($user2 == $user) {
                    $db = null;
                }
                $id = $user2['iduser'];
            }
        }
        else {
            header('Location: login.php');
            $_SESSION['message'] = 'ERRO NA CONSULTA';
        }
    }
    if (!$db) {
        $id = $id + 1;
        header('Location: login.php');
        $_SESSION['message'] = 'USERNAME JÁ ESCOLHIDO';
    } else {
        $sql = "INSERT INTO SHOPPINGCART (IdShoppingCart, IdListing) VALUES ($id, NULL);";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
        $sql = "INSERT INTO USER (IdUser,Email,User,IdShoppingCart,PassWord) VALUES ($id,$Mail,$user,$id,$pass)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
        session_start();
        $_SESSION['login'] = true;
        header('Location: home.php');
        $db = null;
    }
    */
}
?>