<?php
    session_start();
    include_once("../class/user.php");
    function print_sold_listings() {
        $db = new PDO('sqlite:../database/database.db');
        $user = get_user($_SESSION['user']);
        $userId = $user->IdUser;
        $sold = 'true'; 
        $stmt = $db->prepare("SELECT * FROM listings WHERE IdUser = :userId AND Sold == :Sold");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':Sold', $sold);
        $stmt->execute();
      
        $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        $soldListings = [];
        foreach ($listings as $listing) {
          $imageSource = "data:image/jpeg;base64," . base64_encode($listing['img']); 
          $soldListings[] = [
            "image" => $imageSource,
            "name" => $listing['Name'],
            "price" => $listing['Price'] . " €",
            "IdListing" => $listing['IdListing']
          ];
        }
      
        echo json_encode($soldListings);
      
        $db = null; 
      }

    if (isset($_POST['print_sold_listings'])) {
    print_sold_listings();
    exit();
    }
