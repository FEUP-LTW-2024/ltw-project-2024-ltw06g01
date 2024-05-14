<?php 
    declare(strict_types = 1);
function print_header_2() { ?>
<!DOCTYPE html>
<html lang="PT-pt">
    <head>
        <title>SigmaSell - Fanum Tax your skibidis</title>
        <meta name = "LTW Project" content="width=device-width, initial-scale=1.0"></meta>
        <link rel="stylesheet" href="../css/style.css"></link>
        <link rel="stylesheet" href="../css/footer.css"></link>
        <link rel="stylesheet" href="../css/header2.css"></link>
        <link rel="stylesheet" href="../css/login_register.css"></link>
        <link rel="stylesheet" href="../css/account_style.css"></link>
        <link rel="stylesheet" href="../css/edit_profile.css"></link>
        <link rel="stylesheet" href="../css/newlistings.css"></link>
        <link rel="stylesheet" href="../css/admin_style.css"></link>
        <link rel="stylesheet" href="../css/shopping_cart.css"></link>
        <link rel="stylesheet" href="../css/checkout.css"></link>
        <script src = "../js/script.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Righteous&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ruda:wght@400..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <?php
                if($_SESSION['login']){
            ?><a href="home.php" ><img href="home.php" src="../img/icon.png" alt="SigmaSell" id="logo"></a>
            <?php
                }
                else{
            ?><a href="index.php" ><img href="index.php" src="../img/icon.png" alt="SigmaSell" id="logo"></a>
            <?php
                }
            ?>
        </header>
    <main> <?php
}
?>
