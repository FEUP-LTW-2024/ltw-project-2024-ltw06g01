    <?php
    session_start();
    include_once("../class/user.php");

    $user = get_user($_SESSION['user']);
    $userId = $user->IdUser;

    function print_self_listings() {
        $db = new PDO('sqlite:../database/database.db');
        $user = get_user($_SESSION['user']);
        $userId = $user->IdUser;
      
        $stmt = $db->prepare("SELECT * FROM listings WHERE IdUser = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
      
        $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        $selfListings = [];
        foreach ($listings as $listing) {
          $imageSource = "data:image/jpeg;base64," . base64_encode($listing['img']); 
          $selfListings[] = [
            "image" => $imageSource,
            "name" => $listing['Name'],
            "price" => $listing['Price'] . " €",
            "IdListing" => $listing['IdListing']
          ];
        }
      
        echo json_encode($selfListings);
      
        $db = null; 
      }

    if (isset($_POST['print_self_listings'])) {
    print_self_listings();
    exit();
    }
