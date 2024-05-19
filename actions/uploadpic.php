<?php
session_start();
include_once("../class/user.php");
$allowed_extensions = array("jpg", "jpeg", "png","webp");
if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
    $imageContent = file_get_contents($_FILES["image"]["tmp_name"]);
    $file_name = basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
    if (in_array($imageFileType, $allowed_extensions)) {


        // Generate a unique filename to avoid conflicts
        //$new_filename = uniqid() . "." . $imageFileType;
        $db = new PDO('sqlite:../database/database.db');
        $user = get_user($_SESSION['user']);
        if (!$user)echo "Invalid User!";
        if ($db) {
            $stmt = $db->prepare("UPDATE USER SET img = :imageContent WHERE User = :username");
            $stmt->bindParam(':imageContent', $imageContent, PDO::PARAM_LOB);
            $stmt->bindParam(':username', $_SESSION['user']);
            $stmt->execute();
            header('Location: ../pages/edit_profile.php');
            exit(); 
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