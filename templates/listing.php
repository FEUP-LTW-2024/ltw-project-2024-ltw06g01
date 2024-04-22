<?php
    function print_listings(){?>
    
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
                    foreach ($listings as $listing) {
                        $image = "../database/dbimages/img{$listing['IdImage']}.jpg";
                        echo "<ul>";
                        echo "<div class='atc'>";
                        print"<img class='listing' src=\"$image\" width=\"300px\" height=\"300px\"\/></img>";
                        echo "<div class='centered'>Add to cart</div>";
                        echo "</div>";
                        echo "<li class='name'>" . $listing['Name']  . "</li>";
                        echo "<li>" . $listing['Price'] . " € ".  "</li>";
                        echo "</ul>";
                        }
                } else {
                    echo "<p>Erro ao executar a consulta.</p>";
                }
       
                $db = null;
            }
        ?>
        </ul>
        </div>  
    <?php }
    ?>
