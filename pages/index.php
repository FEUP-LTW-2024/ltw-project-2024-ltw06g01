<?php 
    session_start();
?>
<?php
    include_once("../templates/footer.php");
    include_once("../templates/header.php");
    include_once("../class/listings.php")
?>
<?php
    print_header();
    if (isset($_SESSION['message']))
    {
        echo "<div class='error'>" . $_SESSION['message'] .  "</div>";
    }
    unset($_SESSION['message']);
?>
    <section class = "background">
        <div class = "content">
            <p class = "slogan">Tired of your old clothes?</p>
        </div>  
        <div href = "register.php" class = "slogan_button">
                <a href = "register.php" class = "slogan_button_text">Sell now!</a>
        </div>
    </section>
    <div class = "green_line"></div>

        <?php 
            print_listings();
        ?>

<?php
    print_footer();
?>        