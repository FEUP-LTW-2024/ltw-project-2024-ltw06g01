<?php
include_once("../class/listings.php");
class CartItem {
    public $IdListing;
    public $IdUser;

    public function __construct($IdListing, $IdUser) {
        $this->IdListing = $IdListing;
        $this->IdUser = $IdUser;
    }
}
function check_cart($db, $IdUser, $IdListing) {
    $stmt = $db->prepare("SELECT * FROM SHOPPINGCART WHERE IdUser = :IdUser AND IdListing = :IdListing");
    $stmt->bindParam(':IdUser', $IdUser);
    $stmt->bindParam(':IdListing', $IdListing);
    $stmt->execute();
    $SHOPPINGCART = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $SHOPPINGCART;
}
function add_cart($db, $IdUser, $IdListing) {
    $stmt = $db->prepare("INSERT INTO SHOPPINGCART (IdListing, IdUser) VALUES (:IdListing, :IdUser)");
    $stmt->bindParam(':IdListing', $IdListing);
    $stmt->bindParam(':IdUser', $IdUser);
    return $stmt->execute();
} 
function remove_cart($db, $IdUser, $IdListing) {
    $stmt = $db->prepare("DELETE FROM SHOPPINGCART WHERE IdListing = :IdListing AND IdUser = :IdUser");
    $stmt->bindParam(':IdListing', $IdListing);
    $stmt->bindParam(':IdUser', $IdUser);
    return $stmt->execute();
  }  
function print_number_products($IdUser){
    $db = new PDO('sqlite:../database/database.db');
    $query = "SELECT COUNT(*) AS num_products FROM SHOPPINGCART WHERE IdUser = :IdUser";
    $statement = $db->prepare($query);
    $statement->bindParam(':IdUser', $IdUser);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $num_products = $result['num_products'];
    $produtos = " produto";
    if($num_products != 1) {
        $produtos = $produtos . "s";
    }
    echo  $num_products . $produtos;
}
function print_price($IdUser){
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM SHOPPINGCART WHERE IdUser = :IdUser");
    $stmt->bindParam(':IdUser', $IdUser);
    $stmt->execute();
    $cart = $stmt->fetchAll();
    $price = 0;
    foreach ($cart as $row) {
        $IdListing = $row['IdListing'];
        $query = "SELECT * FROM listings WHERE IdListing = :IdListing";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':IdListing', $IdListing); 
        $stmt->execute();
        $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listings as $listing) {
            $price = $price + $listing['Price'];
        }
    }
    echo "<p id = 'cart_price'>" . $price . " € </p>";
}
function print_cart( $IdUser) { ?>
    <div class="listings_cart">
        <?php
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM SHOPPINGCART WHERE IdUser = :IdUser");
    $stmt->bindParam(':IdUser', $IdUser);
    $stmt->execute();
    $cart = $stmt->fetchAll();
    foreach ($cart as $row) {
        $IdListing = $row['IdListing'];
        $query = "SELECT * FROM listings WHERE IdListing = :IdListing";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':IdListing', $IdListing); 
        $stmt->execute();
        $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listings as $listing) {
            $image = $listing['img'];
            $imageSource = "data:image/jpeg;base64," . base64_encode($image);
            echo "<li>";
            echo "<img class='slisting' src=\"$imageSource\" width=\"10em\" height=\"10em\"></img>";
            echo "<div class='listing_name'>" . $listing['Name']  . "</div>";
            echo "<p id = 'listing_price'>" . $listing['Price'] . " € </p>";
            echo "<p id = 'listing_brand'>" . get_brand($db,$listing['IdBrand']) . "  </p>";
            echo "<p id = 'listing_size'>" . get_size($db,$listing['IdSize']) . "  </p>";
            echo "<a id = 'remove_button' href= ../actions/remove_cart_action.php?IdListing=" , $listing['IdListing'] , ">Remove</a>";
            echo "</li>";

        }
    } ?>
    </div>
    <?php
} 

function print_cart2( $IdUser) { ?>
    <div class="listings_cart2">
        <?php
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM SHOPPINGCART WHERE IdUser = :IdUser");
    $stmt->bindParam(':IdUser', $IdUser);
    $stmt->execute();
    $cart = $stmt->fetchAll();
    foreach ($cart as $row) {
        $IdListing = $row['IdListing'];
        $query = "SELECT * FROM listings WHERE IdListing = :IdListing";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':IdListing', $IdListing); 
        $stmt->execute();
        $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listings as $listing) {
            $image = $listing['img'];
            $imageSource = "data:image/jpeg;base64," . base64_encode($image);
            echo "<li>";
            echo "<img class='slisting' src=\"$imageSource\" width=\"10em\" height=\"10em\"></img>";
            echo "<div class='listing_name'>" . $listing['Name']  . "</div>";
            echo "<p id = 'listing_price'>" . $listing['Price'] . " € </p>";
            echo "<p id = 'listing_brand'>" . get_brand($db,$listing['IdBrand']) . "  </p>";
            echo "<p id = 'listing_size'>" . get_size($db,$listing['IdSize']) . "  </p>";
            echo "</li>";

        }
    } ?>
    </div>
    <?php
} 

function print_price2($IdUser){
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM SHOPPINGCART WHERE IdUser = :IdUser");
    $stmt->bindParam(':IdUser', $IdUser);
    $stmt->execute();
    $cart = $stmt->fetchAll();
    $price = 0;
    foreach ($cart as $row) {
        $IdListing = $row['IdListing'];
        $query = "SELECT * FROM listings WHERE IdListing = :IdListing";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':IdListing', $IdListing); 
        $stmt->execute();
        $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listings as $listing) {
            $price = $price + $listing['Price'];
        }
    }
    echo "<p id = 'cart_price2'>" . $price . " € </p>";
}
?>