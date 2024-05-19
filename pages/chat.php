<?php
    session_start();
    include_once("../class/transactions.php");
    if (!isset($_SESSION['csrf'])) {
        $_SESSION['csrf'] = generate_random_token();
      }
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
                        echo " <p class = 'chatting_w'> Chatting with: </p> <p class='vendedor'> " . $pic->user . " ";
                        echo " <div class = 'go_lower'>";
                        print_pic($pic);
                        echo " </div>";
                    ?>
        </div>

        <div class=chat-scroll>
            <div class="chat-container">

                <div class="chat-messages">
                    <?php
                    print_messages($_SESSION['user'] , $pic->user);
                    ?>
                </div>


                <div class = formulario>
                    <form method="GET" class ="chat-messages2" action="../actions/new_message.php">
                        <input type="hidden" name="csrf" value="<?=($_SESSION['csrf'])?>">
                        <input type="text" class="chat-input" name = "message" placeholder="Type your message here">
                        <button class="send-button" type="submit">Send</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    </div>
    <?php
    print_footer();
    ?>
