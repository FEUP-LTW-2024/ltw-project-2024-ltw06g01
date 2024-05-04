<?php
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
?>

<?php
    session_start();
    print_header_2();
    if (isset($_SESSION['message']))
{
    echo "<div class='error'>" . $_SESSION['message'] .  "</div>";
}
unset($_SESSION['message']);
?>
<div class="wrapper">
    <h1><a class = "login_link" href= "login.php">LOGIN </a>| REGISTER</h1>
    <form action = "../actions/register_action.php" method="get">
        <div class = "input_box">
            <input type = "text" placeholder = "Username" name = "User"required>
        </div>
        <div class = "input_box">
            <input type = "email" placeholder = "E-mail" name = "mail" required>
        </div>
        <div class = "input_box">
            <input type = "password" placeholder = "Password" name = "pass" required>
        </div>

        <div class = "name_surname">
            <input type = "text" placeholder = "Your name" name="name" required>
            <input type = "text" placeholder = "Surname" name="surname" required>
        </div>
        
        <button type = "submit" class = "button2">Create account</button>  
    </form>     
</div>  
<?php print_footer()?>