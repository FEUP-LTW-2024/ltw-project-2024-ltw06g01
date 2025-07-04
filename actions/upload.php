<?php
session_start();
include_once("../class/user.php");
$allowed_extensions = array("jpg", "jpeg", "png","webp");

if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
    $imageContent = file_get_contents($_FILES["image"]["tmp_name"]);
    $file_name = basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
    // Check allowed file types
    if (in_array($imageFileType, $allowed_extensions)) {

        $db = new PDO('sqlite:../database/database.db');
        $user = get_user($_SESSION['user']);
        if (!$user)echo "Invalid User!";
        $name = htmlspecialchars($_POST["name"]);
        $price = htmlspecialchars($_POST["price"]);
        $brand = htmlspecialchars($_POST["brand"]);
        $state = htmlspecialchars($_POST["state"]);
        $gender = htmlspecialchars($_POST["gender"]); 
        $color = htmlspecialchars($_POST["color"]);
        $size = htmlspecialchars($_POST["size"]);
        $type = htmlspecialchars($_POST["type"]);
        $sold = 'false';
        if ($db) {
            $sql = "INSERT INTO listings (IdBrand, IdSize, IdColour, IdState, IdGender, IdType, IdUser, img, Name, Price,Sold)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
            $stmt = $db->prepare($sql);
        
            // Bind parameters with appropriate data types (adjust as needed)
            $stmt->bindParam(1, $brand, PDO::PARAM_INT); // Assuming IdBrand is integer
            $stmt->bindParam(2, $size, PDO::PARAM_INT);  // Assuming IdSize is integer
            $stmt->bindParam(3, $color, PDO::PARAM_INT);  // Assuming IdColour is integer
            $stmt->bindParam(4, $state, PDO::PARAM_INT);  // Assuming IdState is integer
            $stmt->bindParam(5, $gender, PDO::PARAM_INT); // Assuming IdGender is integer
            $stmt->bindParam(6, $type, PDO::PARAM_INT);  // Assuming IdType is integer
            $stmt->bindParam(7, $user->IdUser, PDO::PARAM_INT);
        
            // Bind image content with PDO::PARAM_LOB for blob data
            $stmt->bindParam(8, $imageContent, PDO::PARAM_LOB); 
        
            $stmt->bindParam(9, $name, PDO::PARAM_STR);
            $stmt->bindParam(10, $price, PDO::PARAM_STR);
            $stmt->bindParam(11, $sold , PDO::PARAM_STR);
            // Execute the prepared statement
            $stmt->execute();
                    header('Location: ../pages/createlisting.php');
                    exit(); 
                    /* IdListing INTEGER PRIMARY KEY UNIQUE NOT NULL,
                        IdBrand INTEGER NOT NULL,
                        IdSize INTEGER NOT NULL,
                        IdColour INTEGER NOT NULL,
                        IdState INTEGER NOT NULL,
                        IdGender INTEGER NOT NULL,
                        IdType INTEGER NOT NULL,
                        img BLOB NOT NULL,
                        Name TEXT NOT NULL,
                        Price FLOAT NOT NULL,
                    */
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    }
} else {
    echo "Sorry, no image file was uploaded.";
}
?>