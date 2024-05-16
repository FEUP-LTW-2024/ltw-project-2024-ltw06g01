<?php
class Listing {
    public $IdListing;
    public $IdBrand;
    public $IdSize;
    public $IdColour;
    public $IdState;
    public $IdGender;
    public $IdType;
    public $IdUser;
    public $img;
    public $Name;
    public $Price;
    public $Sold;

    public function __construct($IdListing, $IdBrand, $IdSize, $IdColour, $IdState, $IdGender, $IdType, $IdUser, $img, $Name, $Price,$Sold) {
        $this->IdListing = $IdListing;
        $this->IdBrand = $IdBrand;
        $this->IdSize = $IdSize;
        $this->IdColour = $IdColour;
        $this->IdState = $IdState;
        $this->IdGender = $IdGender;
        $this->IdType = $IdType;
        $this->IdUser = $IdUser;
        $this->img = $img;
        $this->Name = $Name;
        $this->Price = $Price;
        $this->Sold = $Sold;
    }
}


function get_listing($Id){
    $db = new PDO('sqlite:../database/database.db');
    $stmt = $db->prepare("SELECT * FROM LISTINGS WHERE IdListings = :Id");
    $stmt->bindParam(':Id', $Id);
    $stmt->execute();
    $listing = $stmt->fetch(PDO::FETCH_ASSOC);
    return $listing;
}
function print_listings(){?>
    
    <div class = "listings">
    <?php
 
        $db = new PDO('sqlite:../database/database.db');

        if (!$db) {
            echo "<p>Erro ao conectar ao banco de dados.</p>";
        } else {
            $sold = 'true'; 
            $query = "SELECT * FROM listings WHERE Sold != :Sold"; 
            $stmt = $db->prepare($query);
            $stmt->bindParam(':Sold', $sold);
            $result = $stmt->execute();

 
            if ($result) {
                $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo "<ul>";
                foreach ($listings as $listing) {
                    $listingId = $listing['IdListing'];
                    $image = $listing['img'];
                    $imageSource = "data:image/jpeg;base64," . base64_encode($image);
                    echo "<ul>";
                    echo "<div class='atc'>";
                    print"<a href='product.php?id={$listing['IdListing']}' ><img class='listing' src=\"$imageSource\"></img></a>";
                    echo "<a href = '../pages/register.php'>";
                    echo "<button class='cart-button' type='submit' >Add to Cart</button>";
                    echo "</a>";
                    echo "</div>";
                    echo "<li class='name'>" . $listing['Name']  . "</li>";
                    echo "<li>" . $listing['Price'] . " € ".  "</li>";
                    echo "</ul>";
                    }
                    echo "</ul>";
            } else {
                echo "<p>Erro ao executar a consulta.</p>";
            }
   
            $db = null;
        }
    ?>
    </div>  
<?php }
function print_filtred_listings($IdUser) {
    if (isset($_POST)) {
        $IdBrand = $_POST["brand"];
        $IdSize = $_POST["size"];
        $IdColour = $_POST["color"];
        $IdState = $_POST["state"];
        $IdGender = $_POST["gender"];
        $IdType = $_POST["type"];
    }
    $db = new PDO('sqlite:../database/database.db');
    ?>
    <div class="listings">
        <ul>
            <?php
            if (!$db) {
                echo "<p>Erro ao conectar ao banco de dados.</p>";
            } else {
                $sold = 'true'; 
                $query = "SELECT * FROM listings WHERE IdUser != :IdUser AND Sold != :Sold"; 

                if ($IdBrand != 0) {
                    $query .= " AND IdBrand = :Idbrand";
                }
                if ($IdSize != 0) {
                    $query .= " AND IdSize = :Idsize";
                }
                if ($IdState != 0) {
                    $query .= " AND IdState = :Idstate";
                }
                if ($IdColour != 0) {
                    $query .= " AND IdColour = :Idcolour";
                }
                if ($IdType != 0) {
                    $query .= " AND IdType = :Idtype";
                }
                if ($IdGender != 0) {
                    $query .= " AND IdGender = :Idgender";
                }
                
                $stmt = $db->prepare($query);
                $stmt->bindParam(':IdUser', $IdUser);
                $stmt->bindParam(':Sold', $sold);
                if ($IdBrand != 0) {
                    $stmt->bindValue(':Idbrand', $IdBrand);
                }
                if ($IdSize != 0) {
                    $stmt->bindValue(':Idsize', $IdSize);
                }
                if ($IdState != 0) {
                    $stmt->bindValue(':Idstate', $IdState);
                }
                if ($IdColour != 0) {
                    $stmt->bindValue(':Idcolour', $IdColour);
                }
                if ($IdType != 0) {
                    $stmt->bindValue(':Idtype', $IdType);
                }
                if ($IdGender != 0) {
                    $stmt->bindValue(':Idgender', $IdGender);
                }
                $stmt->execute();
                $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($listings as $listing) {
                    $image = $listing['img'];
                    $listingId = $listing['IdListing'];
                    $imageSource = "data:image/jpeg;base64," . base64_encode($image);
                    echo "<ul>";
                    echo "<div class='atc'>";
                    print"<a href='product.php?id={$listing['IdListing']}' ><img class='listing' src=\"$imageSource\"></a>";
                    echo "<form id ='cart_form' enctype='multipart/form-data' method='post' class='cartform'>";
                    echo "<input type='hidden' name='IdListing' value='{$listing['IdListing']}'>";
                    echo "<input type='hidden' name='IdUser' value='{$IdUser}'>";
                    echo "<button class='cart-button' type='submit' >Add to Cart</button>";
                    echo "</form>";
                    echo "<form id ='wishlist_form' enctype='multipart/form-data' method='post' class='wishlistform'>";
                    echo "<input type='hidden' name='IdListing' value='{$listing['IdListing']}'>";
                    echo "<input type='hidden' name='IdUser' value='{$IdUser}'>";
                    echo "<button class='wishlist-button' type='submit' >";
                    echo "<img src ='../img/heart.png'>";
                    echo "</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "<li class='name'>" . $listing['Name']  . "</li>";
                    echo "<li>" . $listing['Price'] . " € ".  "</li>";
                    echo "</ul>";
                    }
                    echo "</ul>";

                $db = null;
            }
            ?>
    </div>
    <?php 
}
function get_brand($db,$IdBrand){
    $stmt = $db->prepare("SELECT * FROM brand WHERE IdBrand = :IdBrand");
    $stmt->bindParam(':IdBrand', $IdBrand);
    $stmt->execute();
    $brand = $stmt->fetch(PDO::FETCH_ASSOC);
    return $brand['Brand'];
}
function get_size($db,$IdSize){
    $stmt = $db->prepare("SELECT * FROM SIZE WHERE IdSize = :IdSize");
    $stmt->bindParam(':IdSize', $IdSize);
    $stmt->execute();
    $size = $stmt->fetch(PDO::FETCH_ASSOC);
    return $size['Size'];
}
function get_color($db,$IdColour){
    $stmt = $db->prepare("SELECT * FROM COLOUR WHERE IdColour = :IdColour");
    $stmt->bindParam(':IdColour', $IdColour);
    $stmt->execute();
    $colour = $stmt->fetch(PDO::FETCH_ASSOC);
    return $colour['Colour'];
}
function get_state($db,$IdState){
    $stmt = $db->prepare("SELECT * FROM STATE WHERE IdState = :IdState");
    $stmt->bindParam(':IdState', $IdState);
    $stmt->execute();
    $state = $stmt->fetch(PDO::FETCH_ASSOC);
    return $state['State'];
}
function get_gender($db,$IdGender){
    $stmt = $db->prepare("SELECT * FROM GENDER WHERE IdGender = :IdGender");
    $stmt->bindParam(':IdGender', $IdGender);
    $stmt->execute();
    $gender = $stmt->fetch(PDO::FETCH_ASSOC);
    return $gender['Gender'];
}
function get_type($db,$IdType){
    $stmt = $db->prepare("SELECT * FROM TYPE WHERE IdType = :IdType");
    $stmt->bindParam(':IdType', $IdType);
    $stmt->execute();
    $type = $stmt->fetch(PDO::FETCH_ASSOC);
    return $type['Type'];
}
function remove_listing($db, $IdListing) {
    $stmt = $db->prepare("DELETE FROM LISTINGS WHERE IdListing = :IdListing ");
    $stmt->bindParam(':IdListing', $IdListing);
    return $stmt->execute();
} 


function print_listing($db,$listing) {
    $image = $listing['img'];
    $imageSource = "data:image/jpeg;base64," . base64_encode($image);
    $owner = get_user_by_id($listing['IdUser']);
    echo "<div class=productgrid>";
    echo "<img class='product' src=\"$imageSource\">";
    echo "<div class=productinfo>";
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
}


