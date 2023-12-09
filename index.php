<?php
/****
    Name: Lajwinder Kaur
    Date: 2023-09-25
    Description: Menu Page
****/

require('connect.php');

session_start();

// Fetch arts
$query = "SELECT * FROM arts";
$artStatement = $db->prepare($query);
$artStatement->execute();

// Fetch users
$userQuery = "SELECT * FROM users";
$userStatement = $db->prepare($userQuery);
$userStatement->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Winnipeg Art Gallery</title>
    <style>
        /* Add your styles here */
        /* You can customize the styles to match your design preferences */
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        #header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }

        #menu {
            background-color: #555;
            overflow: hidden;
        }

        #menu a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        #menu a:hover {
            background-color: #ddd;
            color: black;
        }

        #body {
            padding: 20px;
        }

        #ulist {
            list-style: none;
            padding: 0;
        }

        #ulist li {
            margin-bottom: 20px;
        }

        #ulist h3 {
            color: #333;
        }

        #ulist img {
            max-width: 200px;
            max-height: 200px;
        }

        #footer {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Smart believes in Art</a></h1>
        </div>
        <ul id="menu">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li style="float:right"><a href="login.php">Login</a></li>
            <?php if (isset($_SESSION['User_id'])) : ?>
                <li style="float:right"><a href="logout.php">Logout</a></li>
            <?php endif; ?>
            <!-- Add Search Form -->
            <li style="float:right">
                <form action="search.php" method="post">
                    <input type="text" name="search" placeholder="Search...">
                    <input type="submit" value="Search">
                </form>
            </li>
        </ul>
        <div id="body">
            <h2>Featured Arts</h2>
            <ul id="ulist">
                <?php while ($art = $artStatement->fetch()) : ?>
                    <li>
                        <h3><a href="view.php?art_id=<?= $art['art_id']; ?>"><?= $art['art_name'] ?></a></h3>
                    </li>
                    <li><img src="<?= $art['image'] ?>" alt="<?= $art['art_name'] ?> Image"></li>
                    <li><p>Artist Name: <?= $art['artist_name']; ?></p></li>
                    <li><p>Description: <?= $art['description'] ?></p></li>
                <?php endwhile ?>
            </ul>
        </div>
        <div id="footer">
            Copyright 2023 - All Rights Reserved
        </div>
    </div>
</body>

</html>
