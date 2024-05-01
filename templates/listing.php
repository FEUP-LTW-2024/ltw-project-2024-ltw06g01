<?php
    function print_listings(){?>
    
        <div class = "listings">
        <ul>
        <?php
     
            $db = new PDO('sqlite:../database/database.db');

            if (!$db) {
                echo "<p>Erro ao conectar ao banco de dados.</p>";
            } else {
        
                $query = "SELECT * FROM listings";
                $result = $db->query($query);

     
                if ($result) {
                    $listings = $result->fetchAll(PDO::FETCH_ASSOC);
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
