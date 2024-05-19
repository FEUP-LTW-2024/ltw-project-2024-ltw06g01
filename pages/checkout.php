<?php 
    session_start();
    if (!isset($_SESSION['csrf'])) {
        $_SESSION['csrf'] = generate_random_token();
      }
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    include_once("../class/cart.php");
    $user = get_user($_SESSION['user']);
    if ( $_SESSION['login'] == false){
        $_SESSION['message'] = "Tens de estar loggado!";
        header('Location: index.php');
        die(); 
    }
?>
<?php
    print_header_2();   
    $products = get_number_products($user->IdUser);
    $pos = strpos($products, ' ');
    $nr_produtos = intval(substr($products, 0, $pos));
    if($nr_produtos == 0){
        header('Location: ../pages/shopping_cart.php');
        exit();
    }
?>

<div class = "checkout_page">

        <div class = "checkout_border">
            <h1 class = "checkout_title">$IGMA-$ELL</h1>
            <div class= "checkout_line1"></div>
        </div>    

        <div class = "checkout_products">    

            <div class = "products">
                <?php print_cart2($user->IdUser); ?>
            </div>   

            <div class= "checkout_line"></div>

            <div class = "_div">
                <h3 class ="total">Total:</h3> 
                <?php print_price2($user->IdUser); ?> 
            </div> 
        </div>

        <div class = "discount_div">
                <input type="text" id="discount_code" name="code" placeholder="Enter your Discount Code">
                <button id ="gift_button"><img href="home.php" src="../img/gift.png" alt="SigmaSellGift" id="redeem"></button>
        </div>   

        <div class = "checkout_form">
                <h1 id = "tc">Checkout</h1>
                <div class= "checkout_line2"></div>
                <div class = "form_">
                    <div class = "gray_div">
                            <h2 id = "labels">1. Shipping</h2>
                    </div> 

                    <form action="../actions/checkout_action.php" method = "post" id = "form_1">
                    <input type="hidden" name="csrf" value="<?=($_SESSION['csrf'])?>">
                        <div class = "columns">
                            <label for ="Country" id = "checkout_label">Delivery Country*</label>
                            <input type="text" name="country" placeholder = "Portugal" id ="checkout_input" required>

                            <label for ="NIF" id = "checkout_label">NIF</label>
                            <input type="text" name="NIF" placeholder = "123456789" id ="checkout_input">

                            <label for ="Address" id = "checkout_label">Address*</label>
                            <input type="text" name="Address" placeholder = "Rua Azul 100" id ="checkout_input" required>
                        </div>    

                        <div class = "two_inputs">
                            <div class="input_wrapper">
                                <label for ="PostalCode">Postal Code*</label><br>
                                <input type="text" name="PostalCode" placeholder = "1234-123" required><br>
                            </div>    

                            <div class="input_wrapper">        
                                <label for ="Location">Location*</label><br>
                                <input type="text" name="Location" placeholder = "Porto" required><br>
                            </div>       
                        </div>    
                   

                    <div class = "gray_div">
                            <h2 id = "labels">2. Payment</h2>
                    </div>

                            <div class = "columns">
                                <label for ="card_name" id = "checkout_label2">Cardholder's Name*</label>
                                <input type="text" name="card_name" placeholder = "John Doe" id ="checkout_input2" required>

                                <label for ="Card_Num" id = "checkout_label2">Card Number*</label>
                                <input type="text" name="card_num" placeholder = "1234-5678-1234-5678" id ="checkout_input2">
                            </div>  

                        <div class = "two_inputs">
                            <div class="input_wrapper">
                                <label for ="Exp_date">Expiration Date*</label>
                                <input type="month" name="exp_date" placeholder="YY/MM" id ="checkout_input" required>
                            </div>    

                            <div class="input_wrapper">        
                                <label for ="CVC">CVC*</label><br>
                                <input type="text" id="cvc" name="cvc" pattern="[0-9]{3}" maxlength="3" placeholder = "123" required><br>
                            </div>       
                        </div> 
                        <div class= "checkout_line2"></div>
                        <div class = "checkout_div">
                                <button class="checkout-btn" type = "submit"><div class = "text_c">Payment</div>
                                    <img src="../img/checkout.svg" alt="Checkout" id="check_img">
                                </button>
                        </div>    
                    </form>
        </div> 
</div>
<?php
    print_footer();
?>