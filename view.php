<?php
require('connect.php');
require('authenticate.php');

if (isset($_GET['art_id'])) {
    $art_id = filter_input(INPUT_GET, 'art_id', FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM arts WHERE art_id = :art_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':art_id', $art_id, PDO::PARAM_INT);
    $statement->execute();
    $art = $statement->fetch();
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px 0;
        }
    </style>
    <title>View Art Details</title>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Winnipeg Art Gallery</a></h1>
        </div> 
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
        </ul> 
        <div id="content">
            <h2>Art Details</h2>
            <?php if ($art): ?>
                <dl>
                    <dt>Title:</dt>
                    <dd><?= $art['art_name'] ?></dd>

                    <dt>Artist:</dt>
                    <dd><?= $art['artist_name'] ?></dd>

                    <dt>Description:</dt>
                    <dd><?= $art['description'] ?></dd>

                    <?php if (!empty($art['image'])): ?>
                        <dt>Image:</dt>
                        <dd><img src="<?= $art['image'] ?>" alt="<?= $art['art_name'] ?>"></dd>
                    <?php endif; ?>
                </dl>
            <?php else: ?>
                <p>Art not found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
