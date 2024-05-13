<?php 
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    $user = get_user($_SESSION['user']);
?>
<?php
    print_header_2();    
?>
<div class="account-settings">
        <div class = "edit_left_container">
            <div class="profile-picture">
                <img src="../img/account.png" alt="Profile Picture" id = "profile_pic">
                <img src = "../img/edit_profile.jpg" id = "pencil_edit">
            </div> 
            <h1 class ="username">
                <?php
                    echo $user->name;echo ' '; echo  $user->surName ;
                ?>
            </h1>

            <form action = "../actions/change_profile_action.php" method= "get" class = "form1">
                <input type="hidden" name="form_type" value="form1">
                <input type="text" name="Description" placeholder="<?php  echo $user->Description ?>">
            </form>

        </div> 
        <div class = "separador"></div> 
        <div class = "edit_right_container">
            <form action="../actions/change_profile_action.php" method = "get" class ="form2">
                <div class = "change_data">
                    <div class = "edit_box">
                        <input type = "text" name = "Name" id="edit_input" placeholder="<?php  echo $user->name ?>">
                    </div>
                    <div class = "edit_box">
                        <input type = "text" name = "Surname" id="edit_input" placeholder="<?php echo $user->surName ?>">

                    </div>
                    <div class = "edit_box">
                        <input type = "text" name = "Username" id="edit_input"  placeholder="<?php echo $user->user ?>">
                    </div>
                    <div class = "edit_box">
                        <input type = "text" name = "Email" id="edit_input"  placeholder="<?php echo $user->email ?>">
                    </div>
                </div>    
                <div class = "change_pass">
                    <div class = "edit_box">
                        <input type = "password"  name = "Password" id="edit_input" placeholder="Password">
                    </div>
                    <div class = "edit_box">
                        <input type = "password" name = "Confirm_Password" id="edit_input" placeholder="Confirm Password">
                    </div>
                    <input type="hidden" name="form_type" value="form2">
                </div>   
                <div class = "buttons">
                    <button type = "submit" class = "save_button">Save</button>  
                    <button type= "button" class="cancel_button" onclick="window.location.href = 'account.php';">Cancel</button>
                </div>    

            </form> 
        </div>     
</div>
<?php
    print_footer();
?>