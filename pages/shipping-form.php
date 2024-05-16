<?php 
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    include_once("../class/listings.php");
    include_once("../class/transactions.php");

    $user = get_user($_SESSION['user']);
    if ( $_SESSION['login'] == false){
        $_SESSION['message'] = "Tens de estar loggado!";
        header('Location: index.php');
        die(); 
    }
    $IdTransaction = $_GET['IdTransaction'];
?>
<?php
    print_header_2();    
?>  
    <div class= "shipping-form">
        <h2 id = "title"> Shipping Form </h2>
        <p id = "nr_pr"> You bought <?php echo get_number_bought($IdTransaction) ?> </p>
        <div class = "shopping_separador"> </div>
        <?php print_transaction($IdTransaction)?>
        <div class = "shopping_separador"> </div>
        <div class = "buyer_fname">
            <p id = "buyer_name"> <?php echo $user->name ?> </p>      
            <p id = "buyer_surName"> <?php echo $user->surName ?> </p> 
        </div> 
        <div class = "address_info">
            <?php get_adress_buyer($IdTransaction) ?>
        </div>

        
    </div>    
<?php 
    print_footer();
?>