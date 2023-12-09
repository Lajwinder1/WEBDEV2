<?php
/************
    Name: Lajwinder Kaur
    Date: 15 Nov,2023
    Description: Art Gallery - Add Artwork
************/

require('connect.php');
require('authenticate.php');


function file_is_an_image($temporary_path) {
    $allowed_mime_types = ['image/gif', 'image/jpeg', 'image/png'];
    $actual_mime_type = mime_content_type($temporary_path);
    return in_array($actual_mime_type, $allowed_mime_types);
}


function file_upload_path($original_filename, $upload_subfolder_name = 'uploads') {
    $current_folder = dirname(__FILE__);

    
    $path_segments = [$current_folder, $upload_subfolder_name, basename($original_filename)];
.
    return join(DIRECTORY_SEPARATOR, $path_segments);
}

if ($_POST && !empty($_POST['art_name']) && !empty($_POST['artist_name']) && !empty($_POST['description'])) {
    $art_name = filter_input(INPUT_POST, 'art_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $artist_name = filter_input(INPUT_POST, 'artist_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    if (isset($_FILES['uploaded_image']) && $_FILES['uploaded_image']['error'] === 0) {
        $image_filename = $_FILES['uploaded_image']['name'];
        $temporary_image_path = $_FILES['uploaded_image']['tmp_name'];
        $new_image_path = file_upload_path($image_filename);

        if (file_is_an_image($temporary_image_path)) {
            
            move_uploaded_file($temporary_image_path, $new_image_path);

        
            $image_path = 'uploads/' . $image_filename;
        } else {
         
            echo "Unsupported file type. Please upload a supported image (JPEG, PNG, GIF).";
            exit;
        }
    } else {
      
        $image_path = null;
    }

   
    $query = "INSERT INTO arts (art_name, artist_name, description, image) 
              VALUES (:art_name, :artist_name, :description, :image)";
    $statement = $db->prepare($query);
    $statement->bindValue(':art_name', $art_name);
    $statement->bindValue(':artist_name', $artist_name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':image', $image_path);
    if ($statement->execute()) {
        echo "Artwork added successfully!";
    } else {
        echo "Error inserting data into the database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add New Artwork</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Art Gallery</a></h1>
        </div> 
        <ul id="menu">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="add.php">Add Artwork</a></li>
        </ul> 
        <form method="post" action="add.php" enctype="multipart/form-data">
            <label for="art_name">Art Name</label>
            <input id="art_name" name="art_name" required>
            
            <label for="artist_name">Artist Name</label>
            <input id="artist_name" name="artist_name" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>

            <label for="uploaded_image">Upload Image:</label>
            <input type="file" id="uploaded_image" name="uploaded_image" accept="image/jpeg, image/png, image/gif">
            
            <button type="submit">Add Artwork</button>
        </form>
    </div>
</body>
</html>
