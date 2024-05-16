<?php 
class Transaction {
    public $IdTransaction;
    public $name;
    public $surname;
    public $country;
    public $address;
    public $NIF;
    public $postalCode;
    public $IdListings;

    public function __construct($IdTransaction, $name, $surname, $country, $address, $NIF, $postalCode, $IdListings) {
        $this->IdTransaction = $IdTransaction;
        $this->name = $name;
        $this->surname = $surname;
        $this->country = $country;
        $this->address = $address;
        $this->NIF = $NIF;
        $this->postalCode = $postalCode;
        $this->IdListings = $IdListings;
    }   
}
function insert_transaction($country, $address, $NIF, $postalCode, $Location ,$IdBuyer){
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM SHOPPINGCART WHERE IdUser = :IdBuyer");
    $stmt->bindParam(':IdBuyer', $IdBuyer);
    $stmt->execute();
    $IdListings = [];
    $cartitem = $stmt->fetchAll();
    foreach ($cartitem as $item){
        $IdListing = $item['IdListing'];
        $IdListings[] = $IdListing;
    }
    $sql = "INSERT INTO TRANSACTIONS (IdBuyer, Country, Address, NIF, PostalCode, Location, IdListings) VALUES ( ?, ?, ?, ?, ?, ?,?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$IdBuyer, $country, $address, $NIF, $postalCode,$Location, implode(",", $IdListings)]);
    $transactionId = $db->lastInsertId();
    return $transactionId;
}
function print_transaction($IdTransaction){ 
    ?>
    <div class="transactions">
    <?php
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM TRANSACTIONS WHERE IdTransaction = :IdTransaction");
    $stmt->bindParam(':IdTransaction', $IdTransaction);
    $stmt->execute();
    $transaction = $stmt->fetchAll();
    echo $IdListing;
    foreach ($transaction as $row) {
        $IdListings = explode(",", $row['IdListings']); 
        $query = "SELECT * FROM listings WHERE IdListing IN (".implode(',', array_fill(0, count($IdListings), '?')).")";
        $stmtListings = $db->prepare($query);
        $stmtListings->execute($IdListings);
        $listings = $stmtListings->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listings as $listing) {
            $image = $listing['img'];
            $imageSource = "data:image/jpeg;base64," . base64_encode($image);
            echo "<li>";
            echo "<img class='slisting' src=\"$imageSource\" width=\"10em\" height=\"10em\"></img>";
            echo "<div class='listing_name'>" . $listing['Name']  . "</div>";
            echo "<p id='listing_price'>" . $listing['Price'] . " € </p>";
            echo "<p id='listing_brand'>" . get_brand($db, $listing['IdBrand']) . "  </p>";
            echo "<p id='listing_size'>" . get_size($db, $listing['IdSize']) . "  </p>";
            echo "</li>";
        }
    }
    ?>
    </div>
    <?php
}
?>
