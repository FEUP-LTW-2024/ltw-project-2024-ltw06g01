<?php
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
?>

<?php
    print_header_2()
?>
<div class="wrapper">
    <h1><a class = "login_link" href= "login.php">LOGIN </a>| REGISTER</h1>
    <form action = "regacc.php" method="get">
        <div class = "input_box">
            <input type = "text" placeholder = "Username" name = "User"required>
        </div>
        <div class = "input_box">
            <input type = "text" placeholder = "E-mail" name = "mail" required>
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