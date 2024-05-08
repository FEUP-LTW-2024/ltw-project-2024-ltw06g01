<?php
class WishlistItem {
    public $IdListing;
    public $IdUser;

    public function __construct($IdListing, $IdUser) {
        $this->IdListing = $IdListing;
        $this->IdUser = $IdUser;
    }
}
function check_wishlist($db, $IdUser, $IdListing) {
    $stmt = $db->prepare("SELECT * FROM WISHLIST WHERE IdUser = :IdUser AND IdListing = :IdListing");
    $stmt->bindParam(':IdUser', $IdUser);
    $stmt->bindParam(':IdListing', $IdListing);
    $stmt->execute();
    $wishlist = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $wishlist;
}
function add_wishlist($db, $IdUser, $IdListing) {
    $stmt = $db->prepare("INSERT INTO WISHLIST (IdListing, IdUser) VALUES (:IdListing, :IdUser)");
    $stmt->bindParam(':IdListing', $IdListing);
    $stmt->bindParam(':IdUser', $IdUser);
    return $stmt->execute();
} 
function print_wishlist( $IdUser) { ?>
    <div class="listings">
        <?php
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM WISHLIST WHERE IdUser = :IdUser");
    $stmt->bindParam(':IdUser', $IdUser);
    $stmt->execute();
    $wishlist = $stmt->fetchAll();
    foreach ($wishlist as $row) {
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
            echo "<div class='name'>" . $listing['Name']  . "</div>";
            echo "<p>" . $listing['Price'] . " € </p>";
            echo "</li>";
        }
    } ?>
    </div>
    <?php
} 
?>
