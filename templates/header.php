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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Imperial+Script&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Righteous&family=Ruda:wght@400..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php 
        if(!isset($_SESSION['login'])){?>
            <header>
            <nav id="topbar" >
                <a href="index.php" id="main"><img href="index.php" src="../img/icon.png" alt="SigmaSell" id="logo"></a>
                <div class = "search_box">
                    <input type = "text" class = " search_text" placeholder = "Search..." >
                    <a class = "search_btn">
                        <img class = "lupa" src = "../img/magnifying-glass(1).png" alt = "" width = "25px" height = "25px">
                    </a>    
                </div>
                <div class = "login_register"> 
                    <a href="login.php" id="login">Login</a>
                    <span class = "separator">|</span>
                    <a href="register.php" id="login">Register</a>
                </div>
            </nav>
        </header>
        <?php } 
        else{?>
            <header>
            <nav id="topbar" >
                <a href="home.php" id="main"><img href="home.php" src="../img/icon.png" alt="SigmaSell" id="logo"></a>
                <div class = "search_box">
                    <input type = "text" class = " search_text" placeholder = "Search..." >
                    <a class = "search_btn">
                        <img class = "lupa" src = "../img/magnifying-glass(1).png" alt = "" width = "25px" height = "25px">
                    </a>    
                </div> 
                <div class = log_out_account>
                <a href = "logout.php"><img href="logout.php" src="../img/logout.png" alt="Login Out" id="account"></a>
                <a href="account.php" id="account"><img href="account.php" src="../img/account.png" alt="Login/Register" id="account"></a>
                </div>
            </nav>
        </header>
        <?php }
        ?>
        
    <main> <?php
}
?>
