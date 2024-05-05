<?php 
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    include_once("../class/listings.php");
    $user = get_user($_SESSION['user']);
    if (!$user){
        $_SESSION['message'] = "Tens de estar logado para acederes ao teu perfil!";
        header('Location: login.php');
        exit(); 
    }
?>

<?php
    print_header_2();
    if (isset($_SESSION['message']))
{
    echo "<div class='valid'>" . $_SESSION['message'] .  "</div>";
}
unset($_SESSION['message']);

?>


    <div class = container>
        <div class = "account_menu2"></div>
        <div class = "account_menu">
            <ul>
                <li><a href="products.php">Products</a></li>
                <li><a href="wishlist.php">Wishlist</a></li>
            </ul>
        </div>
        <div class = "left_container">

            <div class="profile-pic">
                <img src="../img/account.png" alt="Profile Picture">
            </div>

            <div class ="account_info">
                    <h1><?php
                       echo $user->name;echo ' '; echo  $user->surName ;
                    ?></h1>
                    <h2>@<?php
                        echo $user->user;
                    ?></h2>
                    <div class ="separator">
                        <h3><?php
                            echo $user->email;
                        ?></h3>
                        <a class = "edit_profile" href="edit_profile.php">
                            <img class = "pencil" src = "../img/outline_manage_accounts_black_24dp.png" alt = "" >
                        </a> 
                        <?php
                                if ($user->admin == "true") {
                                    echo '<a class="edit_profile" href="admin_page.php">';
                                    echo '<img class="pencil" src="../img/outline_manage_accounts_black_24dp.png" alt="">';
                                    echo '</a>';
                                }
                        ?>
                    </div>    
                    <div class="horizontal-line"></div>
                    <div class="user_bio">
                        <p class="user-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt 
                            skibidi toilet skibidi skibidi toilet mollit anim id est laborum.
                        </p>
                    </div>
                <div class="horizontal-line2"></div>
            </div>
        </div>
        <div class = "right_container">
            <div class = "print_stuff">
                <?php
                    print_slistings($user);
                ?>
            </div>

            <a class = "create_listing" href="image.php">CREATE LISTINGS!</a>
        </div>
    </div>
</div>
<?php
        print_footer();
    ?>    

    

