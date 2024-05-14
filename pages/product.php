<?php
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header.php");
    include_once("../class/listings.php");
    include_once("../class/user.php");
    $user = get_user($_SESSION['user']);
    print_header();
    $Id = $_GET['id'];
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM LISTINGS WHERE IdListing = :Id");
    $stmt->bindParam(':Id', $Id);
    $stmt->execute();
    $listing = $stmt->fetch(PDO::FETCH_ASSOC);
    $image = $listing['img'];
    $imageSource = "data:image/jpeg;base64," . base64_encode($image);
    ?>
<div class=productgrid>
<?php
    echo "<img class='product' src=\"$imageSource\">";
?>
<div class=productinfo></div>
</div>
    <?php
    print_footer();
    ?>