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

    public function __construct($IdListing, $IdBrand, $IdSize, $IdColour, $IdState, $IdGender, $IdType, $IdUser, $img, $Name, $Price) {
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
    }
}
function print_listings(){?>
    
    <div class = "listings">
    <?php
 
        $db = new PDO('sqlite:../database/database.db');

        if (!$db) {
            echo "<p>Erro ao conectar ao banco de dados.</p>";
        } else {
    
            $query = "SELECT * FROM listings";
            $result = $db->query($query);

 
            if ($result) {
                $listings = $result->fetchAll(PDO::FETCH_ASSOC);
                echo "<ul>";
                foreach ($listings as $listing) {
                    $image = $listing['img'];
                    $imageSource = "data:image/jpeg;base64," . base64_encode($image);
                    echo "<ul>";
                    echo "<div class='atc'>";
                    print"<img class='listing' src=\"$imageSource\"></img>";
                    echo "<form action='../actions/add_cart_action.php' method='post'>";
                    echo "<input type='hidden' name='IdListing' value='{$listing['IdListing']}'>";
                    echo "<input type='hidden' name='IdUser' value='{0}'>";
                    echo "<button class='cart-button' type='submit' >Add to Cart</button>";
                    echo "</form>";
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
                $query = "SELECT * FROM listings WHERE IdUser != :IdUser"; 

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
                    $imageSource = "data:image/jpeg;base64," . base64_encode($image);
                    echo "<ul>";
                    echo "<div class='atc'>";
                    print"<img class='listing' src=\"$imageSource\"></img>";
                    echo "<form action='../actions/add_cart_action.php' method='post' class='cartform'>";
                    echo "<input type='hidden' name='IdListing' value='{$listing['IdListing']}'>";
                    echo "<input type='hidden' name='IdUser' value='{$IdUser}'>";
                    echo "<button class='cart-button' type='submit' >Add to Cart</button>";
                    echo "</form>";
                    echo "<form action='../actions/add_wishlist_action.php' method='post' class='wishlistform'>";
                    echo "<input type='hidden' name='IdListing' value='{$listing['IdListing']}'>";
                    echo "<input type='hidden' name='IdUser' value='{$IdUser}'>";
                    echo "<button class='wishlist-button' type='submit' >";
                    echo "<img src ='../img/heart.png'";
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
        </ul>
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






