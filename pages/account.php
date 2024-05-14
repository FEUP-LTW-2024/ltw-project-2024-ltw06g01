<?php 
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    include_once("../class/listings.php");
    include_once("../class/wishlist.php");
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
        <div class = "upper_container">
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
                    <h3><?php
                            echo $user->email;
                    ?></h3>
                    <div class = "edit_profile" >
                    <a  href="edit_profile.php">
                            <img class = "pencil" src = "../img/outline_manage_accounts_black_24dp.png" alt = "" >
                    </a> 
                    <?php
                                if ($user->admin == "true") {
                                    echo '<a " href="admin_page.php">';
                                    echo '<img class="pencil" src="../img/outline_manage_accounts_black_24dp.png" alt="">';
                                    echo '</a>';
                                }
                    ?>
                    </div>
            </div>
        </div>
        <div class = "middle_container">
            <ul>
                <li><button onclick = "print_self_listings()"  id= "products_link">Products</button></li>
                <li><button onclick = "print_wishlist()" id="wishlist_link">Wishlist</button></li>
            </ul>
        </div>
        <div class = "bottom_container">
            <div class = "print_stuff">
                <script> print_self_listings() </script>
            </div>
            <a class = "create_listing" href="image.php">CREATE LISTINGS!</a>
        </div>
    </div>
</div>
<?php
        print_footer();
?>    

    

