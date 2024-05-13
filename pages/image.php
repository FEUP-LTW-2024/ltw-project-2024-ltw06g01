<?php 
    session_start();

?>

<?php
    include_once("../templates/footer.php");
    include_once("../templates/header.php");
    include_once("../class/user.php");
    $user = get_user($_SESSION['user']);
    if (!$user){
        $_SESSION['message'] = "Tens de estar logado para criar um listing!";
        header('Location: login.php');
        exit(); 
    }
    print_header();
?>
    <div class = "init_div">
    <h2>Create Listing</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data" id = "upload">
        <label for="image">Upload Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br><br>

        <label for="name">Listing Name:</label>
        <input type="text" name="name" id="name" required><br><br>
        
        <label for="price">Listing Price:</label>
        <input type="number" name="price" id="price" required><br><br>

        <label for="brand">Brand:</label>
        <select name="brand" id="brand" required>
            <?php
            $db = new PDO('sqlite:../database/database.db');
            $stmt = $db->query('SELECT IDbrand, brand FROM BRAND');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $brandId = $row['IdBrand']; 
                $brandName = $row['Brand'];
                echo "<option value='$brandId'>" . $brandName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="state">State:</label>
        <select name="state" id="state" required>
            <?php
            $stmt = $db->query('SELECT IDstate, STATE FROM STATE');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $stateId = $row['IdState']; 
                $stateName = $row['State'];
                echo "<option value='$stateId'>" . $stateName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <?php
            $stmt = $db->query('SELECT IDGender, Gender FROM GENDER');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $genderId = $row['IdGender']; 
                $genderName = $row['Gender'];
                echo "<option value='$genderId'>" . $genderName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="color">Color:</label>
        <select name="color" id="color" required>
            <?php
            $stmt = $db->query('SELECT IdColour, Colour FROM COLOUR');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $ColorId = $row['IdColour']; 
                $ColorName = $row['Colour'];
                echo "<option value='$ColorId'>" . $ColorName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="size">Size:</label>
        <select name="size" id="size" required>
            <?php
            $stmt = $db->query('SELECT IdSize, Size FROM SIZE');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $SizeId = $row['IdSize']; 
                $SizeName = $row['Size'];
                echo "<option value='$SizeId'>" . $SizeName . "</option>";
            }
            ?>
        </select><br><br>

        <label for="type">Type:</label>
        <select name="type" id="type" required>
            <?php
            $stmt = $db->query('SELECT IdType, TYPE FROM TYPE');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $TypeId = $row['IdType']; 
                $TypeName = $row['Type'];
                echo "<option value='$TypeId'>" . $TypeName . "</option>";
            }
            ?>
        </select><br><br>

        <button id = "submit_button" type="submit">Create Listing</button>
    </form>
        </div>
    <?php
    print_footer();
?>    
</html>    
