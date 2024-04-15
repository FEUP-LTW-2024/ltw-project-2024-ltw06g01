<?php 
    session_start();
?>
<?php
    include_once("../templates/footer.php");
    include_once("../templates/header.php");
    include_once("../templates/listing.php")
?>
<?php
    print_header()
?>

    <div class = "menu">
        <ul>
            <li><a href="#">Women</a></li>
            <li><a href="#">Men</a></li>
            <li><a href="#">Children</a></li>
            <li><a href="#">Others</a></li>
        </ul>
    </div>

    <section class = "background">
        <div class = "content">
            <p class = "slogan">Tired of your old clothes?</p>

            <div class = "slogan_button">
                <a href = "#" class = "slogan_button_text">Sell now!</a>
            </div>

            <p class = "slogan_help"><a href = "#">Learn how it works</a></p>   
        </div>
    
    <?php print_listings();
    print_footer()?>