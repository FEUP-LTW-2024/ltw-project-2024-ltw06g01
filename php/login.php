<?php
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
?>

<?php
    print_header_2()
?>

<div class="wrapper">
    <h1>LOGIN | <a class = "register_link" href= "register.php">REGISTER</a></h1>
    <form action = "">
        <div class = "input_box">
            <input type = "text" placeholder = "Username" required>
        </div>
        
        <div class = "input_box">
            <input type = "password" placeholder = "Password" required>
        </div>
        
        <div class = "forgot">
            <a href="#">Forgot Password?</a>
        </div>

        <button type = "submit" class = "button">Login</button>  
    </form>     
</div>  
<?php print_footer()?>