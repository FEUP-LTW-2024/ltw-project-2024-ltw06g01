<?php 
    declare(strict_types = 1);
    session_start();
function print_header() { ?>
<!DOCTYPE html>
<html lang="PT-pt">
    <head>
        <title>SigmaSell - Fanum Tax your skibidis</title>
        <meta name = "LTW Project" content="width=device-width, initial-scale=1.0"></meta>
        <link rel="stylesheet" href="../css/style.css"></link>
        <link rel="stylesheet" href="../css/listings.css"></link>
        <link rel="stylesheet" href="../css/footer.css"></link>
        <link rel="stylesheet" href="../css/header.css"></link>
        <link rel="stylesheet" href="../css/index.css"></link>
        <link rel="stylesheet" href="../css/filters.css"></link>
        <link rel="stylesheet" href="../css/home.css"></link>
        <link rel="stylesheet" href="../css/createlistings.css"></link>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Righteous&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ruda:wght@400..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php 
        if(!isset($_SESSION['login'])){?>
            <header>
                <a href="index.php" ><img href="index.php" src="../img/icon.png" alt="SigmaSell" id="logo"></a>
                <div class = "login_register"> 
                    <a href="shopping_cart.php"><img  src="../img/shopping-cart.png" alt="Shopping Cart" id = "shopping_img"></a>
                    <a href="login.php" id="login">Login</a>
                    <span class = "separator">|</span>
                    <a href="register.php" id="login">Register</a>
                </div>
        </header>
        <?php } 
        else{?>
            <header>
                <a href="home.php" ><img href="home.php" src="../img/icon.png" alt="SigmaSell" id="logo"></a>
            
                <div class = log_out_account>
                    <a href="shopping_cart.php"><img  src="../img/shopping-cart.png" alt="Shopping Cart" id = "shopping_img"></a>
                    <a href = "../actions/logout_action.php" ><img href="../actions/logout_action.php" src="../img/logout.png" alt="Login Out" id="logout"></a>
                    <a href="account.php" ><img href="account.php" src="../img/account.png" alt="Login/Register" id="account"></a>
                </div>
        </header>
        <?php }
        ?>
    <main> <?php
}
?>
