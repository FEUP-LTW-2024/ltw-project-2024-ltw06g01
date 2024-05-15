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
    <h2 id = "title"> Shopping cart </h2>
    <p id = "nr_pr"> <?php echo get_number_products($user->IdUser); ?> </p>
    <div class = "shopping_separador"> </div>
    <?php print_cart($user->IdUser); ?>
    <div class = "shopping_separador"> </div>
    <div class = "checkout_continue">
        <?php print_price($user->IdUser) ?> 
        <a href="checkout.php" id="btn_checkout">Checkout</a>
        <a href="home.php" id = "btn_continue">Continuar a comprar</a>
    </div>    
<?php 
    print_footer();
?>