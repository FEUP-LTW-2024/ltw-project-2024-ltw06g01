<?php


// Define upload directory and allowed extensions
$target_dir = "../uploads/"; // Change this to your desired upload directory path
$allowed_extensions = array("jpg", "jpeg", "png", "gif");

// Check if image file is uploaded
if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {

    $file_name = basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

    // Check allowed file types
    if (in_array($imageFileType, $allowed_extensions)) {


        // Generate a unique filename to avoid conflicts
        $new_filename = uniqid() . "." . $imageFileType;

        // Upload the image
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $new_filename)) {
            echo "The file ". $new_filename . " has been uploaded.";

            // Now process the form data (brand, name, etc.) and insert into database
            // ... (your code to insert data into database using $new_filename)

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
} else {
    echo "Sorry, no image file was uploaded.";
}

?>