<?php
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
?>

<?php
    print_header_2()
?>
<div class="wrapper">
    <h1><a class = "login_link" href= "login.php">LOGIN </a>| REGISTER</h1>
    <form action = "">
        <div class = "input_box">
            <input type = "text" placeholder = "Username" required>
        </div>
        <div class = "input_box">
            <input type = "text" placeholder = "E-mail" required>
        </div>
        <div class = "input_box">
            <input type = "password" placeholder = "Password" required>
        </div>

        <div class = "name_surname">
            <input type = "text" placeholder = "Your name" required>
            <input type = "text" placeholder = "Surname" required>
        </div>
        
        <button type = "submit" class = "button2">Create account</button>  
    </form>     
</div>  
<?php print_footer()?>