<?php
include_once("../class/user.php");
session_start();
$location = 'Location: ../pages/chat.php?id=' . $_SESSION['id'];
header($location);
$db = new PDO('sqlite:../database/database.db');
if (isset($_SESSION['sender']) && isset($_SESSION['receiver']) && isset($_GET['message'])) {
    if ($db){
        $sql = "INSERT INTO MESSAGE (Sender, Receiver, message)
                VALUES (?, ?, ?)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(1, $_SESSION['sender'], PDO::PARAM_STR);
                $stmt->bindParam(2, $_SESSION['receiver'], PDO::PARAM_STR); 
                $stmt->bindParam(3, $_GET['message'], PDO::PARAM_STR); 
                $stmt->execute();       
                unset($_SESSION['sender']);
                unset($_SESSION['receiver']);      
                exit(); 
    }

}
exit();
?> 