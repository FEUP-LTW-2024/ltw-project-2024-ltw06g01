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
    <h1>LOGIN | <a class = "register_link" href= "register.php">REGISTER</a></h1>
    <form action="../actions/login_action.php" method = "get">
        <div class = "input_box">
            <input type = "text" placeholder = "Username" name = "Username" required>
        </div>
        
        <div class = "input_box">
            <input type = "password" name = "Password" placeholder = "Password" required>
        </div>
        
        <div class = "forgot">
            <a href="#">Forgot Password?</a>
        </div>

        <button type = "submit" class = "button">Login</button>  
    </form>     
</div>  
<?php print_footer()?>