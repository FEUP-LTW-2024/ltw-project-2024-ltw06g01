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
function insert_transaction($name, $surname, $country, $address, $NIF, $postalCode, $Location ,$IdBuyer){
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
    $sql = "INSERT INTO TRANSACTIONS (Name, Surname, Country, Address, NIF, PostalCode, Location, IdListings) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name, $surname, $country, $address, $NIF, $postalCode,$Location, implode(",", $IdListings)]);
}
?>