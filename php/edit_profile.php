<?php 
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    $db = new PDO('sqlite:../database/database.db');
    $user = get_user($db, $_SESSION['user']);
?>
<?php
    print_header_2();
?>
<div class="account-settings">
        <div class = "edit_left_container">
            <div class="profile-picture">
                <img src="../img/account.png" alt="Profile Picture">
            </div>  
            <h1>
            <?php
                echo $user->name;echo ' '; echo  $user->surName ;
            ?></h1>
        </div> 
        <div class = "separador"></div> 
        <div class = "edit_right_container">
            
        </div>     
</div>
<?php
    print_footer();
?>