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
    $seller = $_GET['id'];
    $pic = get_user_by_id($seller);
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM USER WHERE IdUser = :Id");
    $stmt->bindParam(':Id', $seller);
    $stmt->execute();
    $chatter = $stmt->fetch(PDO::FETCH_ASSOC);
    print_header();
    $_SESSION['sender'] = $_SESSION['user'];
    $_SESSION['receiver'] = $pic->user;
    $currentPage = strtok($_SERVER['REQUEST_URI']);
    $_SESSION['id'] = $seller;

    ?>
    <div class ="chat-page">
    <div class="chatter">
                <?php
                    print_pic($pic);
                    echo "<p class='vendedor'> " . $pic->user . " ";
                ?>
            </div>
        <div class=chat-scroll>
            <div class="chat-container">
                <div class="chat-messages">
                    <?php
                    print_messages($db , $_SESSION['user'] , $pic->user);
                    ?>
                </div>
            </div>
        </div>
        <form method="GET" class ="chat-messages2" action="../actions/new_message.php">
            <input type="text" class="chat-input" name = "message" placeholder="Type your message here">
            <button class="send-button" type="submit">Send</button>
        </form>
    </div>
    <?php
    print_footer();
    ?>