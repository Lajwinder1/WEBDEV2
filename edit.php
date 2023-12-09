<?php
/************
    Name: Lajwinder Kaur
    Date: 2023-09-25
    Description: Edit Button
************/

require('connect.php');
require('authenticate.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['art_id'])) {
 
    $art_id = filter_input(INPUT_POST, 'art_id', FILTER_SANITIZE_NUMBER_INT);

    
    if (isset($_POST['art_name'], $_POST['artist_name'], $_POST['description'])) {
        $art_name = filter_input(INPUT_POST, 'art_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $artist_name = filter_input(INPUT_POST, 'artist_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $updateQuery = "UPDATE arts SET art_name = :art_name, artist_name = :artist_name, description = :description WHERE art_id = :art_id";
        $updateStatement = $db->prepare($updateQuery);
        $updateStatement->bindValue(':art_name', $art_name);
        $updateStatement->bindValue(':artist_name', $artist_name);
        $updateStatement->bindValue(':description', $description);
        $updateStatement->bindValue(':art_id', $art_id, PDO::PARAM_INT);

       
        if ($updateStatement->execute()) {
           
            header("Location: index.php");
            exit;
        } else {
            echo "Error updating art details.";
        }
    }
} else {
    if (isset($_GET['art_id'])) {
       
        $art_id = filter_input(INPUT_GET, 'art_id', FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM arts WHERE art_id = :art_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':art_id', $art_id, PDO::PARAM_INT);

        // Execute the SELECT query
        $statement->execute();

      
        $art = $statement->fetch();

        if (!$art) {
            header("Location: index.php");
            exit;
        }
    } else {
        
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Edit Art Details</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Panjab Arts</a></h1>
        </div> 
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <!-- Add other menu items as needed -->
        </ul> 
        <form method="post">
            <!-- Hidden input for the art primary key. -->
            <input type="hidden" name="art_id" value="<?= $art['art_id'] ?>">
            
            <!-- Art details are echoed into the input value attributes. -->
            <label for="art_name">Art Name</label>
            <input id="art_name" name="art_name" value="<?= $art['art_name'] ?>" required>

            <label for="artist_name">Artist Name</label>
            <input id="artist_name" name="artist_name" value="<?= $art['artist_name'] ?>" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" required><?= $art['description'] ?></textarea>

            <input type="submit" name="command" value="Update" />

            <!-- Buttons for edit.php and delete.php -->
            <a href="edit.php?art_id=<?= $art['art_id'] ?>" class="button">Edit</a>
            <a href="delete.php?art_id=<?= $art['art_id'] ?>" class="button" onclick="return confirm('Are you sure you want to delete this art?')">Delete</a>
        </form>
    </div>
</body>
</html>
