<?php 
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    include_once("../class/cart.php");

    $user = get_user($_SESSION['user']);
?>
<?php
    print_header_2();    
?>  
    <div class= "shipping-form">
        <h2 id = "title"> Shipping Form </h2>
        <p id = "nr_pr"> <?php print_number_products($user->IdUser); ?> were acquired: </p>
        <div class = "shopping_separador"> </div>
        <?php print_cart3($user->IdUser); ?>
        <div class = "shopping_separador"> </div>
        <div class = "checkout_continue">
            <?php print_price($user->IdUser) ?> 
            <a href="home.php" id = "btn_continue">Continuar a comprar</a>
        </div>    
    </div>    
<?php 
    print_footer();
?>