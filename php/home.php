<?php
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header.php");
    include_once("../class/listings.php");
?>
    <?php
        print_header();
        if (isset($_SESSION['message']))
{
    echo "<div class='valid'>" . $_SESSION['message'] .  "</div>";
}
unset($_SESSION['message']);
        print_listings();
        print_footer()?>
</html>