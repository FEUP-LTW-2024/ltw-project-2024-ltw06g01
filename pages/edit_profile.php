<?php 
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    $user = get_user($_SESSION['user']);
    if ( $_SESSION['login'] == false){
        $_SESSION['message'] = "Tens de estar loggado!";
        header('Location: index.php');
        die(); 
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
<div class="account-settings">
        <div class = "edit_left_container">
            <div class="profile-picture">
                <?php print_pic($user) ?>
                <form action="../actions/uploadpic.php" method="post" enctype="multipart/form-data" id="upload">
                <input type="file" name="image" id="image" accept="image/*" required hidden>
                    <label for="image">  
                        <img src = "../img/edit_profile.jpg" id = "pencil_edit"> 
                    </label>
                    <button type="submit">Change pic</button>
                </form>
            </div> 
            <h1 class ="username">
                <?php
                    echo $user->name;echo ' '; echo  $user->surName ;
                ?>
            </h1>
        </div> 
        <div class = "separador"></div> 
        <div class = "edit_right_container">
            <form action="../actions/change_profile_action.php" method = "post" class ="form2">
                <div class = "change_data">
                    <div class = "name_surname_edit">
                    <div class = "edit_box">
                        <input type = "text" name = "Name" id="edit_input" placeholder="<?php  echo $user->name ?>">
                    </div>
                    <div class = "edit_box">
                        <input type = "text" name = "Surname" id="edit_input" placeholder="<?php echo $user->surName ?>">

                    </div>
                    </div>
                    <div class = "userrname_email_edit">
                    <div class = "edit_box">
                        <input type = "text" name = "Username" id="edit_input"  placeholder="<?php echo $user->user ?>">
                    </div>
                    <div class = "edit_box">
                        <input type = "text" name = "Email" id="edit_input"  placeholder="<?php echo $user->email ?>">
                    </div>
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