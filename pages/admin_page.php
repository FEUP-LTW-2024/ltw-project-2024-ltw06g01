<?php 
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    $db = new PDO('sqlite:../database/database.db');
    $user = get_user($db, $_SESSION['user']);
    if ($user->admin == 'false'){
        $_SESSION['message'] = "Acesso Negado!";
        header('Location: account.php');
        exit(); 
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
<div class="admin">
    <h2>User Admin Panel</h2>
    <form method="post" action="../actions/admin_action.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <button type="submit" name="promote">Promote to Admin</button>
    </form>
    <hr>
    <h3>Filter Management</h3>
    <form method="post" action="../actions/admin_action.php">
        <label for="filter">Filter:</label>
        <input type="text" id="filter" name="filter">
        <button type="submit" name="addFilter">Add Filter</button>
        <button type="submit" name="removeFilter">Remove Filter</button>
    </form>
</div>
<?php
    print_footer();
?>