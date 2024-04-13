<?php
    include_once("../templates/footer.php");
    include_once("../templates/header.php");
?>
<?php
    print_header()
?>

    <div class = "menu">
        <ul>
            <li><a href="#">Women</a></li>
            <li><a href="#">Men</a></li>
            <li><a href="#">Children</a></li>
            <li><a href="#">Others</a></li>
        </ul>
    </div>

    <section class = "background">
        <div class = "content">
            <p class = "slogan">Tired of your old clothes?</p>

            <div class = "slogan_button">
                <a href = "#" class = "slogan_button_text">Sell now!</a>
            </div>

            <p class = "slogan_help"><a href = "#">Learn how it works</a></p>   
        </div>
    
    <div class = "listings">
        <ul>
        <?php
     
            $db = new PDO('sqlite:../database/listings.db');

            if (!$db) {
                echo "<p>Erro ao conectar ao banco de dados.</p>";
            } else {
         
                $query = "SELECT * FROM listings";
                $result = $db->query($query);

     
                if ($result) {
           
                    $listings = $result->fetchAll(PDO::FETCH_ASSOC);

                    echo "<ul>";
                    foreach ($listings as $listing) {
                        echo "<li>ID do Listing: " . $listing['IdListing'] . "</li>";
                        echo "<li>ID da Brand: " . $listing['IdBrand'] . "</li>";
                        echo "<li>ID do Size: " . $listing['IdSize'] . "</li>";
                        echo "<li>Id Colour: " . $listing['IdColour'] . "</li>";
                        echo "<li>Id State: " . $listing['IdState'] . "</li>";
                        echo "<li>Id Gender: " . $listing['IdGender'] . "</li>";
                        echo "<br>";
                        }
                    echo "</ul>";
                } else {
                    echo "<p>Erro ao executar a consulta.</p>";
                }
       
                $db = null;
            }
        ?>
        </ul>
        </div>  
    <?php print_footer()?>
