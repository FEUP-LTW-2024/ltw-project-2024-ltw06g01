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
            <form action="edit_profile.php" method = "get">
                <div class = "change_data">
                    <div class = "edit_box">
                        <input type = "text" name = "First Name" required = "required" >
                        <span>First Name</span>
                    </div>
                    
                    <div class = "edit_box">
                        <input type = "text" name = "Surname" required = "required" >
                        <span>Last Name</span>

                    </div>
                    <div class = "edit_box">
                        <input type = "text" name = "Username" required = "required">
                        <span>Username</span>
                    </div>
                    <div class = "edit_box">
                        <input type = "text" name = "Email"  required = "required">
                        <span>Email</span>
                    </div>
                </div>    
                <div class = "change_pass">
                    <div class = "edit_box">
                        <input type = "password"  name = "Password" required = "required">
                        <span>Password</span>
                    </div>
                    <div class = "edit_box">
                        <input type = "password" name = "Confirm_Password" required = "required" >
                        <span>Confirm Password</span>

                    </div>
                </div>   
                
                <button type = "submit" class = "save_button">Save</button>  
                <button type= "button" class="cancel_button" onclick="window.location.href = 'account.php';">Cancel</button>

            </form> 
        </div>     
</div>
<?php
    print_footer();
?>