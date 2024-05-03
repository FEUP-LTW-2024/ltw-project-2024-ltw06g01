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
                    print"<img class='listing' src=\"$imageSource\" width=\"300px\" height=\"300px\"\/></img>";
                    echo "<div class='centered'>Add to cart</div>";
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
function print_slistings($db, $user){?>
    <div class="listings">
        <ul>
            <?php
             // Você precisa definir a função get_user() na classe user.php
            $userid = $user->IdUser;
            if (!$db) {
                echo "<p>Erro ao conectar ao banco de dados.</p>";
            } else {
                $query = "SELECT * FROM listings WHERE IdUser = :userId";
                $stmt = $db->prepare($query);
                $stmt->bindValue(':userId', $userid); // Assuming IdUser is an integer
                $stmt->execute();
                $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($listings as $listing) {
                    $image = $listing['img'];
                    $imageSource = "data:image/jpeg;base64," . base64_encode($image);
                    echo "<li>";
                    echo "<div class='atc'>";
                    echo "<img class='listing' src=\"$imageSource\" width=\"150px\" height=\"150px\"></img>";
                    echo "</div>";
                    echo "<div class='name'>" . $listing['Name']  . "</div>";
                    echo "<p>" . $listing['Price'] . " € </p>";
                    echo "</li>";
                }
                $db = null;
            }
            ?>
        </ul>
    </div>
<?php }
function print_filtred_listings() {
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
                $whereClause = "WHERE"; // Initialize empty WHERE clause

                $query = "SELECT * FROM listings WHERE 1"; // Começa com uma cláusula WHERE verdadeira

                // Adiciona condições dos filtros
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
                
                // Prepara e executa a consulta
                $stmt = $db->prepare($query);
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
                    print"<img class='listing' src=\"$imageSource\" width=\"300px\" height=\"300px\"\/></img>";
                    echo "<div class='centered'>Add to cart</div>";
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






