<?php
    include_once("templates/footer.php");
    include_once("templates/header.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/mainpage.css" rel="stylesheet">
    <title>Listings</title>
</head>
<body>
    <?php
        print_header()
    ?>
    <div class = "listings">
    <h1>Listings</h1>
        <ul>
        <?php
     
            $db = new PDO('sqlite:database/listings.db');

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
    <div>
    <?php print_footer()?>
</body>
</html>
