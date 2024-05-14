<?php 
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header2.php");
    include_once("../class/user.php");
    $user = get_user($$_SESSION['user']);
    if ($user->admin == 'true'){
        $_SESSION['message'] = "Acesso Negado!";
        header('Location: account.php');
        die(); 
    }
?>
<?php
    print_header_2();
?>
<div class="admin">
    <h2>Admin Panel</h2>
    <form method="post" action="../actions/admin_action.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <button type="submit" name="promote">Promote to Admin</button>
    </form>
    <h3>Filter Management</h3>
    <form method="post" action="../actions/admin_action.php">
        <label for="filter">Filter:</label>
        <select id="filter" name="filter">
        <option name="Brand">Brand</option>
        <option name="Type">Type</option>
        <option name="Gender">Gender</option>
        <option name="Size">Size</option>
        <option name="Colour">Colour</option>
        <option name="State">State</option>
        </select>
        <input type="text" id="filter_name" name="filter_name">
        <button type="submit" name="addFilter">Add Filter</button>
    </form>
</div>
<?php
    print_footer();
?>