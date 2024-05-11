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
                <input type="text" name="Description" placeholder="AQUI É SUPOSTO APARECER A DISCRICAO DO USUARIO E SE POSSIVEL CLICAR AQUI NAO SUBSTITUI A DECRIÇAO MAS SIM EDITA-LA TIPO SE DISSER NInja EM VEZ DE SUBSTITUIR NInjaA TIPO EDITA SEM REMOVER O NInjA AIGHT?">
            </form>

        </div> 
        <div class = "separador"></div> 
        <div class = "edit_right_container">
            <form action="../actions/change_profile_action.php" method = "get" class ="form2">
                <div class = "change_data">
                    <div class = "edit_box">
                        <input type = "text" name = "Name" required = "required" placeholder="Name">
                    </div>
                    
                    <div class = "edit_box">
                        <input type = "text" name = "Surname" required = "required" placeholder="Last Name">

                    </div>
                    <div class = "edit_box">
                        <input type = "text" name = "Username" required = "required" placeholder="Username">
                    </div>
                    <div class = "edit_box">
                        <input type = "text" name = "Email"  required = "required" placeholder="Email">
                    </div>
                </div>    
                <div class = "change_pass">
                    <div class = "edit_box">
                        <input type = "password"  name = "Password" required = "required" placeholder="Password">
                    </div>
                    <div class = "edit_box">
                        <input type = "password" name = "Confirm_Password" required = "required" placeholder="Confirm Password">

                    </div>
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