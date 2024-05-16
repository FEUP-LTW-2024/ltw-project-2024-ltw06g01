<?php 
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    include_once("../class/listings.php");
    include_once("../class/transactions.php");

    $user = get_user($_SESSION['user']);
    $IdTransaction = $_COOKIE['IdTransaction'];
?>
<?php
    print_header_2();    
?>  
    <div class= "shipping-form">
        <h2 id = "title"> Shipping Form </h2>
        <p id = "nr_pr">  were acquired: </p>
        <div class = "shopping_separador"> </div>
        <?php print_transaction($IdTransaction) ?>
        <div class = "shopping_separador"> </div>
        <div class = "checkout_continue">
            <?php  ?> 
        </div>    
    </div>    
<?php 
    print_footer();
?>