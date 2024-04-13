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
        <link rel="stylesheet" href="../css/footer.css"></link>
        <link rel="stylesheet" href="../css/header.css"></link>
    
    </head>
    <body>
        <?php 
        if(!isset($_SESSION['login'])){?>
            <header>
            <nav id="topbar" >
                <a href="mainpage.php" id="main"><img href="mainpage.php" src="../img/icon.png" alt="SigmaSell" id="logo"></a>
                <div class = "search_box">
                    <input type = "text" class = " search_text" placeholder = "Search..." >
                    <a class = "search_btn">
                        <img class = "lupa" src = "../img/magnifying-glass(1).png" alt = "" width = "25px" height = "25px">
                    </a>    
                </div> 
               <a href="login.php" id="login">Login|</a>
               <a href="register.php" id="login">Register</a>
            </nav>
        </header>
        <?php } 
        else{?>
            <header>
            <nav id="topbar" >
                <a href="mainpage.php" id="main"><img href="mainpage.php" src="../img/icon.png" alt="SigmaSell" id="logo"></a>
                <div class = "search_box">
                    <input type = "text" class = " search_text" placeholder = "Search..." >
                    <a class = "search_btn">
                        <img class = "lupa" src = "../img/magnifying-glass(1).png" alt = "" width = "25px" height = "25px">
                    </a>    
                </div> 
               <a href="login.php" id="account"><img href="login.php" src="../img/account.png" alt="Login/Register" id="account"></a>
            </nav>
        </header>
        <?php }
        ?>
        
    <main> <?php
}
?>
