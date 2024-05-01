<?php 
    session_start();

?>

<?php
    include_once("../templates/footer.php");
    include_once("../templates/header3.php");
    include_once("../class/user.php");
    $db = new PDO('sqlite:../database/database.db');
    $user = get_user($db, $_SESSION['user']);
?>

<?php
    print_header_3();
?>
    <div class = "init_div"></div>   
    <h2>Create Listing</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br><br>

        <label for="name">Listing Name:</label>
        <input type="text" name="name" id="name" required><br><br>
        
        <label for="price">Listing Price:</label>
        <input type="number" name="price" id="price" required><br><br>

        <label for="brand">Brand:</label>
        <select name="brand" id="brand" required>
            <?php
            // Fetch brand names from the database
            $db = new PDO('sqlite:../database/database.db');
            $stmt = $db->query('SELECT IDbrand, brand_name FROM BRAND');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $brandId = $row['IdBrand']; // Store brand ID for value
                $brandName = $row['Brand_Name'];
            
                // Concatenate value and brand name in the option element
                echo "<option value='$brandId'>" . $brandName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="state">State:</label>
        <select name="state" id="state" required>
            <?php
            // Fetch states from the database
            $stmt = $db->query('SELECT IDstate, STATE FROM STATE');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $brandId = $row['IdState']; // Store brand ID for value
                $brandName = $row['State'];
            
                // Concatenate value and brand name in the option element
                echo "<option value='$brandId'>" . $brandName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <?php
            // Fetch genders from the database
            $stmt = $db->query('SELECT IDGender, Gender FROM GENDER');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $brandId = $row['IdGender']; // Store brand ID for value
                $brandName = $row['GENDER'];
            
                // Concatenate value and brand name in the option element
                echo "<option value='$brandId'>" . $brandName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="color">Color:</label>
        <select name="color" id="color" required>
            <?php
            // Fetch colors from the database
            $stmt = $db->query('SELECT IdColour, Colour FROM COLOUR');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $brandId = $row['IdColour']; // Store brand ID for value
                $brandName = $row['Colour'];
            
                // Concatenate value and brand name in the option element
                echo "<option value='$brandId'>" . $brandName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="size">Size:</label>
        <select name="size" id="size" required>
            <?php
            // Fetch sizes from the database
            $stmt = $db->query('SELECT IdSize, Size FROM SIZE');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $brandId = $row['IdSize']; // Store brand ID for value
                $brandName = $row['Size'];
            
                // Concatenate value and brand name in the option element
                echo "<option value='$brandId'>" . $brandName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="type">Type:</label>
        <select name="type" id="type" required>
            <?php
            // Fetch types from the database
            $stmt = $db->query('SELECT IdType, TYPEE FROM TYPE');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $brandId = $row['IdType']; // Store brand ID for value
                $brandName = $row['TYPEE'];
            
                // Concatenate value and brand name in the option element
                echo "<option value='$brandId'>" . $brandName . "</option>";
            }
            ?>
        </select><br><br>

        <button type="submit">Create Listing</button>
    </form>
    <?php
    print_footer();
?>    
</html>    
