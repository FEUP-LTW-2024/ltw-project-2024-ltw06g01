<?php
    session_start();
    include_once("../templates/footer.php");
    include_once("../templates/header.php");
    include_once("../class/listings.php");
    include_once("../class/user.php");
    $user = get_user($_SESSION['user']);
    if ( $_SESSION['login'] == false){
        $_SESSION['message'] = "Tens de estar loggado!";
        header('Location: index.php');
        die(); 
    }
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
<div class=productinfo>
    <?php
        $owner = get_user_by_id($listing['IdUser']);
        echo "<p class='productname'> Nome : " . $listing['Name'] . "</p>";
        echo "<p class='productname'> Preço : " . $listing['Price'] . "€</p>";
        echo "<p class='productname'> Marca : " . get_brand($db, $listing['IdBrand']) . "</p>";
        echo "<p class='productname'> Tamanho : " . get_size($db, $listing['IdSize']) . "</p>";
        echo "<p class='productname'> Cor : " . get_color($db, $listing['IdColour']) . "</p>";
        echo "<p class='productname'> Estado : " . get_state($db, $listing['IdState']) . "</p>";
        echo "<p class='productname'> Género : " . get_gender($db, $listing['IdGender']) . "</p>";
        echo "<p class='productname'> Tipo : " . get_type($db, $listing['IdType']) . "</p>";
        echo "<p class='productname'> Vendedor : " . $owner->name . " ";
        print_pic($owner);
        echo "<a href='chat.php?id={$listing['IdUser']}' >Contact Seller</a>";
        echo "</p>";
    ?>
</div>
</div>
    <?php
    print_footer();
    ?>