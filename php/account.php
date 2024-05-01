<?php 
    session_start();

?>

<?php
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    $db = new PDO('sqlite:../database/database.db');
    $user = get_user($db, $_SESSION['user']);
?>

<?php
    print_header_2();
?>

    <div class = "init_div"></div>    

    <div class = container>
        <div class = "account_menu">
            <ul>
                <li><a href="#">Products</a></li>
                <li><a href="#">Wishlist</a></li>
            </ul>
        </div>

        <div class = "left_container">
            <div class="profile-pic">
                <img src="../img/account.png" alt="Profile Picture">
            </div>

            <div class ="account_info">
                    <a class = "edit_profile" href="edit_profile.php">
                        <img class = "pencil" src = "../img/edit_profile.jpg" alt = "" >
                    </a> 
                    <h1><?php
                       echo $user->name;echo ' '; echo  $user->surName ;
                    ?></h1>
                    <h2><?php
                        echo $user->user;
                    ?></h2>
                    <h3><?php
                        echo $user->email;
                    ?></h3>
                      
                    <div class="horizontal-line"></div>
                    <div class="user_bio">
                        <p class="user-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                <div class="horizontal-line2"></div>
            </div>
        </div>
    </div>
<?php
    print_footer();
?>    
</html>    