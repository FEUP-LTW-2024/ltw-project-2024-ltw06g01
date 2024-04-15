<?php 
    session_start();
?>

<?php
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
?>

<?php
    print_header_2();
?>

    <div class = "init_div"></div>    

    <div class = "account_menu">
        <ul>
            <li><a href="#">Products</a></li>
            <li><a href="#">Wishlist</a></li>
        </ul>
    </div>

    <div class="profile-pic">
        <img src="../img/account.png" alt="Profile Picture">
    </div>

    <div class ="account_info">
        <h1>Moussa Marega</h1>
        <h2>mareguinha99</h2>
        <h3>moussamaregafazogol@siuuuu.com</h3>
    </div>

    <div class = "account_line">
        <hr></hr>
    </div>    


<?php
    print_footer();
?>    
</html>    