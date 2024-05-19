<?php
session_start();
include_once("../class/user.php");

function print_wishlist() {
  $db = new PDO('sqlite:../database/database.db');
  $user = get_user($_SESSION['user']);
  $IdUser = $user->IdUser;

  $stmt = $db->prepare("SELECT * FROM WISHLIST WHERE IdUser = :IdUser");
  $stmt->bindParam(':IdUser', $IdUser);
  $stmt->execute();

  $wishlist = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $wishlistItems = [];
  foreach ($wishlist as $row) {
    $IdListing = $row['IdListing'];

    $listingQuery = $db->prepare("SELECT * FROM listings WHERE IdListing = :IdListing");
    $listingQuery->bindParam(':IdListing', $IdListing);
    $listingQuery->execute();

    $listing = $listingQuery->fetch(PDO::FETCH_ASSOC);

    if ($listing) { 
      $imageSource = "data:image/jpeg;base64," . base64_encode($listing['img']);
      $wishlistItems[] = [
        "image" => $imageSource,
        "name" => $listing['Name'],
        "price" => $listing['Price'] . " €",
        "IdListing" => $listing['IdListing']
      ];
    }
  }

  echo json_encode($wishlistItems); 
}

if (isset($_POST['print_wishlist'])) { 
  print_wishlist();
  exit(); 
}
