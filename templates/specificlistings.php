<?php
    function print_slistings(){?>
        <div class = "listings">
        <ul>
        <?php
            include_once("../class/user.php");
            $db = new PDO('sqlite:../database/database.db');
            $user = get_user($_SESSION['user']);
            $userid = $user->IdUser;
            if (!$db) {
                echo "<p>Erro ao conectar ao banco de dados.</p>";
            } else {
                $query = "SELECT * FROM listings WHERE IdUser = :userId";
                $stmt = $db->prepare($query);
                $stmt->bindValue(':userId', $userid, PDO::PARAM_INT); // Assuming IdUser is an integer
                $stmt->execute();
                    $listings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($listings as $listing) {
                        $image = $listing['img'];
                        $imageSource = "data:image/jpeg;base64," . base64_encode($image);
                        echo "<ul>";
                        echo "<div class='atc'>";
                        print"<img class='listing' src=\"$imageSource\" width=\"150px\" height=\"150px\"\/></img>";
                        echo "</div>";
                        echo "<li class='name'>" . $listing['Name']  . "</li>";
                        echo "<li>" . $listing['Price'] . " € ".  "</li>";
                        echo "</ul>";
                }
       
                $db = null;
            }
        ?>
        </ul>
  
    <?php }
    ?>
