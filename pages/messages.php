<?php
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header.php");
    include_once("../class/listings.php");
    include_once("../class/user.php");
    $user = get_user($_SESSION['user']);
    if (!$user){
        $_SESSION['message'] = "Tens de estar logado para acederes ao chat!";
        header('Location: login.php');
        exit(); 
    }
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM USER WHERE User = :username");
    $stmt->bindParam(':username', $_SESSION['user']);
    $stmt->execute();
    $chatter = $stmt->fetch(PDO::FETCH_ASSOC);
    print_header();
    ?>
    <div id="messages-scroll">
        <?php
            $stmt = $db->prepare("SELECT * FROM USER WHERE User != :username");
            $stmt->bindParam(':username', $_SESSION['user']);
            $stmt->execute();
            $chatters = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($chatters as $message){
                check_message($_SESSION['user'],$message['User']);
            }
        ?>
    </div>
    <?php
    print_footer();
?>