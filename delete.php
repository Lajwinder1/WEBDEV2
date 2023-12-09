<?php
/****
    Name: Lajwinder Kaur
    Date: 2023-09-25
    Description: Art Gallery Delete Button
****/

require('connect.php');
require('authenticate.php');

if ($_GET && isset($_GET['art_id'])) {
    $art_id = filter_input(INPUT_GET, 'art_id', FILTER_SANITIZE_NUMBER_INT);

    // Delete the art from the database
    $query = "DELETE FROM arts WHERE art_id = :art_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':art_id', $art_id, PDO::PARAM_INT);

    // Execute the DELETE query
    if ($statement->execute()) {
        // Redirect back to the admin dashboard after successful deletion
        header("Location: admin.php");
        exit;
    } else {
        // Handle deletion error (you may customize this part based on your needs)
        echo "Error deleting art.";
    }
}
?>
