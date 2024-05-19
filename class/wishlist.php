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
function remove_wishlist($db, $IdUser, $IdListing) {
    $stmt = $db->prepare("DELETE FROM WISHLIST WHERE IdListing = :IdListing AND IdUser = :IdUser");
    $stmt->bindParam(':IdListing', $IdListing);
    $stmt->bindParam(':IdUser', $IdUser);
    return $stmt->execute();
}  
function remove_listing_wishlist($db,$IdListing) {
    $stmt = $db->prepare("DELETE FROM WISHLIST WHERE IdListing = :IdListing ");
    $stmt->bindParam(':IdListing', $IdListing);
    return $stmt->execute();
}  
?>
